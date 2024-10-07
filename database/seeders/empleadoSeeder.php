<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\empleadoModelo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class empleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //empleadoModelo::factory()->count(10)->create();

        DB::table('empleado')->insert([
            'ci' => '1234568881',
            'nombre' => 'Admin',
            'apellido' => 'Administrador',
            'email' => '3@example.com',
            'telefono' => '0987654321',
            'password' => Hash::make('admin'), // Cifrar la contraseña
            'cumple' => '1990-05-15',
            'rol' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
