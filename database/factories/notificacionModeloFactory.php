<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{turnoAsignadoModelo, notificacionModelo};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class notificacionModeloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'turno_asignado_id' => turnoAsignadoModelo::factory(), // Crea un turno asignado relacionado
            'notificacion_usuario' => $this->faker->sentence(), // Genera un mensaje de notificación para el usuario
            'notificacion_empleado' => $this->faker->sentence(), // Genera un mensaje de notificación para el empleado
            'vista_usuario' => $this->faker->boolean(), // Genera un valor booleano aleatorio
            'vista_empleado' => $this->faker->boolean(), // Genera un valor booleano aleatorio
        ];
    }
}
