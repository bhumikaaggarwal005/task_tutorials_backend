<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */

        User::create([
            'role_id' => 3,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'phone_no' => '9999999999'
        ]);

        /*
        |--------------------------------------------------------------------------
        | FACULTY USERS
        |--------------------------------------------------------------------------
        */

        User::create([
            'role_id' => 2,
            'name' => 'Ramesh',
            'email' => 'ramesh@gmail.com',
            'password' => Hash::make('password'),
            'phone_no' => '8888888888'
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Suresh',
            'email' => 'suresh@gmail.com',
            'password' => Hash::make('password'),
            'phone_no' => '7777777777'
        ]);

        /*
        |--------------------------------------------------------------------------
        | STUDENT USERS
        |--------------------------------------------------------------------------
        */

        User::create([
            'role_id' => 1,
            'name' => 'Aman',
            'email' => 'aman@gmail.com',
            'password' => Hash::make('password'),
            'phone_no' => '6666666666'
        ]);

        User::create([
            'role_id' => 1,
            'name' => 'Rahul',
            'email' => 'rahul@gmail.com',
            'password' => Hash::make('password'),
            'phone_no' => '5555555555'
        ]);
    }
}