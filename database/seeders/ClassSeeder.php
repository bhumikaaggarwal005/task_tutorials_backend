<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassModel;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | 10TH MATHS
        |--------------------------------------------------------------------------
        */

        ClassModel::create([

            'faculty_id' => 1,

            'subject_id' => 1,

            'name' => '10th',

            'class_link' => 'https://meet.google.com/maths-class',

            'class_date' => '2026-05-30',

            'start_time' => '10:00:00',

            'end_time' => '11:00:00'
        ]);

        /*
        |--------------------------------------------------------------------------
        | 10TH ENGLISH
        |--------------------------------------------------------------------------
        */

        ClassModel::create([

            'faculty_id' => 2,

            'subject_id' => 2,

            'name' => '10th',

            'class_link' => 'https://meet.google.com/english-class',

            'class_date' => '2026-05-30',

            'start_time' => '12:00:00',

            'end_time' => '01:00:00'
        ]);
    }
}