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
            "titre" => $this->faker->text($maxNbChars = 100),
            "contenue" => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            "slug" => $this->faker->slug,
            'user_id'=> rand(1, 4),
            'image' => $this->faker->imageUrl(640, 480),
            'status' => rand(0, 1),
        ];
    }
}
