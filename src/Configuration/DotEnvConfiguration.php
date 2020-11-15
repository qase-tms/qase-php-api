<?php

namespace QaseRestApi\Configuration;

use Dotenv\Dotenv;

/**
 * Class DotEnvConfiguration.
 */
class DotEnvConfiguration extends AbstractConfiguration
{
    /**
     * @param string $path
     */
    public function __construct($path = '..')
    {
        $this->loadDotEnv($path);

        $this->qaseHost = $this->env('QASE_HOST');
        $this->apiToken = $this->env('QASE_API_TOKEN');
        $this->curlOptSslVerifyHost = $this->env('CURLOPT_SSL_VERIFYHOST', false);
        $this->curlOptSslVerifyPeer = $this->env('CURLOPT_SSL_VERIFYPEER', false);
        $this->curlOptSslCert = $this->env('CURLOPT_SSL_CERT');
        $this->curlOptSslCertPassword = $this->env('CURLOPT_SSL_CERT_PASSWORD');
        $this->curlOptSslKey = $this->env('CURLOPT_SSL_KEY');
        $this->curlOptSslKeyPassword = $this->env('CURLOPT_SSL_KEY_PASSWORD');
        $this->curlOptUserAgent = $this->env('CURLOPT_USERAGENT', $this->getDefaultUserAgentString());
        $this->curlOptVerbose = $this->env('CURLOPT_VERBOSE', false);
        $this->proxyServer = $this->env('PROXY_SERVER');
        $this->proxyPort = $this->env('PROXY_PORT');
        $this->proxyUser = $this->env('PROXY_USER');
        $this->proxyPassword = $this->env('PROXY_PASSWORD');
    }

    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     *
     * @param string $key
     * @param mixed $default
     *
     * @return mixed
     */
    private function env($key, $default = null)
    {
        $value = $_ENV[$key] ?? null;

        if ($value === false) {
            return $default;
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return null;
        }

        if (preg_match('/\A([\'"])(.*)\1\z/', $value, $matches)) {
            return $matches[2];
        }

        return $value;
    }

    /**
     * load dotenv.
     *
     * @param string $path
     *
     */
    private function loadDotEnv(string $path)
    {
        $dotenv = Dotenv::createImmutable($path);

        $dotenv->safeLoad();
        $dotenv->required([
            'QASE_HOST',
            'QASE_API_TOKEN'
        ]);
    }
}
