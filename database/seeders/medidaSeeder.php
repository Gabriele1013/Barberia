<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\medidaModelo;

class medidaSeeder extends Seeder
{
    public function run(): void
    {
        medidaModelo::factory()->count(10)->create();
    }
}
