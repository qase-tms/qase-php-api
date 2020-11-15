<?php


namespace QaseRestApi\Models\TestCases;


class TestCase
{
    /** @var int */
    public $id;

    /** @var int */
    public $position;

    /** @var string */
    public $title;

    /** @var string|null */
    public $description;

    /** @var string|null */
    public $preconditions;

    /** @var string|null */
    public $postconditions;

    /** @var string */
    public $severity;

    /** @var string */
    public $priority;

    /** @var string */
    public $type;

    /** @var string */
    public $behavior;

    /** @var string */
    public $automation;

    /** @var string */
    public $status;

    /** @var int|null */
    public $milestone_id;

    /** @var int */
    public $suite_id;

    /** @var array */
    public $tags;

    /** @var array */
    public $links;

    /** @var string */
    public $revision;

    /** @var array */
    public $custom_fields;

    /** @var array */
    public $attachments;

    /** @var array */
    public $steps;

    /** @var \DateTimeInterface */
    public $created;

    /** @var \DateTimeInterface */
    public $updated;
}