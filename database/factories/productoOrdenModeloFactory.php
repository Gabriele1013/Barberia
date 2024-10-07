<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{ordenModelo, productoModelo, productoOrdenModelo};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class productoOrdenModeloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'producto_id' => productoModelo::factory(), // Relaciona un producto generado con esta tabla
            'cantidad' => $this->faker->numberBetween(1, 100), // Cantidad entre 1 y 100
            'orden_id' => ordenModelo::factory(), // Relaciona una orden generada con esta tabla
        ];
    }
}
