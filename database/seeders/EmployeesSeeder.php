<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\Http\Traits\Helper;
//use App\Repositories\EmployeeRepository;

class EmployeesSeeder extends Seeder
{
    use Helper;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $file = base_path("database/data/employee_data.csv");
        
        $data = $this->importCSV($file);
        if(count($data) > 0){
            DB::beginTransaction();
            Employee::truncate();
            try {
                $index = 0;
                foreach ($data as $key => $row) {

                    $validator = Validator::make($row, $this->employeeImportValidationRules());

                    if ($validator->fails()) {
                        $output->writeln("<error>[ROW $index NOT INSERTED] Validation:</error> ". $validator->errors());
                    }else{
                        $employee = new Employee();
                        $row['id'] = $row['emp_id'];
                        unset($row['emp_id']);
                        $row['date_of_birth'] = \Carbon\Carbon::parse($row['date_of_birth'])->format('Y-m-d');
                        $row['date_of_joining'] = \Carbon\Carbon::parse($row['date_of_joining'])->format('Y-m-d');
                        $employee->fill($row);
                        $employee->save();
                    }
                    $index++;
                }

                DB::commit();
            
            } catch (\Throwable $e) {
                DB::rollBack();
                $output->writeln("<error>Employee seeder failed! Verify the data of the file and run the seeder manually.</error>");
                $output->writeln($e->getMessage());
            }
        }else{
            $output->writeln("<error>The employee CSV file does not exist, is restricted or have no rows.</error>");
            $output->writeln("<error>Verify the file and run the seeder manually.</error>");
        }
    }
}
