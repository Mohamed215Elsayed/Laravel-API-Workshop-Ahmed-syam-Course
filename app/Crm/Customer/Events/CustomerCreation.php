<?php

namespace Crm\Customer\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use  Crm\Customer\Models\Customer;//
class CustomerCreation
{
    private Customer $customer;//
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public function __construct(Customer $customer)
    {
        // $this->customer = $customer;
        $this->setCustomer($customer);
    }
    public function setCustomer(Customer $customer):void
    {
        $this->customer = $customer;
    }

    public function getCustomer():Customer
    {
        return $this->customer;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
