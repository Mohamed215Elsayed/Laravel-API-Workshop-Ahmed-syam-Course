<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Crm\Project\Services\ProjectService;
use Crm\Project\Requests\ProjectRequest;
use Crm\Customer\Services\CustomerService;
use \Symfony\Component\HttpFoundation\Response;
class ProjectController extends Controller
{
    private ProjectService $projectService;
    private CustomerService $customerService;
    public function __construct(ProjectService $projectService,CustomerService $customerService) {
        $this->projectService = $projectService;
        $this->customerService = $customerService;
    }
    
    public function index(Request $request){

        return $this->projectService->index($request);
    }

    public function createProject(ProjectRequest $request, $customerId)
{
    $customer = $this->customerService->show($customerId);
    if (!$customer) {
        return response()->json(['status' => 'Customer not found'], Response::HTTP_NOT_FOUND);
    }
    return $this->projectService->createProject($request, $customerId);
}

}
