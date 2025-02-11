<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(5, true),
            'slug' => fake()->slug(),
            'description' => fake()->text(),
            'content' => fake()->text(500),
            'is_published' => false,
            'published_at' => \Date::now()
        ];
    }
}
