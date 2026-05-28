<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enrollment;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | AMAN ENROLLED IN MATHS
        |--------------------------------------------------------------------------
        */

        Enrollment::create([
            'user_id' => 4,
            'class_id' => 1,
            'dob' => '2005-08-15',
            'address' => 'Jaipur Rajasthan',
            'status' => 'approved'
        ]);

        /*
        |--------------------------------------------------------------------------
        | AMAN ENROLLED IN ENGLISH
        |--------------------------------------------------------------------------
        */

        Enrollment::create([
            'user_id' => 4,
            'class_id' => 2,
            'dob' => '2005-08-15',
            'address' => 'Jaipur Rajasthan',
            'status' => 'approved'
        ]);

        /*
        |--------------------------------------------------------------------------
        | RAHUL ENROLLED IN ENGLISH
        |--------------------------------------------------------------------------
        */

        Enrollment::create([
            'user_id' => 5,
            'class_id' => 2,
            'dob' => '2006-02-20',
            'address' => 'Delhi India',
            'status' => 'approved'
        ]);
    }
}