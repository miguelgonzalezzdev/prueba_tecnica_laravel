<?php

namespace Database\Seeders;

use App\Models\EstadosPresupuesto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosPresupuestosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = ['Pendiente', 'Aceptado', 'Denegado'];

        foreach ($estados as $nombre) {
            EstadosPresupuesto::create([
                'nombre' => $nombre
            ]);
        }
    }
}
