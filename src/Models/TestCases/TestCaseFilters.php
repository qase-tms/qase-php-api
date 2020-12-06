<?php


namespace QaseRestApi\Models\TestCases;


class TestCaseFilters
{
    /** @var string */
    public $search;

    /** @var int */
    public $milestone_id;

    /** @var int */
    public $suite_id;

    /** @var string[] */
    public $severity; //?: Severity[];

    /** @var string[] */
    public $priority;//?: Priority[];

    /** @var string[] */
    public $type;//?: Type[];

    /** @var string[] */
    public $behavior;//?: Behavior[];

    /** @var string[] */
    public $automation;//?: Automation[];

    /** @var string[] */
    public $status;//?: TestCaseStatus[];

    /**
     * @param string $search
     * @return TestCaseFilters
     */
    public function setSearch(string $search)
    {
        $this->search = $search;

        return $this;
    }

    /**
     * @param int $milestone_id
     * @return TestCaseFilters
     */
    public function setMilestoneId(int $milestone_id)
    {
        $this->milestone_id = $milestone_id;

        return $this;
    }

    /**
     * @param int $suite_id
     * @return TestCaseFilters
     */
    public function setSuiteId(int $suite_id)
    {
        $this->suite_id = $suite_id;

        return $this;
    }

    /**
     * @param string[] $severity
     * @return TestCaseFilters
     */
    public function setSeverity(array $severity)
    {
        $this->severity = $severity;

        return $this;
    }

    /**
     * @param string[] $priority
     * @return TestCaseFilters
     */
    public function setPriority(array $priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @param string[] $type
     * @return TestCaseFilters
     */
    public function setType(array $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param string[] $behavior
     * @return TestCaseFilters
     */
    public function setBehavior(array $behavior)
    {
        $this->behavior = $behavior;

        return $this;
    }

    /**
     * @param string[] $automation
     * @return TestCaseFilters
     */
    public function setAutomation(array $automation)
    {
        $this->automation = $automation;

        return $this;
    }

    /**
     * @param string[] $status
     * @return TestCaseFilters
     */
    public function setStatus(array $status)
    {
        $this->status = $status;

        return $this;
    }
}