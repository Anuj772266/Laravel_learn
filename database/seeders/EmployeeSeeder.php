<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Facades\File;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('json/employee.json'));;
        $employees = collect(json_decode($json));
        
        $employees->each(function($employee) {
            Employee::create([
                'name' => $employee->name,
                'email' => $employee->email,
                'age' => $employee->age,
                'city' => $employee->city
            ]);
        });
        
        
    }
}
