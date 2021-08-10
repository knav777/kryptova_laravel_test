<?php

namespace App\Jobs;

use App\Models\Employee;
use App\Traits\ToolsTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class InsertEmployeesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, ToolsTrait;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $employees = $this->getDataEmployees();

        if( !empty( $employees ) ){

            foreach( $employees as $row ){
                
                if( is_null( Employee::find( $row->id ) ) ){
    
                    $employee = new Employee();
                    $employee->id = $row->id;
                    $employee->name = $row->employee_name;
                    $employee->salary = $row->employee_salary;
                    $employee->age = $row->employee_age;
                    $employee->profile_picture = $row->profile_image;
                    $employee->save();
                }
            }
        }

    }
}
