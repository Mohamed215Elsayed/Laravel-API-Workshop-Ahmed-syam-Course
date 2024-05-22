<?php

namespace Crm\Customer\Repositories;

use Crm\Customer\Models\Customer;
use App\Crm\Base\Repositories\Repository; //general repo class
use Illuminate\Database\Eloquent\Model;

class CustomerRepository extends Repository
{
    public function __construct(Customer $customer)
    {
        $this->setModel($customer);
    }
    //override on find fn
    // public function find($id): ?Model
    // {
    //     $customers = $this->getModel()->with('complex query')->find($id);
    //     return $customers;
    // }
    public function customerAnalytics(): array
    {
        //execute some queries
        return [];
    }
}
