<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{usuarioModelo, ordenModelo};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ordenModeloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo_orden' => $this->faker->unique()->bothify('ORD-###-???'), // Genera un código de orden único (e.g., ORD-123-ABC)
            'precio_total' => $this->faker->randomFloat(2, 50, 1000), // Precio total
            'estado' => $this->faker->randomElement(['Recoger', 'Recogido']), // Estado de la orden
            'usuario_id' => usuarioModelo::factory(), // Relaciona un usuario generado con esta tabla
        ];
    }
}
