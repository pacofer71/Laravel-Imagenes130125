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
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));
        return [
            'nombre'=>fake()->unique()->sentence(4, true),
            'descripcion'=>fake()->text(),
            'disponible'=>fake()->randomElement(['SI', 'NO']),
            'imagen'=>'images/articles/'.fake()->picsum('public/storage/images/articles', 640, 480, false),

        ];
    }
}
