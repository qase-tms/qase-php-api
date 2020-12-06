<?php


namespace QaseRestApi\Services;


use QaseRestApi\Models\Projects\Project;
use QaseRestApi\Models\Projects\ProjectCreate;
use QaseRestApi\Models\Projects\ProjectCreated;
use QaseRestApi\Models\Projects\ProjectList;
use QaseRestApi\QaseClient;

class ProjectService extends QaseClient
{
    private $uri = '/project';

    /**
     * @param array $paramArray
     * @return ProjectList
     * @throws \JsonMapper_Exception
     * @throws \QaseRestApi\QaseException
     */
    public function getAll($paramArray = [])
    {
        $response = $this->exec($this->uri . $this->toHttpQueryParameter($paramArray));

        return $this->json_mapper->map(
            json_decode($response, false)->result,
            new ProjectList()
        );
    }

    /**
     * @param $code
     * @return Project
     * @throws \JsonMapper_Exception
     * @throws \QaseRestApi\QaseException
     */
    public function get($code)
    {
        $response = $this->exec($this->uri . '/' . $code);

        return $this->json_mapper->map(
            json_decode($response, false)->result,
            new Project()
        );
    }

    /**
     * @param ProjectCreate $projectCreate
     * @return ProjectCreated
     * @throws \JsonMapper_Exception
     * @throws \QaseRestApi\QaseException
     */
    public function create(ProjectCreate $projectCreate)
    {
        $data = json_encode($projectCreate);

        $response = $this->exec($this->uri, $data, 'POST');

        return $this->json_mapper->map(
            json_decode($response, false)->result,
            new ProjectCreated()
        );
    }
}