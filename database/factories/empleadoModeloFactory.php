<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\empleadoModelo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class empleadoModeloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ci' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(), // Correo único
            'telefono' => $this->faker->phoneNumber(), // Número de teléfono
            'password' => bcrypt('password'), // Contraseña encriptada
            'cumple' => $this->faker->date('Y-m-d', '-18 years'), // Fecha de nacimiento (mayor de 18 años)
            'rol' => $this->faker->randomElement(['admin', 'barbero', 'supervisor'])
        ];
    }
}
