<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'name_prefix' => 'sometimes|nullable|string|max:10',
            'first_name' => 'sometimes|nullable|string|max:255',
            'middle_initial' => 'sometimes|required|string|size:1',
            'last_name' => 'sometimes|required|string|max:255',
            'gender' => 'sometimes|required|string|size:1',
            'e_mail' => 'sometimes|required|email|max:255',
            'fathers_name' => 'sometimes|required|string|max:255',
            'mothers_name' => 'sometimes|required|string|max:255',
            'mothers_maiden_name' => 'sometimes|required|string|max:50',
            'date_of_birth' => 'sometimes|required|date_format:n/j/Y',
            'date_of_joining' => 'sometimes|required|date_format:n/j/Y',
            'salary' => 'sometimes|required|numeric',
            'ssn' => 'sometimes|required|string|max:255',
            'phone_no' => 'sometimes|required|string|max:255',
            'city' => 'sometimes|required|string|max:255',
            'state' => 'sometimes|required|string|size:2',
            'zip' => 'sometimes|required|numeric',
        ];
    }
}
