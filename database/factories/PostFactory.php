<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
    public function definition()
    {
        return [
            "title" => $this->faker->title(),
            // "body" => '<p>' . implode('</p><p>', $this->faker->paragraphs(4)) . '</p>',
            "body" => $this->faker->paragraph(),
            "excerpt" => $this->faker->sentence(),
            "user_id" => User::factory(),
            "category_id" => Category::factory(),
            "slug" => $this->faker->slug()


        ];
    }
}
