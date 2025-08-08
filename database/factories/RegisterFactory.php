<?php

namespace Database\Factories;

use App\Enums\RegisterEmotion;
use App\Models\Register;
use App\Models\Results;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Register>
 */
class RegisterFactory extends Factory
{
    protected $model = Register::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'emotion' => fake()->randomElement(RegisterEmotion::cases()),
            'song' => fake()->url(),
            'profesional_id' => 1,
        ];
    }
}
