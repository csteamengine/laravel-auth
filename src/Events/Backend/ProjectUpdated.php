<?php

namespace Csteamengine\LaravelAuth\Events\Backend\Project;

use Illuminate\Queue\SerializesModels;

/**
 * Class ProjectCreated.
 */
class ProjectUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $project;

    /**
     * @param $project
     */
    public function __construct($project)
    {
        $this->project = $project;
    }
}
