<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // ========================
        // ADMIN
        // ========================
        User::factory()->create([
            'name' => 'Admin Sigma',
            'email' => 'admin@sigmastudio.com',
            'phone' => '082373840090',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        // ========================
        // STAFF
        // ========================
        User::factory()->create([
            'name' => 'Staff Sigma',
            'email' => 'staff@sigmastudio.com',
            'phone' => '0884536275717',
            'password' => Hash::make('password'),
            'role' => 'staff',
        ]);
        // ========================
        // CUSTOMER
        // ========================
        User::factory()->create([
            'name' => 'Customer',
            'email' => 'test@example.com',
            'phone' => '081245673456',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);
    }
}
