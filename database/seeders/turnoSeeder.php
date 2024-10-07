<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\turnoModelo;

class turnoSeeder extends Seeder
{
    public function run(): void
    {
        turnoModelo::factory()->count(10)->create();
    }
}
