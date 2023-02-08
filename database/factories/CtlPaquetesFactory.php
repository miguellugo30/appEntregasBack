<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CtlPaquetesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'guia_rastreo' => fake()->regexify('[A-Z]{5}[0-4]{3}'),
            'nombre_cliente' => fake()->name(),
            'telefono' => fake()->phoneNumber(),
            'correo_electronico' => fake()->email(),
            'direccion' => fake()->streetName(),
            'no_exterior' => fake()->buildingNumber(),
            'no_interior' => fake()->buildingNumber(),
            'colonia' => fake()->city(),
            'alcaldia_municipio' => fake()->city(),
            'codigo_postal' => fake()->postcode(),
            'estado' => fake()->city(),
            'referencias' => fake()->text(),
            'coord_latitud' => fake()->latitude(),
            'coord_longitud' => fake()->longitude(),
        ];
    }
}
