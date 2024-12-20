<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class salarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'salary' => '12000',
                'name' => 'Jatin'
            ],
            [
                'salary' => '15000',
                'name' => 'nitin'
            ],
            [
                'salary' => '21100',
                'name' => 'Akash'
            ]
        ];
        DB::table('table_salary')->insert($data);
    }
}
