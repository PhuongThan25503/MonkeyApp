<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
 */
class StoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author_id' => fake()->numberBetween(1,5),
            'type_id' => fake()->numberBetween(1,3),
            'name' => fake()->name,
            'thumbnail' => 'https//'.fake()->city.'jpg',
            'coin' => fake()->numberBetween(20,100),
            'isActive' => 1,
        ];
    }
}
