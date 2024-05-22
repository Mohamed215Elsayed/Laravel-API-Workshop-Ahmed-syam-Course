<?php

namespace Crm\Project\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use  Crm\Project\Models\Project;//

class ProjectCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private Project $project;//
    public function __construct(Project $project)
    {
        $this->setProject($project);
    }

    public function setProject(Project $project):void
    {
        $this->project = $project;
    }
    public function getProject():Project
    {
        return $this->project;
    }
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
