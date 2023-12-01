<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'address' => 'admin',
            'number_phone' => 'admin',
            'date_of_birth' => 'admin',
            'email' => 'fika.rafika04@gmail.com',
            'password' => bcrypt('Fika@romi25'),
            'role' => 1
        ]);
    }
}
