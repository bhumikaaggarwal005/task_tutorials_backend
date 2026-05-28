<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasRole;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasRole::create([
            'name' => 'student'
        ]);

        MasRole::create([
            'name' => 'faculty'
        ]);

        MasRole::create([
            'name' => 'admin'
        ]);
    }
}