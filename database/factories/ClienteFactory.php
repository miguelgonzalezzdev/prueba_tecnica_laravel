<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Provincia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition()
    {
        // Provincia aleatoria
        $provincia = Provincia::inRandomOrder()->first();

        // Generar DNI
        $numero = $this->faker->unique()->numberBetween(10000000, 99999999);
        $letra = chr(65 + rand(0, 25));
        $dni = $numero . $letra;

        return [
            'dni' => $dni,
            'nombre' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'telefono' => $this->faker->optional()->numerify('##########'),
            'email' => $this->faker->optional()->safeEmail,
            'provincia' => $provincia ? $provincia->id : null,
        ];
    }
}
