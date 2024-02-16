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
            // // DatoUbicacionSeeder::class,
            // // PersonaSeeder::class,
            // // PacienteSeeder::class,
            // // ExpedienteSeeder::class,
           EspecialidadSeeder::class,
           TratamientoSeeder::class,
            // // DoctorSeeder::class,
             DiagnosticoSeeder::class,
            EstatusTratamientoSeeder::class,
            EstadoSeeder::class,
            MunicipioSeeder::class,
            CiudadesSeeder::class,
            ParroquiaSeeder::class,
            NacionalidadSeeder::class,
            TipoConsultaSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}