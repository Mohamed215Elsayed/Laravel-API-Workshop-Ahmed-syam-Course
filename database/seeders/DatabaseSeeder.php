<?php

namespace Database\Seeders;
use Crm\User\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([UserSeeder::class]);
        $this->call([CustomerSeeder::class]);
    }
}
