<?php

namespace Database\Seeders;
use Crm\User\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            User::create([
            'name' => 'Mohamed Elsayed',
            'email' => 'Mohamed@example.com',
            'password' => Hash::make('password123654'),
        ]);
            User::create([
            'name' => 'Eman',
            'email' => 'Eman@yahoo.com',
            'password' => Hash::make('password123654')
        ]);
    }
}
