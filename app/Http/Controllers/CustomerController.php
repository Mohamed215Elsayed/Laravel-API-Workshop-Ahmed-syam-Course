<?php

namespace App\Http\Controllers;

use Crm\Customer\Requests\CustomerRequest;
use Illuminate\Http\Request;
use \Symfony\Component\HttpFoundation\Response;
use Crm\Customer\Services\CustomerService;
use Crm\Customer\Services\CustomerExportService;
use Crm\Customer\Services\Export\ExportFactory;
use Illuminate\Http\JsonResponse;
use Crm\Base\ResponseBuilder;

class CustomerController extends Controller
{
    /*==============================*/
    private CustomerService $customerService;
    private CustomerExportService $customerExportService;
    public function __construct(CustomerService $customerService, CustomerExportService $customerExportService)
    {
        $this->customerService = $customerService;
        $this->customerExportService = $customerExportService;
    }
    /*==========get all customers====================*/
    public function index(Request $request)
    {

        // return $this->customerService->index($request);//1
        /****/
        //for error
        // return reponseBuilder()
        // ->setErrors(['generic' => 'Not Allowed'])
        // ->setStatus(ReponseBuilder()::STATUS_ERROR)
        // ->setStatusCode(JsonResponse::HTTP_BAD_REQUEST)
        // ->response();

        $customer = $this->customerService->index($request);
        return reponseBuilder() //note responseBuilder() is an helper function
            ->setData($customer)
            ->response();
    }
    /*==============================*/
    public function show($id)
    {
        // return $this->customerService->show((int)$id);//1
        // return $this->customerService->show((int) $id) ?? response()->json(['status' => 'Customer not found'], Response::HTTP_NOT_FOUND);//2
        $customer = $this->customerService->show($id);//3
        if (!$customer) {
            return reponseBuilder()
                ->setStatusCode(JsonResponse::HTTP_NOT_FOUND)
                ->setErrors(['generic' => 'Customer not found'])
                ->response();
        }
        return reponseBuilder()
            ->setData($customer)
            ->response();
    }
    public function create(CustomerRequest $request)
    {
        // return $this->customerService->create($request);
        return $this->customerService->create($request->name);
    }

    public function update(Request $request, $id)
    {
        return $this->customerService->update($request, $id);
    }
    public function delete(Request $request, $id)
    {
        $this->customerService->delete($request, $id);
    }
    public function export(Request $request)
    {
        /*====================*/
        // dd($request->get('format','json'));
        // $this->customerExportService->export($request->get('format','json'));
        /*====================*/
        $format = $request->get('format', 'json');
        $exporter = ExportFactory::instance($format);
        $this->customerExportService->export($exporter);
    }
}
