<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{usuarioModelo, turnoModelo, turnoAsignadoModelo};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class turnoAsignadoModeloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'turno_id' => turnoModelo::factory(), // Generar un turno asociado
            'usuario_id' => usuarioModelo::factory(), // Generar un usuario asociado
            'codigo' => $this->faker->lexify(str_repeat('?', rand(4, 10))),
            'estado' => $this->faker->randomElement(['Reservado', 'Culminado', 'Acción en proceso']),
        ];
    }
}
