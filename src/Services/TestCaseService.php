<?php

namespace QaseRestApi\Services;

use QaseRestApi\Models\Projects\ProjectList;
use QaseRestApi\Models\TestCases\TestCaseList;
use QaseRestApi\QaseClient;

class TestCaseService extends QaseClient
{
    private $uri = '/case';

    public function getAll($code, $paramArray = [])
    {
        $response = $this->exec($this->uri . '/' . $code);

        return $this->json_mapper->map(
            json_decode($response, false)->result,
            new TestCaseList()
        );
    }

    public function get($paramArray = [])
    {
        $response = $this->exec($this->uri);

        return $this->json_mapper->map(
            json_decode($response, false)->result,
            new ProjectList()
        );
    }
}