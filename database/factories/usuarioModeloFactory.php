<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\usuarioModelo;

class usuarioModeloFactory extends Factory
{
    protected $model = usuarioModelo::class;

    public function definition(): array
    {
        return [
            'ci' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->phoneNumber(),
            'password' => bcrypt('password'),
            'apodo' => $this->faker->userName(),
            'cumple' => $this->faker->date(),
        ];
    }
}
