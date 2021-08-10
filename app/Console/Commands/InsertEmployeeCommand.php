<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use App\Models\Employee;
use App\Traits\ToolsTrait;

class InsertEmployeeCommand extends Command
{
    use ToolsTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert the data of the employees';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $employees = $this->getDataEmployees();

        if( empty( $employees ) ){
            $this->warn( 'No data could be obtained, try again' );
            return 0;
        }

        foreach( $employees as $row ){
            
            if( is_null( Employee::find( $row->id ) ) ){

                $employee = new Employee();
                $employee->id = $row->id;
                $employee->name = $row->employee_name;
                $employee->salary = $row->employee_salary;
                $employee->age = $row->employee_age;
                $employee->profile_picture = $row->profile_image;
                $employee->save();

                $this->info( 'id: ' . $employee->id . ' employee: ' . $employee->name . '  added !' );
                break;
            }
        }

        return 0;
    }


}
