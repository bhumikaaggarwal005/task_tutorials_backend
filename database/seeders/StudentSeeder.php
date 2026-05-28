<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'user_id' => 4,
            'dob' => '2005-08-15',
            'address' => 'Jaipur Rajasthan'
        ]);

        Student::create([
            'user_id' => 5,
            'dob' => '2006-02-20',
            'address' => 'Delhi India'
        ]);
    }
}