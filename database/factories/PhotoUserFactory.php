<?php

namespace Database\Factories;

use App\Models\PhotoUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PhotoUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "path" => $this->imageUrl(60, 60),
        ];
    }
}
