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
            TipoConsultaSeeder::class,
            PiezaSeeder::class,
            EspecialidadSeeder::class,
            TratamientoSeeder::class,
            EstadoSeeder::class,
            MunicipioSeeder::class,
            CiudadesSeeder::class,
            ParroquiaSeeder::class,
            DatoUbicacionSeeder::class,
            NacionalidadSeeder::class,
            PersonaSeeder::class,
            TipoConsultaSeeder::class,
            PacienteSeeder::class,
            ExpedienteSeeder::class,
            DoctorSeeder::class,
            DiagnosticoSeeder::class,
            EstatusTratamientoSeeder::class,
            PacienteDiagnosticoSeeder::class,
            InsumoSeeder::class,
            CargaSeeder::class,
            ConsumoSeeder::class,
            ReservaSeeder::class,
            ItemSeeder::class,
            EventoSeeder::class,
        ]);
        
        // \App\Models\User::factory(10)->create();
    }
}
