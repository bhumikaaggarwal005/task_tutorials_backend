<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | MATHS
        |--------------------------------------------------------------------------
        */

        Subject::create([
            'faculty_id' => 1,
            'name' => 'Mathematics'
        ]);

        /*
        |--------------------------------------------------------------------------
        | ENGLISH
        |--------------------------------------------------------------------------
        */

        Subject::create([
            'faculty_id' => 2,
            'name' => 'English'
        ]);
    }
}