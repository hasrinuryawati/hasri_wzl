<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
                'name'        => "John Smith",
                'job_title'   => "Manager",
                'salary'      => 60000,
                'department'  => "Sales",
                'joined_date' => "2022-01-15",
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
            [
                'name'        => "Jane Doe",
                'job_title'   => "Analyst",
                'salary'      => 45000,
                'department'  => "Marketing",
                'joined_date' => "2022-02-01",
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
            [
                'name'        => "Mike Brown",
                'job_title'   => "Developer",
                'salary'      => 55000,
                'department'  => "IT",
                'joined_date' => "2022-03-10",
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
            [
                'name'        => "Anna Lee",
                'job_title'   => "Manager",
                'salary'      => 65000,
                'department'  => "Sales",
                'joined_date' => "2021-12-05",
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
            [
                'name'        => "Mark Wong",
                'job_title'   => "Developer",
                'salary'      => 50000,
                'department'  => "IT",
                'joined_date' => "2023-05-20",
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
            [
                'name'        => "Emily Chen",
                'job_title'   => "Analyst",
                'salary'      => 48000,
                'department'  => "Marketing",
                'joined_date' => "2023-06-02",
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
        ]);
    }
}
