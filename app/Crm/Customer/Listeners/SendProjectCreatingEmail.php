<?php

namespace Crm\Customer\Listeners;

use Crm\Project\Events\ProjectCreation;//
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Crm\Customer\Services\CustomerService;//
class SendProjectCreatingEmail 
{
    private CustomerService $customerService;
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function handle(ProjectCreation $event): void
    {
        $project = $event->getProject();
        $customer = $this->customerService->show($project->customer_id);
        // dd($project,$customer);
        //here u can send emails
        // for sales parts
    }
}
