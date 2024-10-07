<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\productoModelo;

class productoSeeder extends Seeder
{
    public function run(): void
    {
        productoModelo::factory()->count(10)->create();
    }
}
