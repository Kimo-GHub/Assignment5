<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 50; $i++) {
            DB::table('students')->insert([
                'name' => $faker->name,
                'age' => rand(18, 25),
            ]);
        }
    }
}