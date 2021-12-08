<?php


namespace App\Repositories;


use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Exception;

class EmployeeRepository
{
    /**
     * @var Employee
     */
    protected $model;

    /**
     * EmployeeRepository constructor.
     *
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->model = $employee;
    }

    /**
     * Set a new employee model into de model attribute
     *
     * @param Employee $employee
     */
    public function setEmployee(Employee $employee)
    {
        $this->model = $employee;
    }

    /**
     * Create a new employee
     *
     * @param array $data
     *
     * @return void
     *
     * @throws Exception
     */
    public function create(array $data): void
    {
        try {
            DB::beginTransaction();

            $this->model->id = $data['emp_id'];
            $this->model->name_prefix = $data['name_prefix'];
            $this->model->first_name = $data['first_name'];
            $this->model->middle_initial = $data['middle_initial'];
            $this->model->last_name = $data['last_name'];
            $this->model->gender = $data['gender'];
            $this->model->e_mail = $data['e_mail'];
            $this->model->fathers_name = $data['fathers_name'];
            $this->model->mothers_name = $data['mothers_name'];
            $this->model->mothers_maiden_name = $data['mothers_maiden_name'];
            $this->model->date_of_birth = \Carbon\Carbon::parse($data['date_of_birth'])->format('Y-m-d');
            $this->model->date_of_joining = \Carbon\Carbon::parse($data['date_of_joining'])->format('Y-m-d');
            $this->model->salary = $data['salary'];
            $this->model->ssn = $data['ssn'];
            $this->model->phone_no = $data['phone_no'];
            $this->model->city = $data['city'];
            $this->model->state = $data['state'];
            $this->model->zip = $data['zip'];
            $this->model->save();
            $this->model->refresh();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();

            $message = 'Failed to register employee, ' .
                'error: ' . $e->getMessage();

            throw new Exception($message);
        }
    }

    /**
     * Update an employee
     *
     * @param array $data
     *
     * @return void
     *
     * @throws Exception
     */
    public function update(array $data): void
    {
        try {
            DB::beginTransaction();

            $this->model->name_prefix = $data['name_prefix'] ?? $this->model->name_prefix;
            $this->model->first_name = $data['first_name'] ?? $this->model->first_name;
            $this->model->middle_initial = $data['middle_initial'] ?? $this->model->middle_initial;
            $this->model->last_name = $data['last_name'] ?? $this->model->last_name;
            $this->model->gender = $data['gender'] ?? $this->model->gender;
            $this->model->e_mail = $data['e_mail'] ?? $this->model->e_mail;
            $this->model->fathers_name = $data['fathers_name'] ?? $this->model->fathers_name;
            $this->model->mothers_name = $data['mothers_name'] ?? $this->model->mothers_name;
            $this->model->mothers_maiden_name = $data['mothers_maiden_name'] ?? $this->model->mothers_maiden_name;
            $this->model->date_of_birth = $data['date_of_birth'] ? \Carbon\Carbon::parse($data['date_of_birth'])->format('Y-m-d') : $this->model->date_of_birth;
            $this->model->date_of_joining = $data['date_of_birth'] ? \Carbon\Carbon::parse($data['date_of_joining'])->format('Y-m-d') : $this->model->date_of_joining;
            $this->model->salary = $data['salary'] ?? $this->model->salary;
            $this->model->ssn = $data['ssn'] ?? $this->model->ssn;
            $this->model->phone_no = $data['phone_no'] ?? $this->model->phone_no;
            $this->model->city = $data['city'] ?? $this->model->city;
            $this->model->state = $data['state'] ?? $this->model->state;
            $this->model->zip = $data['zip'] ?? $this->model->zip;
            $this->model->save();
            $this->model->refresh();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();

            $message = 'Failed to update employee, ' .
                'error: ' . $e->getMessage();

            throw new Exception($message);
        }
    }


}
