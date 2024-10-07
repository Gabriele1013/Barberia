<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ordenModelo;

class ordenSeeder extends Seeder
{
    public function run(): void
    {
        ordenModelo::factory()->count(10)->create();
    }
}
