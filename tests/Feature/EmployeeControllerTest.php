<?php

namespace Tests\Feature;

use http\Client\Response;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use App\Models\Employee;

/**
 * Class EmployeeControllerTest
 *
 * Run these specific tests
 * php artisan test tests/Feature/EmployeeControllerTest.php
 *
 * @package Tests\Feature\
 */
class EmployeeControllerTest extends TestApi
{
    /**
     * API endpoint
     */
    const ENDPOINT_AUTH = '/api/employees';

    /**
     * Return mock data for a new user creation
     *
     * @return array
     */
    private function getNewEmployeeMockData(): array
    {
        return [
            'id'=>111111,
            'name_prefix'=>'Dr.',
            'first_name'=>'New Name',
            'middle_initial'=>'Z',
            'last_name'=>'Last Name New',
            'gender'=>'M',
            'e_mail'=>'new@mail.com',
            'fathers_name'=>'New Fathers name',
            'mothers_name'=>'New Mothers name',
            'mothers_maiden_name'=>'New Maiden name',
            'date_of_birth'=>'1999-01-01',
            'date_of_joining'=>'2019-01-01',
            'salary'=>'66666',
            'ssn'=>'111-11-1111',
            'phone_no'=>'111-111-1111',
            'city'=>'New City',
            'state'=>'AA',
            'zip'=>'11111',
        ];
    }

    /**
     * @test
     *
     * @return void
     */
    public function register_a_new_employee()
    {
        $new_data = [
            'emp_id'=>111115,
            'name_prefix'=>'Dr.',
            'first_name'=>'New Name',
            'middle_initial'=>'Z',
            'last_name'=>'Last Name New',
            'gender'=>'M',
            'e_mail'=>'new_employee@mail.com',
            'fathers_name'=>'New Fathers name',
            'mothers_name'=>'New Mothers name',
            'mothers_maiden_name'=>'New Maiden name',
            'date_of_birth'=>'1/1/1999',
            'date_of_joining'=>'1/1/2019',
            'salary'=>'66666',
            'ssn'=>'111-11-1111',
            'phone_no'=>'111-111-1111',
            'city'=>'New City',
            'state'=>'AA',
            'zip'=>'11111',
        ];

        $response = $this->withHeader('Authorization', 'Bearer ' . $this->getToken())->json('POST', self::ENDPOINT_AUTH , $new_data);

        $response->assertStatus(200);
        $response->assertJsonPath('message', 'Employee registered successfully');
    }

    /**
     * @test
     *
     * @return void
     */
    public function employee_register_fails_with_an_id_on_use()
    {
        $employee_mock = Employee::create($this->getNewEmployeeMockData());

        $new_data = [
            'emp_id'=>111111,
            'name_prefix'=>'Dr.',
            'first_name'=>'New Name',
            'middle_initial'=>'Z',
            'last_name'=>'Last Name New',
            'gender'=>'M',
            'e_mail'=>'new_employee@mail.com',
            'fathers_name'=>'New Fathers name',
            'mothers_name'=>'New Mothers name',
            'mothers_maiden_name'=>'New Maiden name',
            'date_of_birth'=>'1/1/1999',
            'date_of_joining'=>'1/1/2019',
            'salary'=>'66666',
            'ssn'=>'111-11-1111',
            'phone_no'=>'111-111-1111',
            'city'=>'New City',
            'state'=>'AA',
            'zip'=>'11111',
        ];

        $response = $this->withHeader('Authorization', 'Bearer ' . $this->getToken())->json('POST', self::ENDPOINT_AUTH , $new_data);

        $response->assertStatus(422);
        $response->assertJsonStructure(['message','errors' => ['emp_id']]);
    }

    /**
     * @test
     *
     * @return void
     */
    public function update_an_employee()
    {
        $employee_mock = Employee::create($this->getNewEmployeeMockData());

        $new_data = [
            'name_prefix'=>'Dr.',
            'first_name'=>'Edited Name',
            'middle_initial'=>'Z',
            'last_name'=>'Edited Last Name',
            'gender'=>'M',
            'e_mail'=>'edited_employee@mail.com',
            'fathers_name'=>'Edited Fathers name',
            'mothers_name'=>'Edited Mothers name',
            'mothers_maiden_name'=>'Edited Maiden name',
            'date_of_birth'=>'1/1/1998',
            'date_of_joining'=>'1/1/2020',
            'salary'=>'55555',
            'ssn'=>'111-11-1111',
            'phone_no'=>'111-111-1111',
            'city'=>'New City',
            'state'=>'BB',
            'zip'=>'22222',
        ];

        $response = $this->withHeader('Authorization', 'Bearer ' . $this->getToken())->json('PATCH', self::ENDPOINT_AUTH . '/111111', $new_data);

        $response->assertStatus(200);
        $response->assertJsonPath('message', 'Employee updated successfully');
    }

    /**
     * @test
     *
     * @return void
     */
    public function employee_update_fails_if_doesnt_exist()
    {
        $new_data = [
            'name_prefix'=>'Dr.',
            'first_name'=>'Edited Name',
            'middle_initial'=>'Z',
            'last_name'=>'Edited Last Name',
            'gender'=>'M',
            'e_mail'=>'edited_employee@mail.com',
            'fathers_name'=>'Edited Fathers name',
            'mothers_name'=>'Edited Mothers name',
            'mothers_maiden_name'=>'Edited Maiden name',
            'date_of_birth'=>'1/1/1998',
            'date_of_joining'=>'1/1/2020',
            'salary'=>'55555',
            'ssn'=>'111-11-1111',
            'phone_no'=>'111-111-1111',
            'city'=>'New City',
            'state'=>'BB',
            'zip'=>'22222',
        ];

        $response = $this->withHeader('Authorization', 'Bearer ' . $this->getToken())->json('PATCH', self::ENDPOINT_AUTH . '/111111', $new_data);

        $response->assertStatus(500);
        $response->assertJsonStructure(['message']);
    }

    /**
     * @test
     *
     * @return void
     */
    public function delete_an_employee()
    {
        $employee_mock = Employee::create($this->getNewEmployeeMockData());

        $response = $this->withHeader('Authorization', 'Bearer ' . $this->getToken())->json('DELETE', self::ENDPOINT_AUTH . '/111111', []);

        $response->assertStatus(200);
        $response->assertJsonPath('message', 'Employee deleted successfully');
    }

    /**
     * @test
     *
     * @return void
     */
    public function employee_delete_fails_if_doesnt_exist()
    {

        $response = $this->withHeader('Authorization', 'Bearer ' . $this->getToken())->json('DELETE', self::ENDPOINT_AUTH . '/111111', []);

        $response->assertStatus(500);
        $response->assertJsonStructure(['message']);
    }
}
