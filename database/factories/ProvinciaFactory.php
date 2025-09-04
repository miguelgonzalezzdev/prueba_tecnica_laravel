<?php

namespace Database\Factories;

use App\Models\Provincia;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProvinciaFactory extends Factory
{
    protected $model = Provincia::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->state,
        ];
    }
}
