<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TextConfig;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TypeSeeder::class,
            AuthorSeeder::class,
            StorySeeder::class,
            PageSeeder::class,
            TextSeeder::class,
            AudioSeeder::class,
            TextConfigSeeder::class,
            TouchSeeder::class,
        ]);
    }
}
