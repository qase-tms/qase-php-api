<?php


namespace QaseRestApi\Models\TestCases;


use QaseRestApi\Models\Base\BaseList;

class TestCaseList extends BaseList
{
    /** @var TestCase[] */
    public $entities;
}