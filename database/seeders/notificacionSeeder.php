<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\notificacionModelo;

class notificacionSeeder extends Seeder
{
    public function run(): void
    {
        notificacionModelo::factory()->count(10)->create();
    }
}
