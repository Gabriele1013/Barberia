<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\productoOrdenModelo;

class productoOrdenSeeder extends Seeder
{
    public function run(): void
    {
        productoOrdenModelo::factory()->count(10)->create();
    }
}
