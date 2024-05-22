<?php

namespace Crm\Customer\Services;
use Crm\Customer\Repositories\CustomerRepository;
use Crm\Customer\Services\Export\ExportInterface;
use Crm\Customer\Exceptions\InvalidExportFormat;
use Crm\Customer\Services\Export\JsonExport;
use Crm\Customer\Services\Export\HtmlExport;
use Crm\Customer\Services\Export\PdfExport;
class CustomerExportService
{
    private CustomerRepository $customerRepository;
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    /*======================================*/
    // try code here --this is bad code
    /*================by interface and config file======================*/
    // public function export(string $format)
    // {
    //     $customers = $this->customerRepository->all();
    //     $handler = config('export.exporters')[$format] ?? null;
    //     if(!$handler)
    //     {
    //         throw new InvalidExportFormat(sprintf('format %s is not supported', $format));
    //     }
    //     $exporter = new $handler();
    //     if($exporter instanceof ExportInterface)
    //     {
    //         $exporter->export($customers->toArray());//must be an array, due to all returns collection
    //     }
        /*==============By switch case bad code===============*/
        // switch($format)
        // {
        //     case 'json':
        //         // $this->export_Json($customers);
        //         $exporter = new JsonExport();
        //         break;
        //     case 'html':
        //         // $this->export_Html($customers);
        //         $exporter = new HtmlExport();
        //         break;
        //     case 'pdf':
        //         // $this->export_Pdf($customers);
        //         $exporter = new PdfExport();
        //         break;
        //     default:
        //         // throw new InvalidExportFormat(sprintf('format %s is not supported', $format));
        // }
        // $exporter->export($customers);
    // }
    /*========================================*/
    // private function export_Json($data)
    // {
    //     //code
    // }
    // private function export_Html($data)
    // {
    //     //code
    // }
    // private function export_Pdf($data)
    // {
    //     //code
    // }
    /*====================By factory way===================*/
    public function export(ExportInterface $exporter)
    {
        $customers = $this->customerRepository->all();
        $exporter->export($customers->toArray());
    }
    /*======================================*/
}