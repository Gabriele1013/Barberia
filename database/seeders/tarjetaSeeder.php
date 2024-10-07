<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tarjetaModelo;

class tarjetaSeeder extends Seeder
{
    public function run(): void
    {
        tarjetaModelo::factory()->count(10)->create();
    }
}
