<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\salary;

class salarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        salary::factory(500)->create();
        // \App\Models\salary::factory(500)->create();
        // $data = [
        //     [
        //         'salary' => '12000',
        //         'user_id' => '1'
        //     ],
        //     [
        //         'salary' => '15000',
        //         'user_id' => '1'
        //     ],
        //     [
        //         'salary' => '21100',
        //         'user_id' => '2'
        //     ]
        // ];
        // DB::table('table_salary')->insert($data);
    }
}
