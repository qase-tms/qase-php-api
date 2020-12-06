<?php

namespace QaseRestApi;

use DateTime;
use DateTimeInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Http\Adapter\Guzzle7\Client as GuzzleAdapter;
use JsonMapper;
use Psr\Http\Client\ClientInterface;
use QaseRestApi\Configuration\ConfigurationInterface;
use QaseRestApi\Configuration\DotEnvConfiguration;

class QaseClient
{
    /**
     * @var JsonMapper
     */
    protected $json_mapper;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * QASE REST API URI.
     *
     * @var string
     */
    private $api_uri = 'api/v1';

    /**
     * Constructor.
     *
     * @param ConfigurationInterface|ClientInterface|null $configuration
     *
     * @throws QaseException
     */
    public function __construct($configuration = null)
    {
        if (!$configuration) {
            $configuration = new DotEnvConfiguration();
        }

        $this->json_mapper = new JsonMapper();

        $this->json_mapper->classMap[DateTimeInterface::class] = DateTime::class;

        $this->configureClient($configuration);
    }

    /**
     * @param ConfigurationInterface|ClientInterface|null $configuration
     * @param string $path
     * @throws QaseException
     */
    private function configureClient($configuration = null, $path = "./")
    {
        if ($configuration instanceof ClientInterface) {
            $this->client = $configuration;
            return;
        }

//        if ($configuration === null) {
//            if (!file_exists($path.'.env')) {
//                // If calling the getcwd() on laravel it will returning the 'public' directory.
//                $path = '../';
//            }
//            $configuration = new DotEnvConfiguration($path);
//        }

        $config = [
            'base_uri' => $configuration->getQaseHost(),
            'verify' => $configuration->isCurlOptSslVerifyHost(),
            'http_errors' => false,
            'headers' => [
                'User-Agent' => $configuration->getCurlOptUserAgent(),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Token' => $configuration->getApiToken()
            ]
        ];

        if ($configuration->getProxyServer()) {
            $uri = (new Uri($configuration->getProxyServer()))
                ->withPort($configuration->getProxyPort());

            if ($configuration->getProxyUser()) {
                $uri = $uri->withUserInfo($configuration->getProxyUser(), $configuration->getProxyPassword());
            }

            $config['proxy'] = (string) $uri;
        }

        if ($configuration->isCurlOptSslCert()) {
            $config['cert'] = $configuration->isCurlOptSslCert();

            if ($configuration->isCurlOptSslCertPassword()) {
                $config['cert'] = [$configuration->isCurlOptSslCert(), $configuration->isCurlOptSslCertPassword()];
            }
        }

        if ($configuration->isCurlOptSslKey()) {
            $config['ssl_key'] = $configuration->isCurlOptSslKey();

            if ($configuration->isCurlOptSslCertPassword()) {
                $config['ssl_key'] = [$configuration->isCurlOptSslKey(), $configuration->isCurlOptSslKeyPassword()];
            }
        }

        $this->client = new GuzzleAdapter(new Client($config));
    }

    /**
     * Execute REST request.
     *
     * @param string $context Rest API context (ex.:issue, search, etc..)
     * @param null $post_data
     * @param null $custom_request [PUT|DELETE]
     * @return string|bool
     * @throws QaseException
     */
    public function exec($context, $post_data = null, $custom_request = null)
    {
        $url = $this->createUrlByContext($context);

        $method = $custom_request ?? "GET";
        $body = $method !== "GET" ? $post_data : null;

        $response = $this->client->sendRequest(new Request($method, $url, [], $body));
        $http_response = $response->getStatusCode();
        $content = $response->getBody()->getContents();

        //TODO check status!
        if (!$content) {
            if (in_array($http_response, [204, 201, 200], true)) {
                return true;
            }

            // HostNotFound, No route to Host, etc Network error
            $msg = sprintf('CURL Error: http response=%d, %s', $http_response, $content);

            throw new QaseException($msg);
        }

        if (!in_array($http_response, [201, 200], true)) {
            throw new QaseException('CURL HTTP Request Failed: Status Code : '
                . $http_response . ', URL:' . $url
                . "\nError Message : " . $content, $http_response);
        }

        return $content;
    }

    /**
     * convert to query array to http query parameter.
     *
     * @param array $paramArray
     *
     * @return string
     */
    protected function toHttpQueryParameter(array $paramArray)
    {
        if (empty($paramArray)) {
            return null;
        }

        return '?' . http_build_query($paramArray);
    }

    /**
     * Get URL by context.
     *
     * @param string $context
     *
     * @return string
     */
    protected function createUrlByContext($context)
    {
        return $this->api_uri . '/' . preg_replace('/\//', '', $context, 1);
    }
}
