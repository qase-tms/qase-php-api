<?php


namespace QaseRestApi\Models\Projects;


class ProjectCreate
{
    /** @var string */
    public $title;

    /** @var string */
    public $code;

    /** @var string */
    public $description;
    //    public access: AccessLevel = AccessLevel.NONE,

    /** @var string */
    public $group;

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param string $group
     */
    public function setGroup(string $group)
    {
        $this->group = $group;

        return $this;
    }
}