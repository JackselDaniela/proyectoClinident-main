<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TipoPersonasSeeder::class,
            PiezaSeeder::class,
            // TratamientoSeeder::class,
            // DatoUbicacionSeeder::class,
            // PersonaSeeder::class,
            // PacienteSeeder::class,
            // ExpedienteSeeder::class,
            EspecialidadSeeder::class,
            // DoctorSeeder::class,
            DiagnosticoSeeder::class,
            EstatusTratamientoSeeder::class,
            EstadoSeeder::class,
            MunicipioSeeder::class,
            CiudadesSeeder::class,
            ParroquiaSeeder::class,
            InsumoSeeder::class,
            // CargaSeeder::class,
            // ConsumoSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
