<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Personaje;
use App\Models\Arma;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear 10 personajes y asociarles entre 1 y 3 armas
        Personaje::factory(10)->create()->each(function ($personaje) {
            Arma::factory(rand(1, 3))->create(['personaje_id' => $personaje->id]);
        });

        // Crear un usuario de prueba
        //User::factory()->create([
         //   'name' => 'Test User',
           // 'email' => 'test@example.com',
        //]);
    }
}
