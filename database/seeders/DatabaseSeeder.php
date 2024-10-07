<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call(usuarioSeeder::class);
        $this->call(empleadoSeeder::class);
        $this->call(turnoSeeder::class);
        $this->call(turnoAsignadoSeeder::class);
        $this->call(accionUsuarioTurnoSeeder::class);
        $this->call(accionEmpleadoTurnoSeeder::class);
        $this->call(notificacionSeeder::class);
        $this->call(medidaSeeder::class);
        $this->call(productoSeeder::class);
        $this->call(ordenSeeder::class);
        $this->call(productoOrdenSeeder::class);
        
        $this->call(tarjetaSeeder::class);
        $this->call(resenaSeeder::class);
        


        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);
    }
}
