<?php

namespace Crm\Customer\Services;
use Illuminate\Http\Request;
use Crm\Customer\Models\Customer;
use \Symfony\Component\HttpFoundation\Response;
use Crm\Customer\Requests\CustomerRequest;
use Crm\Customer\Events\CustomerCreation;
use Crm\Customer\Repositories\CustomerRepository;//
class CustomerService
{
    /*===========================*/
    private CustomerRepository $customerRepository;
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    /*===========================*/
    /*=============get all customers==============*/
    public function index(Request $request){
        // return Customer::all();//1
        // return [
        // 'analatics' => $this->customerRepository->customerAnalytics(),
        // 'customers' => $this->customerRepository->all(),
        // ];//2
        
        return $this->customerRepository->all();//3
    }
    /*================show customer by id================*/
    public function show($id)
    {
        /*
        // $customer = Customer::find($id);
        // if (!$customer) {
        //     return response()->json(['status' => 'Customer not found'],Response::HTTP_NOT_FOUND);
        // }
         */
        // return Customer::find($id)?? response()->json(['status' => 'Customer not found'],Response::HTTP_NOT_FOUND);
        // $customer = $this->customerRepository->find($id);
        // return $customer ?? response()->json(['status' => 'Customer not found'],Response::HTTP_NOT_FOUND);
        /** */
        return $this->customerRepository->find($id);
    }
        public function create(string $name)
    {
        $customer = new Customer();
        $customer->name = $name;
        $customer->save();

        event(new CustomerCreation($customer));
        return $customer;
    }
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['status' => 'Customer not found'],Response::HTTP_NOT_FOUND);
        }
        $customer->name = $request->get('name');
        $customer->save();
        return $customer;
    }
    public function delete(Request $request, $id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['status' => 'Customer not found'],Response::HTTP_NOT_FOUND);
        }
        $customer->delete();
        return response()->json(['status' => 'Customer deleted'],Response::HTTP_OK);
    }
}
