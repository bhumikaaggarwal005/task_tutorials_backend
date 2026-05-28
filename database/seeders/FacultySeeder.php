<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faculty;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | RAMESH
        |--------------------------------------------------------------------------
        */

        Faculty::create([
            'user_id' => 2,
            'date_of_joining' => '2024-01-10',
            'qualification' => 'M.Sc Mathematics',
            'bio' => 'Experienced maths faculty'
        ]);

        /*
        |--------------------------------------------------------------------------
        | SURESH
        |--------------------------------------------------------------------------
        */

        Faculty::create([
            'user_id' => 3,
            'date_of_joining' => '2024-02-15',
            'qualification' => 'M.A English',
            'bio' => 'English faculty'
        ]);
    }
}