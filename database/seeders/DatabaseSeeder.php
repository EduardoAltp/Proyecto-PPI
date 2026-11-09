<?php

namespace Database\Seeders;

use App\Models\Auto;
use App\Models\Cita;
use App\Models\Marca;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Usuarios
        User::factory()->admin()->create([
            'name' => 'Administrador',
            'email' => 'admin@concesionario.test',
            'password' => 'password',
        ]);

        $cliente = User::factory()->create([
            'name' => 'Cliente Demo',
            'email' => 'cliente@concesionario.test',
            'password' => 'password',
        ]);
        $clientes = User::factory(5)->create()->push($cliente);

        // Catálogo real de marcas y modelos
        $catalogo = [
            'Nissan'     => ['Versa', 'Sentra', 'March', 'Kicks', 'Frontier'],
            'Toyota'     => ['Corolla', 'Camry', 'RAV4', 'Hilux', 'Yaris'],
            'Volkswagen' => ['Jetta', 'Vento', 'Tiguan', 'Taos'],
            'Chevrolet'  => ['Aveo', 'Onix', 'Silverado', 'Tracker'],
            'Mazda'      => ['Mazda 3', 'Mazda 2', 'CX-5', 'CX-30'],
            'Honda'      => ['Civic', 'CR-V', 'HR-V', 'City'],
        ];

        foreach ($catalogo as $marca => $modelos) {
            $m = Marca::create(['nombre' => $marca]);
            foreach ($modelos as $modelo) {
                $m->modelos()->create(['nombre' => $modelo]);
            }
        }

        // Autos
        $autos = Auto::factory(30)->create();

        // Favoritos
        foreach ($clientes as $c) {
            $c->favoritos()->attach($autos->random(3)->pluck('id'));
        }

        // Citas: una por cliente, en días y horas distintos, solo autos no vendidos
        $disponibles = $autos->where('estado', '!=', 'vendido')->values();
        foreach ($clientes as $i => $c) {
            Cita::factory()->create([
                'user_id' => $c->id,
                'auto_id' => $disponibles->random()->id,
                'fecha'   => now()->addDays($i + 1)->setTime(10, 0),
                'nombre_contacto' => $c->name,
                'email_contacto'  => $c->email,
            ]);
        }
    }
}