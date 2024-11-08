<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;
use Faker\Factory as Faker;


class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groupIds = \App\Models\Group::pluck('id')->toArray();
        $faker = Faker::create();
        for($i = 1; $i < 100; $i++){
            $member = new Member;
            $member->member_name = $faker->name;
            $member->member_email = $faker->email;
            $member->member_contact = $faker->phoneNumber;
            $member->group_id = $faker->randomElement($groupIds);
            $member->save();
        }

    }
}
