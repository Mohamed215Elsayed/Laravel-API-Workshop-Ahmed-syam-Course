<?php

namespace Crm\Project\Requests;
use Crm\Base\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends ApiRequest
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
            'project_name' => 'required|min:3',
            'status' => 'required|numeric',
            'project_cost' => 'required|numeric'
        ];
    }
}
