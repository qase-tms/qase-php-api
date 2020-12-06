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

    /** @var string */
    public $access = 'none';

    /** @var string */
    public $group;

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode(string $code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param string $group
     * @return $this
     */
    public function setGroup(string $group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * @param string $access
     * @return $this
     */
    public function setAccess(string $access)
    {
        $this->access = $access;

        return $this;
    }
}