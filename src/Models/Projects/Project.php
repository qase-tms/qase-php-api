<?php

namespace QaseRestApi\Models\Projects;

class Project
{
    /** @var string */
    public $code;

    /** @var string */
    public $title;

    /** @var ProjectCounts */
    public $counts;
}