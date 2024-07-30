<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Citas;
use App\Models\Pacientes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        Pacientes::create([
            'nombre' => 'Job Moreno',
            'domicilio' => 'Job Moreno',
            'telefono' => 'Job Moreno',
            'fecha_nacimiento' => '1998-01-08',
            'comentarios' => 'Job Moreno',
        ]);
        Citas::create([
            'paciente_id' => 1,
            'dia' => '2024-07-29',
            'hora_inicio' => '13:00:00',
            'hora_fin' => '14:00:00',
            'comentarios' => 'ninguno',

        ]);
    }
}
