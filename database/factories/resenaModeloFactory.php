<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{usuarioModelo, empleadoModelo, resenaModelo};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class resenaModeloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'usuario_id' => usuarioModelo::factory(),
            'empleado_id' => empleadoModelo::factory(),
            'stars' => $this->faker->numberBetween(1, 5),
        ];
    }
}
