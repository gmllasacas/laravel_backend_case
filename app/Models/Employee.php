<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name_prefix',
        'first_name',
        'middle_initial',
        'last_name',
        'gender',
        'e_mail',
        'fathers_name',
        'mothers_name',
        'mothers_maiden_name',
        'date_of_birth',
        'date_of_joining',
        'salary',
        'ssn',
        'phone_no',
        'city',
        'state',
        'zip',
    ];
}
