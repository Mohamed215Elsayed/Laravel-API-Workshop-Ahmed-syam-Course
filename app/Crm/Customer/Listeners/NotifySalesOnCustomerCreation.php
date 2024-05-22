<?php

namespace Crm\Customer\Listeners;
use Crm\Customer\Events\CustomerCreation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifySalesOnCustomerCreation
{
    public function __construct()
    {
        //
    }
    public function handle(CustomerCreation $event): void
    {
        //
        $customer = $event->getCustomer();
        // dd($customer);
    }
}
