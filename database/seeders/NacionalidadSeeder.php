<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\nacionalidad;

class NacionalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        nacionalidad::create([
            'nacionalidad'      => 'V'
        ]);  
        nacionalidad::create([
            'nacionalidad'      => 'E'
        ]);  
    }
}
