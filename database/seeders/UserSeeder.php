<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'user1',
            'email' => 'user1@example.com',
            'password' => Hash::make('test'),
        ]);
        User::create([
            'name' => 'user2',
            'email' => 'user2@example.com',
            'password' => Hash::make('test'),
        ]);
        User::create([
            'name' => 'user3',
            'email' => 'user3@example.com',
            'password' => Hash::make('test'),
        ]);
    }
}
