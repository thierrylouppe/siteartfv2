<?php

namespace Database\Factories;

use App\Models\Publication;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Publication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "titre" => $this->faker->text($maxNbChars = 100),
            "user_id" => rand(1, 5),
            "typepublication" => "etude",
            'status' => rand(0, 1),
            "pathfichier" => "reglementations/arretes/arrete.pdf",
        ];
    }
}
