<?php

namespace Database\Seeders;

use App\Models\Touch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TouchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Touch::factory()->count(10)->create();
    }
}
