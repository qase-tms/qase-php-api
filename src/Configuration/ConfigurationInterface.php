<?php

namespace QaseRestApi\Configuration;

/**
 * Interface ConfigurationInterface.
 */
interface ConfigurationInterface
{
    /**
     * Qase host.
     *
     * @return string
     */
    public function getQaseHost();

    /**
     * Qase API token.
     *
     * @return string
     */
    public function getApiToken();

    /**
     * Curl options CURLOPT_SSL_VERIFYHOST.
     *
     * @return bool
     */
    public function isCurlOptSslVerifyHost();

    /**
     * Curl options CURLOPT_SSL_VERIFYPEER.
     *
     * @return bool
     */
    public function isCurlOptSslVerifyPeer();

    /**
     * @return string
     */
    public function isCurlOptSslCert();

    /**
     * @return string
     */
    public function isCurlOptSslCertPassword();

    /**
     * @return string
     */
    public function isCurlOptSslKey();

    /**
     * @return string
     */
    public function isCurlOptSslKeyPassword();

    /**
     * Curl options CURLOPT_VERBOSE.
     *
     * @return bool
     */
    public function isCurlOptVerbose();

    /**
     * Get curl option CURLOPT_USERAGENT.
     *
     * @return string
     */
    public function getCurlOptUserAgent();

    /**
     * Proxy server.
     *
     * @return string
     */
    public function getProxyServer();

    /**
     * Proxy port.
     *
     * @return string
     */
    public function getProxyPort();

    /**
     * Proxy user.
     *
     * @return string
     */
    public function getProxyUser();

    /**
     * Proxy password.
     *
     * @return string
     */
    public function getProxyPassword();
}
