<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        // Seed user data
        DB::table('users')->insert([
            'name' => 'Hein Htet',
            'email' => 'heinhtetjkrz@gmail.com',
            'password' => Hash::make('izmejoker@48'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
