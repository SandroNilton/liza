<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

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
          'name' => 'Admin',
          'email' => 'admin@gmail.com',
          'email_verified_at' => now(),
          'password' => bcrypt('admin'),
          'type' => 1,
        ]);

        User::create([
          'name' => 'User',
          'email' => 'user@gmail.com',
          'email_verified_at' => now(),
          'password' => bcrypt('user'),
          'type' => 0,
        ]);
    }
}
