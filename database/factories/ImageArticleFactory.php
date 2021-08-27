<?php

namespace Database\Factories;

use App\Models\ImageArticle;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ImageArticle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "path" => $this->imageUrl(640, 480),
        ];
    }
}
