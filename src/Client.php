<?php

namespace ShopeePhp;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException as GuzzleClientException;
use GuzzleHttp\Exception\ServerException as GuzzleServerException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\Utils;
use GuzzleHttp\RequestOptions;
use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use ShopeePhp\Nodes\NodeAbstract;
use ShopeePhp\Nodes;
use ShopeePhp\Exception\Api\AuthException;
use ShopeePhp\Exception\Api\BadRequestException;
use ShopeePhp\Exception\Api\ClientException;
use ShopeePhp\Exception\Api\Factory;
use ShopeePhp\Exception\Api\ServerException;

use function array_key_exists;
use function array_merge;
use function getenv;
use function json_encode;
use function time;
use function substr;

/**
 * @property Nodes\Auth\Auth $auth
 * @property Nodes\Shop\Shop $shop
 * @property Nodes\Product\Product $product
 * @property Nodes\Merchant\Merchant $merchant
 * @property Nodes\Logistics\Logistics $logistics
 * @property Nodes\Order\Order $order
 * @property Nodes\Returns\Returns $returns
 * @property Nodes\Shop\Shop $shop
 * @property Nodes\Discount\Discount $discount
 * @property Nodes\ShopCategory\ShopCategory $shopCategory
 * @property Nodes\Image\Image $image
 * @property Nodes\Push\Push $push
 * @property Nodes\Payment\Payment $payment
 */
class Client
{
    public const VERSION = '0.2';

    public const DEFAULT_BASE_URL = 'https://partner.shopeemobile.com';

    public const DEFAULT_USER_AGENT = 'shopee-php/' . self::VERSION;

    public const ENV_SECRET_NAME = 'SHOPEE_API_SECRET';

    public const ENV_PARTNER_ID_NAME = 'SHOPEE_PARTNER_ID';

    public const ENV_SHOP_ID_NAME = 'SHOPEE_SHOP_ID';

    /** @var RequestInterface */
    protected $currentRequest;

    /** @var ClientInterface */
    protected $httpClient;

    /** @var UriInterface */
    protected $baseUrl;

    /** @var string */
    protected $userAgent;

    /** @var string Shopee Partner Secret key */
    protected $secret;

    /** @var string */
    protected $access_token;

    /** @var string */
    protected $code;

    /** @var int */
    protected $partnerId;

    /** @var int */
    protected $shopId;

    /** @var NodeAbstract[] */
    protected $nodes = [];

    /** @var SignatureGeneratorInterface */
    protected $signatureGenerator;

    public function __construct(array $config = [])
    {
        $config = array_merge([
            'httpClient' => null,
            'baseUrl' => self::DEFAULT_BASE_URL,
            'userAgent' => self::DEFAULT_USER_AGENT,
            'secret' => getenv(self::ENV_SECRET_NAME),
            'partner_id' => (int)getenv(self::ENV_PARTNER_ID_NAME),
            'code' => "",
            SignatureGeneratorInterface::class => null,
        ], $config);

        $this->httpClient = $config['httpClient'] ?: new HttpClient();
        $this->setBaseUrl($config['baseUrl']);
        $this->setUserAgent($config['userAgent']);
        $this->secret = $config['secret'];
        $this->partnerId = $config['partner_id'];
        $this->code = $config['code'];

        $signatureGenerator = $config[SignatureGeneratorInterface::class];
        if (is_null($signatureGenerator)) {
            $this->signatureGenerator = new SignatureGenerator($this->secret);
        } elseif ($signatureGenerator instanceof SignatureGeneratorInterface) {
            $this->signatureGenerator = $signatureGenerator;
        } else {
            throw new InvalidArgumentException('Signature generator not implement SignatureGeneratorInterface');
        }
        $this->nodes['auth'] = new Nodes\Auth\Auth($this);

        $this->nodes['product'] = new Nodes\Product\Product($this);
        $this->nodes['shop'] = new Nodes\Shop\Shop($this);
        $this->nodes['merchant'] = new Nodes\Merchant\Merchant($this);
        $this->nodes['logistics'] = new Nodes\Logistics\Logistics($this);
        $this->nodes['order'] = new Nodes\Order\Order($this);

        # TODO create all nodes
        // $this->nodes['logistics'] = new Nodes\Logistics\Logistics($this);
        // $this->nodes['order'] = new Nodes\Order\Order($this);
        // $this->nodes['returns'] = new Nodes\Returns\Returns($this);
        // $this->nodes['shop'] = new Nodes\Shop\Shop($this);
        // $this->nodes['shopCategory'] = new Nodes\ShopCategory\ShopCategory($this);
        // $this->nodes['custom'] = new Nodes\Custom\Custom($this);
        // $this->nodes['discount'] = new Nodes\Discount\Discount($this);
        // $this->nodes['image'] = new Nodes\Image\Image($this);
        // $this->nodes['push'] = new Nodes\Push\Push($this);
        // $this->nodes['payment'] = new Nodes\Payment\Payment($this);
    }

