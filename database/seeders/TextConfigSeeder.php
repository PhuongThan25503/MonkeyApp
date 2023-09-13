<?php

namespace Database\Seeders;

use App\Models\TextConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TextConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TextConfig::factory()->count(10)->create();
    }
}
