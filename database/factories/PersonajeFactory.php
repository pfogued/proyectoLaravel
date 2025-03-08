<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personaje>
 */
class PersonajeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'tipo' => $this->faker->randomElement(['Atacante', 'Defensor']),
            'unidad_especial' => $this->faker->word(),
            'vida' => $this->faker->numberBetween(50, 200),
            'velocidad' => $this->faker->numberBetween(1, 10),
        ];
    }
}
