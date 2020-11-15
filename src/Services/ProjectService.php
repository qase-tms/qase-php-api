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

    public function getAll($paramArray = [])
    {
        $response = $this->exec($this->uri . $this->toHttpQueryParameter($paramArray));

        return $this->json_mapper->map(
            json_decode($response, false)->result,
            new ProjectList()
        );
    }

    public function get($code)
    {
        $response = $this->exec($this->uri . '/' . $code);

        return $this->json_mapper->map(
            json_decode($response, false)->result,
            new Project()
        );
    }

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