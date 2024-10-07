<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\resenaModelo;

class resenaSeeder extends Seeder
{
    public function run(): void
    {
        resenaModelo::factory()->count(10)->create();
    }
}
