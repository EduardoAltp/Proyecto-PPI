<?php

namespace Database\Factories;

use App\Models\Auto;
use App\Models\Cita;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cita>
 */
class CitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array
{
    return [
        'folio'             => 'CIT-' . fake()->unique()->numerify('########'),
        'user_id'           => User::factory(),
        'auto_id'           => Auto::factory(),
        'fecha'             => fake()->dateTimeBetween('+1 day', '+30 days')->setTime(fake()->numberBetween(9, 17), 0),
        'nombre_contacto'   => fake()->name(),
        'telefono_contacto' => fake()->numerify('33########'),
        'email_contacto'    => fake()->safeEmail(),
        'comentarios'       => fake()->optional()->sentence(),
        'estatus'           => 'pendiente',
    ];
}
}
