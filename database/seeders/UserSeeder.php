<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => null,
            'first_name' => "Jello",
            'last_name' => "Monasterial",
            'middle_name' => "S.",
            'username' => "jasmo",
            'email'=> "jasmonasterial@mymail.mapua.edu.ph",
            'password' => "12345",
            'role_id'=> null
        ]);

    }
}
