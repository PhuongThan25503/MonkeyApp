<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TextConfig>
 */
class TextConfigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text_id'=>fake()->numberBetween(1,10),
            'page_id'=>fake()->numberBetween(1,100),
            'position'=>implode(',', fake()->localCoordinates),
        ];
    }
}
