<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // You can use the factory method if you want to create random Teacher records.
        // Teacher::factory()->count(10)->create();
        // Teacher::factory(5)->create();

        // Call multiple seeders in one go
        $this->call([

            GroupSeeder::class,
            MemberSeeder::class
            // EmployeeSeeder::class, // Uncomment if needed
        ]);

        // Example of creating a specific user with factory
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
