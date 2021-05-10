<?php

namespace Database\Factories;

use App\Models\Evaluation;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvaluationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Evaluation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'rating' => rand(0,5),
            'title' => $this->faker->text($maxNbChars = 100),
            'evaluation' => $this->faker->text($maxNbChars = 1000),
            'created_at' => now(),
        ];
    }
}
