<?php

namespace Crm\Customer\Requests;
use Crm\Base\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' =>  'required|min:3'
        ];
    }
}
