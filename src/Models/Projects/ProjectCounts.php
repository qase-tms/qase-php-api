<?php

namespace QaseRestApi\Models\Projects;

class ProjectCounts
{
    /** @var int */
    public $cases;

    /** @var int */
    public $suites;

    /** @var int */
    public $milestones;

    /** @var ProjectCountsRuns */
    public $runs;

    /** @var ProjectCountsDefects */
    public $defects;
}