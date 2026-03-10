<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin EVolt',
            'email' => 'admin@evolt.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
        User::factory()->count(10)->create();
    }
}
