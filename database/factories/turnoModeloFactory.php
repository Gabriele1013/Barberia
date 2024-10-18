<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{turnoModelo, empleadoModelo};
use DateTime;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class turnoModeloFactory extends Factory
{
    // Definir una propiedad estática para mantener la hora de inicio actual
    protected static $currentStartTime = '08:00:00';

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Obtener la fecha actual y sumar la hora de inicio y fin
        $date = $this->faker->date();
        $startTime = new DateTime($date . ' ' . self::$currentStartTime); // Tiempo de inicio
        $endTime = (clone $startTime)->modify('+1 hour'); // Tiempo de fin, sumando 1 hora al tiempo de inicio

        // Si el tiempo de fin es mayor a las 18:00, reiniciamos a las 08:00
        if ($endTime > new DateTime($date . ' 18:00:00')) {
            self::$currentStartTime = '08:00:00'; // Reiniciar a las 08:00 AM
            $startTime = new DateTime($date . ' ' . self::$currentStartTime); // Reiniciar el tiempo de inicio
            $endTime = (clone $startTime)->modify('+1 hour'); // Establecer el tiempo de fin
        } else {
            // Si no hemos llegado a las 18:00, avanzar la hora de inicio para el próximo turno
            self::$currentStartTime = $endTime->format('H:i:s');
        }

        return [
            'nombre' => $this->faker->jobTitle(),
            'desc' => $this->faker->paragraph(),
            'precio' => $this->faker->randomFloat(2, 50, 1000),
            'empleado_id' => empleadoModelo::factory(),
            'fecha_inicio' => $startTime->format('Y-m-d H:i:s'), // Formato correcto de fecha y hora
            'fecha_fin' => $endTime->format('Y-m-d H:i:s'),
            'estado' => $this->faker->randomElement(['Disponible', 'Reservado']),
        ];
    }
}
