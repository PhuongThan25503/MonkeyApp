<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Webmozart\Assert\Tests\StaticAnalysis\integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'story_id'=>fake()->numberBetween(1,10),
            'background'=> 'https/imageValley.com/'.fake()->city.'.jpg',
            'page_num' => fake()->numberBetween(1,10),
        ];
    }
}
