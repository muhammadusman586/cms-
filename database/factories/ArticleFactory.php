<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'image' => fake()->image('storage/app/public/uploads', 640, 480, null, false),
        'postdate'    => fake()->date(),
        'title'       => fake()->sentence(),
        'content'     => fake()->paragraph(),
        'authorname'  => fake()->name(),
        'authortitle' => fake()->jobTitle(),
        'category'    => fake()->randomElement(['Tech', 'Health', 'Sports', 'Politics', 'Entertainment']),
    ];
}

}
