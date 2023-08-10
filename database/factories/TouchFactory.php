<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Touch>
 */
class TouchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id'=>fake()->numberBetween(1,100),
            'text_id'=>fake()->numberBetween(1,100),
            'data'=>implode(',', fake()->localCoordinates),
        ];
    }
}
