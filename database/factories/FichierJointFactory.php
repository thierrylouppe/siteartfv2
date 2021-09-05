<?php

namespace Database\Factories;

use App\Models\FichierJoint;
use Illuminate\Database\Eloquent\Factories\Factory;

class FichierJointFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FichierJoint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "path" => $this->faker->file(public_path('files/uploads/tmp'), public_path('files/uploads'), false),
        ];
    }
}
