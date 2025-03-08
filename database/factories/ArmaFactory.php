<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Personaje;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Arma>
 */
class ArmaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'tipo' => $this->faker->randomElement(['Espada', 'Arco', 'Bastón']),
            'daño' => $this->faker->numberBetween(10, 100),
            'cadencia' => $this->faker->randomFloat(2, 0.5, 3.0),
            'personaje_id' => Personaje::factory(), // Relación con un personaje
        ];
    }
}
