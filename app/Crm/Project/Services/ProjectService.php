<?php
namespace Crm\Project\Services;
use Crm\Project\Events\ProjectCreation;
use Illuminate\Http\Request;
use Crm\Project\Requests\ProjectRequest;
use Crm\Project\Models\Project;
class ProjectService 
{
    public function index(Request $request)
    {
        return Project::all();
    }
    public function createProject(ProjectRequest $request, int $customerId)
    {
        $project = new Project();
        $project->project_name = $request->project_name;
        $project->status = (bool)$request->status;
        $project->customer_id = $customerId;
        $project->project_cost = (float)$request->project_cost;
        $project->save();
        event(new ProjectCreation($project));
        return $project;
    }
}