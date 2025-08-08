<?php

namespace Database\Factories;

use App\Models\ForoResults;
use App\Models\Register;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ForoResults>
 */
class ForoResultsFactory extends Factory
{
    protected $model = ForoResults::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'register_id' => Register::inRandomOrder()->first()?->id,
            'foro_score' => fake()->numberBetween(0, 5),
            'event_score' =>  fake()->numberBetween(0, 5),
        ];
    }
}
