<?php


class ProjectTest extends PHPUnit_Framework_TestCase
{
    public function testGetProject()
    {
        $proj = new \QaseRestApi\Services\ProjectService();

        $p = $proj->get('DEMO1', ['limit' => 1, 'offset' => 1]);
        dump($p);
    }

    public function testCreateProject()
    {
        $projectCreate = (new \QaseRestApi\Models\Projects\ProjectCreate())
            ->setCode('TEST')
            ->setDescription('123')
            ->setTitle('qwerty');


        $proj = new \QaseRestApi\Services\ProjectService();

        $p = $proj->create($projectCreate);
        dump($p);
    }
}
