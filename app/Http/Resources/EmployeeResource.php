<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name_prefix' => $this->name_prefix,
            'first_name' => $this->first_name,
            'middle_initial' => $this->middle_initial,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'e_mail' => $this->e_mail,
            'fathers_name' => $this->fathers_name,
            'mothers_name' => $this->mothers_name,
            'mothers_maiden_name' => $this->mothers_maiden_name,
            'date_of_birth' => date("n/j/Y", strtotime($this->date_of_birth)),
            'date_of_joining' => date("n/j/Y", strtotime($this->date_of_joining)),
            'salary' => $this->salary,
            'ssn' => $this->ssn,
            'phone_no' => $this->phone_no,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
