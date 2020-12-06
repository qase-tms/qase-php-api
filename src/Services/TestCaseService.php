<?php

namespace QaseRestApi\Services;

use QaseRestApi\Models\TestCases\TestCase;
use QaseRestApi\Models\TestCases\TestCaseFilters;
use QaseRestApi\Models\TestCases\TestCaseList;
use QaseRestApi\QaseClient;

class TestCaseService extends QaseClient
{
    private $uri = '/case';

    /**
     * @param $code
     * @param TestCaseFilters $filters
     * @return mixed|object
     * @throws \JsonMapper_Exception
     * @throws \QaseRestApi\QaseException
     */
    public function getAll($code, TestCaseFilters $filters)
    {
        $response = $this->exec($this->uri . '/' . $code);

        return $this->json_mapper->map(
            json_decode($response, false)->result,
            new TestCaseList()
        );
    }

    /**
     * @param string $code
     * @param string $case_id
     * @return TestCase
     * @throws \JsonMapper_Exception
     * @throws \QaseRestApi\QaseException
     */
    public function get($code, $case_id)
    {
        $response = $this->exec($this->uri . '/' . $code . '/' . $case_id);

        return $this->json_mapper->map(
            json_decode($response, false)->result,
            new TestCase()
        );
    }
}