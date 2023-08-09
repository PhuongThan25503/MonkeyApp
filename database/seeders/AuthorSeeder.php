<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        $faker = FakerFactory::create(); //create a fakerFactory

        for ($i = 0; $i < 5; $i++) {
            DB::table('author')->insert([
                'name' => $faker->name, //get name
                'DOB' => $faker->date(), // get date
                'gender' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
