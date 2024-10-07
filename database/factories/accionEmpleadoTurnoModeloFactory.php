<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{accionEmpleadoTurnoModelo, turnoAsignadoModelo};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class accionEmpleadoTurnoModeloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'turno_asignado_id' => turnoAsignadoModelo::factory(),
            'solicitud' => $this->faker->randomElement(['Cancelar y Reembolsar']), // Generar "Re-agendar" o "Cancelar"
            'motivo' => $this->faker->sentence(), // Motivo generado con texto aleatorio
            'respuesta' => $this->faker->sentence(), // Respuesta generada con texto aleatorio
        ];
    }
}
