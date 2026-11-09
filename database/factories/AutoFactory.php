<?php

namespace Database\Factories;

  use App\Models\Auto;
  use App\Models\Modelo;
  use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Auto>
 */
class AutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array
{
    $nuevo = fake()->boolean(40);

    return [
        'modelo_id'   => Modelo::inRandomOrder()->value('id') ?? Modelo::factory(),
        'anio'        => $nuevo ? fake()->numberBetween(2025, 2026) : fake()->numberBetween(2015, 2024),
        'precio'      => $nuevo ? fake()->numberBetween(300, 900) * 1000 : fake()->numberBetween(120, 500) * 1000,
        'kilometraje' => $nuevo ? null : fake()->numberBetween(5000, 150000),
        'color'       => fake()->randomElement(['Blanco', 'Negro', 'Gris', 'Plata', 'Rojo', 'Azul']),
        'transmision' => fake()->randomElement(['Manual', 'Automática']),
        'combustible' => fake()->randomElement(['Gasolina', 'Diésel', 'Híbrido', 'Eléctrico']),
        'tipo'        => fake()->randomElement(['Sedán', 'SUV', 'Pickup', 'Hatchback', 'Coupé']),
        'condicion'   => $nuevo ? 'nuevo' : 'seminuevo',
        'descripcion' => fake()->paragraph(),
        'estado'      => fake()->randomElement(['disponible', 'disponible', 'disponible', 'apartado', 'vendido']),
        'vin'         => fake()->unique()->regexify('[A-HJ-NPR-Z0-9]{17}'),
        'folio'       => 'AUT-' . fake()->unique()->numerify('########'),
    ];
}
}
