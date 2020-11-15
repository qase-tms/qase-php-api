<?php

namespace QaseRestApi\Configuration;

/**
 * Class ArrayConfiguration.
 */
class ArrayConfiguration extends AbstractConfiguration
{
    /**
     * @param array $configuration
     */
    public function __construct(array $configuration)
    {
        $this->curlOptSslVerifyHost = false;
        $this->curlOptSslVerifyPeer = false;
        $this->curlOptSslCert = '';
        $this->curlOptSslCertPassword = '';
        $this->curlOptSslKey = '';
        $this->curlOptSslKeyPassword = '';
        $this->curlOptVerbose = false;
        $this->curlOptUserAgent = $this->getDefaultUserAgentString();

        foreach ($configuration as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
