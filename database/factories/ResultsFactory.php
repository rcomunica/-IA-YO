<?php

namespace Database\Factories;

use App\Models\Register;
use App\Models\Results;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Results>
 */
class ResultsFactory extends Factory
{
    protected $model = Results::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'register_id' => Register::inRandomOrder()->first()?->id,
            'ia_score' => fake()->numberBetween(0, 5),
            'music_score' => fake()->numberBetween(0, 5),
            'profesional_score' => fake()->numberBetween(0, 5),
        ];
    }
}
