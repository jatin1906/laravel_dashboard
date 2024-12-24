<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $data = ([
            [
                'name' => 'JatinSuperadmin',
                'email' => 'Superadmin@gmail.com',
                'password' => Hash::make(12345678),
                'userType' => 'superadmin'
            ],
            [
                'name' => 'JatinAdmin',
                'email' => 'duper4682@gmail.com',
                'password' => Hash::make(12345678),
                'userType' => 'admin'
            ]
        ]);
        Db::table('users')->insert($data);
    }
}
