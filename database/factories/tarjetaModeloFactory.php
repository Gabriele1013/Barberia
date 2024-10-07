<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{tarjetaModelo, usuarioModelo};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class tarjetaModeloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'usuario_id' => usuarioModelo::factory(), // Relaciona un usuario generado con esta tabla
            'titular' => $this->faker->name(), // Nombre del titular
            'numero_cuenta' => $this->faker->bankAccountNumber(), // Número de cuenta (puedes cambiar esto si tienes un formato específico)
            'ano_fin' => $this->faker->numberBetween(2024, 2030), // Año de expiración
            'mes_fin' => $this->faker->numberBetween(1, 12), // Mes de expiración (1-12)
            'cvv' => $this->faker->bothify('###'), // CVV (tres dígitos)
        ];
    }
}
