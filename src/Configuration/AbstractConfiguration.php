<?php

namespace QaseRestApi\Configuration;

/**
 * Class AbstractConfiguration.
 */
abstract class AbstractConfiguration implements ConfigurationInterface
{
    /**
     * Qase host.
     *
     * @var string
     */
    protected $qaseHost;

    /**
     * Qase API token.
     *
     * @var string
     */
    protected $apiToken;

    /**
     * Curl options CURLOPT_SSL_VERIFYHOST.
     *
     * @var bool
     */
    protected $curlOptSslVerifyHost;

    /**
     * Curl options CURLOPT_SSL_VERIFYPEER.
     *
     * @var bool
     */
    protected $curlOptSslVerifyPeer;

    /**
     * Curl option CURLOPT_USERAGENT.
     *
     * @var string
     */
    protected $curlOptUserAgent;

    /**
     * Curl options CURLOPT_VERBOSE.
     *
     * @var bool
     */
    protected $curlOptVerbose;

    /**
     * Proxy server.
     *
     * @var string
     */
    protected $proxyServer;

    /**
     * Proxy port.
     *
     * @var string
     */
    protected $proxyPort;

    /**
     * Proxy user.
     *
     * @var string
     */
    protected $proxyUser;

    /**
     * Proxy password.
     *
     * @var string
     */
    protected $proxyPassword;

    /** @var string */
    protected $curlOptSslCert;

    /** @var string */
    protected $curlOptSslCertPassword;

    /** @var string */
    protected $curlOptSslKey;

    /** @var string */
    protected $curlOptSslKeyPassword;

    /**
     * @return string
     */
    public function getQaseHost()
    {
        return $this->qaseHost;
    }

    /**
     * @return string
     */
    public function getApiToken()
    {
        return $this->apiToken;
    }

    /**
     * @return bool
     */
    public function isCurlOptSslVerifyHost()
    {
        return $this->curlOptSslVerifyHost;
    }

    /**
     * @return bool
     */
    public function isCurlOptSslVerifyPeer()
    {
        return $this->curlOptSslVerifyPeer;
    }

    /**
     * @return string
     */
    public function isCurlOptSslCert()
    {
        return $this->curlOptSslCert;
    }

    /**
     * @return string
     */
    public function isCurlOptSslCertPassword()
    {
        return $this->curlOptSslCertPassword;
    }

    /**
     * @return string
     */
    public function isCurlOptSslKey()
    {
        return $this->curlOptSslKey;
    }

    /**
     * @return string
     */
    public function isCurlOptSslKeyPassword()
    {
        return $this->curlOptSslKeyPassword;
    }

    /**
     * @return bool
     */
    public function isCurlOptVerbose()
    {
        return $this->curlOptVerbose;
    }

    /**
     * Get curl option CURLOPT_USERAGENT.
     *
     * @return string
     */
    public function getCurlOptUserAgent()
    {
        return $this->curlOptUserAgent;
    }

    /**
     * get default User-Agent String.
     *
     * @return string
     */
    public function getDefaultUserAgentString()
    {
        $curlVersion = curl_version();

        return sprintf('curl/%s (%s)', $curlVersion['version'], $curlVersion['host']);
    }

    /**
     * @return string
     */
    public function getProxyServer()
    {
        return $this->proxyServer;
    }

    /**
     * @return string
     */
    public function getProxyPort()
    {
        return $this->proxyPort;
    }

    /**
     * @return string
     */
    public function getProxyUser()
    {
        return $this->proxyUser;
    }

    /**
     * @return string
     */
    public function getProxyPassword()
    {
        return $this->proxyPassword;
    }
}
