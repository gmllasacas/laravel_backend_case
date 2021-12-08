<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'emp_id' => 'required|numeric|unique:App\Models\Employee,id',
            'name_prefix' => 'required|string|max:10',
            'first_name' => 'required|string|max:255',
            'middle_initial' => 'sometimes|required|string|size:1',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|size:1',
            'e_mail' => 'required|email|max:255',
            'fathers_name' => 'required|string|max:255',
            'mothers_name' => 'required|string|max:255',
            'mothers_maiden_name' => 'sometimes|required|string|max:50',
            'date_of_birth' => 'required|date_format:n/j/Y',
            'date_of_joining' => 'required|date_format:n/j/Y',
            'salary' => 'required|numeric',
            'ssn' => 'required|string|max:255',
            'phone_no' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|size:2',
            'zip' => 'required|numeric',
        ];
    }
}
