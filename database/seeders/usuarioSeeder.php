<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\usuarioModelo;

class usuarioSeeder extends Seeder
{
    public function run(): void
    {
        usuarioModelo::factory()->count(10)->create();
    }
}
