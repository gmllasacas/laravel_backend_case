<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EmployeeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => array_map(function ($employee) {
                return [
                    'id' => $employee->id,
                    'name_prefix' => $employee->name_prefix,
                    'first_name' => $employee->first_name,
                    'middle_initial' => $employee->middle_initial,
                    'last_name' => $employee->last_name,
                    'gender' => $employee->gender,
                    'e_mail' => $employee->e_mail,
                    'fathers_name' => $employee->fathers_name,
                    'mothers_name' => $employee->mothers_name,
                    'mothers_maiden_name' => $employee->mothers_maiden_name,
                    'date_of_birth' => date("n/j/Y", strtotime($employee->date_of_birth)),
                    'date_of_joining' => date("n/j/Y", strtotime($employee->date_of_joining)),
                    'salary' => $employee->salary,
                    'ssn' => $employee->ssn,
                    'phone_no' => $employee->phone_no,
                    'city' => $employee->city,
                    'state' => $employee->state,
                    'zip' => $employee->zip,
                    'created_at' => $employee->created_at->format('d/m/Y'),
                    'updated_at' => $employee->updated_at->format('d/m/Y'),
                ];
            }, $this->all())
        ];
    }
}
