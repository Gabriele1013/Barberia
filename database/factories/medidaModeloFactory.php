<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\medidaModelo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class medidaModeloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'medida' => $this->faker->numberBetween(1, 1000), // Generar un valor entre 1 y 1000
            'unidad' => $this->faker->randomElement(['kg', 'm', 'cm', 'g', 'l', 'ml']), // Unidad de medida entre las opciones
        ];
    }
}
