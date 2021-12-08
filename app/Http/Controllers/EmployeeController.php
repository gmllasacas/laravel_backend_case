<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Employee;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EmployeeCollection;
use App\Http\Traits\Helper;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Repositories\EmployeeRepository;

class EmployeeController extends Controller
{
    use Helper;

    /**
     * @var EmployeeRepository
     */
    protected $employee_repository;

    /**
     * EmployeeController constructor.
     *
     * @param EmployeeRepository $employee_repository
     */
    public function __construct(EmployeeRepository $employee_repository)
    {
        $this->employee_repository = $employee_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        /*if ($request->user()->tokenCan('user:get')) {
            return (new UserResource($request->user()))->response()->setStatusCode(200);
        }else{
            return response()->json([
                'message' => 'Unauthorized.'
            ],500);
        }*/
        return View::make('employees.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\View\View
     */
    public function filtered()
    {
        return View::make('employees.filtered');
    }

    /**
     * List of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        try {
            $employees = Employee::all();

            return (new EmployeeCollection($employees))->response()->setStatusCode(200);
        } catch (\Throwable $e) {
            return $this->onError(500, $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return  \Illuminate\Http\JsonResponse
     */
    public function store(StoreEmployeeRequest $request): JsonResponse
    {
        try {
            $validated = $request->validated();
            $this->employee_repository->create($validated);

            return $this->onSuccess([], 'Employee registered successfully');
        } catch (\Throwable $e) {
            return $this->onError(500, $e->getMessage());
        }
    }

    /**
     * Get a specified resource.
     *
     * @param  int  $id
     * @return  \Illuminate\Http\JsonResponse
     */
    public function get($id): JsonResponse
    {
        try {
            $employee = Employee::findOrFail($id);

            return (new EmployeeResource($employee))->response()->setStatusCode(200);
        } catch (\Throwable $e) {
            return $this->onError(500, $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @param  int  $id
     * @return  \Illuminate\Http\JsonResponse
     */
    public function update(UpdateEmployeeRequest $request, $id)//: JsonResponse
    {
        try {
            $request->request->remove('id');
            $validated = $request->validated();  

            $employee = Employee::findOrFail($id);
            $this->employee_repository->setEmployee($employee);
            $this->employee_repository->update($validated);

            return $this->onSuccess([], 'Employee updated successfully');
        } catch (\Throwable $e) {
            return $this->onError(500, $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return  \Illuminate\Http\JsonResponse
     */
    public function destroy($id)//: JsonResponse
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();

            return $this->onSuccess([], 'Employee deleted successfully');
        } catch (\Throwable $e) {
            return $this->onError(500, $e->getMessage());
        }
    }
}
