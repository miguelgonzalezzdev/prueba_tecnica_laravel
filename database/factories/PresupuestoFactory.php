<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\EstadosPresupuesto;
use App\Models\Presupuesto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PresupuestoFactory extends Factory
{

    protected $model = Presupuesto::class;

    public function definition(): array
    {
        // Obtener el ultimo codigo generado
        $ultimo = Presupuesto::orderBy('id', 'desc')->first();
        if ($ultimo) {
            // Extraer el numero del código
            $numero = (int) substr($ultimo->codigo, 1) + 1;
        } else {
            $numero = 1;
        }

        $codigo = 'P' . str_pad($numero, 4, '0', STR_PAD_LEFT);

        // Cliente aleatorio (puede ser null)
        $cliente = Cliente::inRandomOrder()->first();

        // Estado aleatorio 
        $estado = EstadosPresupuesto::inRandomOrder()->first();

        return [
            'codigo' => 'TEMP',
            'fecha' => $this->faker->dateTimeBetween('-10 days', '+10 days'),
            'titulo' => $this->faker->sentence(3),
            'estado' => $estado ? $estado->id : 1,
            'total' => $this->faker->numberBetween(50, 1000),
            'cliente' => $cliente ? $cliente->id : null,
        ];
    }
}
