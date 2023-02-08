<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CatColaboradoresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->name(),
            'apellido_paterno' => fake()->firstName(),
            'apellido_materno' => fake()->lastName(),
            'telefono' => fake()->phoneNumber(),
            'correo_electronico' => fake()->email(),
            'user_id' => 1
        ];
    }
}
