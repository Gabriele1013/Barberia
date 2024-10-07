<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\accionUsuarioTurnoModelo;

class accionUsuarioTurnoSeeder extends Seeder
{
    public function run(): void
    {
        accionUsuarioTurnoModelo::factory()->count(10)->create();
    }
}
