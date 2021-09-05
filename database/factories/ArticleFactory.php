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
            "titre" => $this->faker->text($maxNbChars = 6),
            "contenue" => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            "slug" => $this->faker->slug,
        ];
    }
}
