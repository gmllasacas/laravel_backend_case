<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

trait Helper
{

    /**
     * Return a response
     *
     * @param array $data
     * @param String $message
     * @param Integer $code
     * @return JsonResponse
     */
    protected function onSuccess($data, string $message = '', int $code = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    /**
     * Return a response for errors
     *
     * @param Integer $code
     * @param String $message
     * @return JsonResponse
     */
    protected function onError(int $code, string $message = ''): JsonResponse
    {
        return response()->json([
            'message' => $message,
        ], $code);
    }

    /**
     * Custom validation
     *
     * @return array
     */
    protected function employeeImportValidationRules(): array
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
            'mothers_maiden_name' => 'sometimes|string|max:50',
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

    /**
     * Export the CSV file to a formatted array
     *
     * @param  String  $filename
     * @param  String  $delimiter
     * @return array
     */
    public static function importCSV($filename, $delimiter = ','): array
    {
        if(!file_exists($filename) || !is_readable($filename))
        return array();
        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false){
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false){
                if(!$header){
                    $row = array_map(function($tag) {
                        return Str::slug($tag, '_');
                    }, $row);
                    $header = $row;
                }else{
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }
        return $data;
    }
}