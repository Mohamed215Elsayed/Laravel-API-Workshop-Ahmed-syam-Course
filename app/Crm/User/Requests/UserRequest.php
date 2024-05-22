<?php

namespace Crm\User\Requests;

use Crm\Base\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
        ];
    }
}
