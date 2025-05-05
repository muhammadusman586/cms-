<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
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
            'image'        => fake()->image('storage/app/public/uploads', 640, 480, null, false),
            'postdate'     => fake()->date(),
            'title'        => fake()->sentence(),
            'content'      => fake()->paragraph(),
            'author_id'    => Author::factory(),
            'category_id'  =>  Category::factory(),
        ];
    }


}
