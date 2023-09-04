<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales')->insert([
            [
                'employee_id' => 1,
                'sales'       => 15000,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
            [
                'employee_id' => 2,
                'sales'       => 12000,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
            [
                'employee_id' => 3,
                'sales'       => 18000,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
            [
                'employee_id' => 1,
                'sales'       => 20000,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
            [
                'employee_id' => 4,
                'sales'       => 22000,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
            [
                'employee_id' => 5,
                'sales'       => 19000,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
            [
                'employee_id' => 6,
                'sales'       => 13000,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
            [
                'employee_id' => 2,
                'sales'       => 14000,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
        ]);
    }
}
