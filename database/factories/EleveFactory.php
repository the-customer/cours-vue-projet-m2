<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eleve>
 */
class EleveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom'               => fake()->lastName,
            'prenom'            => fake()->firstName,
            'sexe'              => fake()->randomElement(['M', 'F']),
            'numero'            => fake()->unique()->numberBetween(1000, 9999),
            'naissance'         => fake()->dateTimeBetween('-18 years', 'now'),
            'lieu'    => fake()->city,
        ];
    }
}
