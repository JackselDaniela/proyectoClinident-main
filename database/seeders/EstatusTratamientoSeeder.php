<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use App\Models\estatus_tratamiento;


class EstatusTratamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        estatus_tratamiento::create([
            'estatus'      => 'En Espera',
        ]);
        estatus_tratamiento::create([
            'estatus'      => 'En Proceso',
        ]);
        estatus_tratamiento::create([
            'estatus'      => 'Terminado',
        ]);
    }
}
