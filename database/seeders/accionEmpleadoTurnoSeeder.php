<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\accionEmpleadoTurnoModelo;

class accionEmpleadoTurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        accionEmpleadoTurnoModelo::factory()->count(10)->create();
    }
}