    public function __get(string $name)
    {
        if (!array_key_exists($name, $this->nodes)) {
            throw new InvalidArgumentException(sprintf('Property "%s" not exists', $name));
        }

        return $this->nodes[$name];
    }

    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * @param ClientInterface $client
     * @return $this
     */
    public function setHttpClient(ClientInterface $client)
    {
        $this->httpClient = $client;

        return $this;
    }

    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * @param string $userAgent
     * @return $this
     */
    public function setUserAgent(string $userAgent)
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    public function getBaseUrl(): UriInterface
    {
        return $this->baseUrl;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setBaseUrl(string $url)
    {
        $this->baseUrl = new Uri($url);

        return $this;
    }

    public function getDefaultParameters(): array
    {
        return [
            'partner_id' => $this->partnerId,
            'timestamp' => time(), // Put the current UNIX timestamp when making a request
        ];
    }

    /**
     * Create HTTP JSON body
     *
     * The HTTP body should contain a serialized JSON string only
     *
     * @param array $data
     * @return string
     */
    protected function createJsonBody(array $data): string
    {
        $data = array_merge($this->getDefaultParameters(), $data);

        return json_encode($data);
    }

    /**
     * Generate an HMAC-SHA256 signature for a HTTP request
     *
     * @param UriInterface $uri
     * @param string $body
     * @return string
     */
    protected function signature(
        UriInterface $uri,
        string $timestamp = "",
        string $access_token = "",
        $shop_id = null
    ): string {
        return $this->signatureGenerator->generateSignature(
            $this->partnerId,
            $uri->getPath(),
            $timestamp,
            $access_token,
            $shop_id
        );
    }

    /**
     * @param string|UriInterface $uri
     * @param array $headers
     * @param array $data
     * @return RequestInterface
     */
    public function request(string $method, $uri, array $query = [], $data = []): RequestInterface
    {
        $uri = Utils::uriFor($uri);
        $path = $this->baseUrl->getPath() . $uri->getPath();

        if (substr($path, 0, 1) !== '/') {
            $path = '/' . $path;
        }

        $uri = $uri->withPath($path);

        $queryFromUri = [];
        parse_str($uri->getQuery(), $queryFromUri);

        $query = array_merge($query, $queryFromUri);

        $query['partner_id'] = isset($query['partner_id']) ? $query['partner_id'] : $this->partnerId;

        $timestamp = time();
        $query['timestamp'] = isset($query['timestamp']) ? $query['timestamp'] : time();

        if (!isset($query['sign'])) {
            $query['sign'] = isset($query['access_token']) ?
                $this->signature($uri, $timestamp, $query['access_token'], $query['shop_id']) :
                $this->signature($uri, $timestamp);
        }

        // dd($query);

        $uri = $uri
            ->withQuery(http_build_query($query))
            ->withScheme($this->baseUrl->getScheme())
            ->withUserInfo($this->baseUrl->getUserInfo())
            ->withHost($this->baseUrl->getHost())
            ->withPort($this->baseUrl->getPort());

        $jsonBody = strtolower($method) == "post" ? json_encode($data) : null;

        $headers['User-Agent'] = $this->userAgent;
        $headers['Content-Type'] = 'application/json';

        $this->currentRequest = new Request($method, $uri, $headers, $jsonBody);

        return $this->currentRequest;
    }

    public function retry()
    {
        return $this->send($this->currentRequest);
    }

    public function send(RequestInterface $request): ResponseInterface
    {
        try {
            $response = $this->httpClient->send($request);
        } catch (GuzzleClientException $exception) {
            switch ($exception->getCode()) {
                case 400:
                    $className = BadRequestException::class;
                    break;
                case 403:
                    $className = AuthException::class;
                    break;
                default:
                    $className = ClientException::class;
            }

            throw Factory::create($className, $exception);
        } catch (GuzzleServerException $exception) {
            throw Factory::create(ServerException::class, $exception);
        }

        return $response;
    }
}
