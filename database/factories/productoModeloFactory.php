<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{productoModelo, medidaModelo};
use DateTime;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class productoModeloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(), // Nombre del producto
            'desc' => $this->faker->sentence(), // Descripción del producto
            'medida_id' => medidaModelo::factory(), // Generar una medida asociada (100ml, 200ml, etc.)
            'precio' => $this->faker->randomFloat(2, 1, 100), // Precio del producto (entre 1 y 100)
            'codigo' => $this->faker->lexify(str_repeat('?', rand(4, 10))),
            'expira' => $this->faker->dateTimeBetween('now', '+2 years'), // Generar una fecha de expiración futura (hasta 2 años)
            'popularidad' => $this->faker->numberBetween(1, 5),
            'imagenUrl' => $this->faker->sentence(),
        ];
    }
}
