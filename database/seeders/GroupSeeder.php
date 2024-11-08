<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;
use Faker\Factory as Faker;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 1; $i < 100; $i++){
            $group = new Group;
            $group->name = $faker->name;
            $group->email = $faker->email;
            $group->age = $faker->numberBetween(18, 80);
            $group->save();
        }

    }
}
