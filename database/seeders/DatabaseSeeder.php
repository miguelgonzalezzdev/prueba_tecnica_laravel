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
        // User::factory(10)->create();

        // Generar usuario de prueba
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$12$77QMPZoKfmtwJk5ZYHnAnOpXFpQklj30c7cYfwxZcMoVzy1A9PXfG',
            'created_at' => now()
        ]);

        // Generar los estados de presupuestos
        $this->call(EstadosPresupuestosSeeder::class);

        // Generar las provincias
        $this->call(ProvinciasSeeder::class);
    }
}
