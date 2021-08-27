<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "titre" => $this->faker->text(1),
            "contenue" => $this->faker->paragraph(2),
            "slug" => $this->faker->slug,
            "user_id" => $this->faker->sentence(1),
            "image_article_id" => rand(1, 4),
            "statu_article" => rand(0, 1),
        ];
    }
}
