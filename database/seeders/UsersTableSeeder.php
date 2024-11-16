<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Dzikril Hakim',
            'email' => 'dzikril@email.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
