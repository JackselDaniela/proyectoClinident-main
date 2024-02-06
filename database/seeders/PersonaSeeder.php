<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use App\Models\dato_ubicacion;
use App\Models\persona;
use App\Models\tipo_persona;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         //$tipo = tipo_persona::where('tipo_persona','Paciente')->first();
        // $dato_ubicacion = persona::where('id','=','dato_ubicacions_id')->first();


        persona::create([
            'doc_identidad'      => '111111111',
            'nombre'             => 'Persona1',
            'apellido'           => 'Persona1',
            'fecha_nacimiento'   => '03/10/1998',
            'genero'             => 'Masculino',
            'foto'               => 'imagen',
            'tipo_personas_id'   => '1',
            'dato_ubicacions_id' => '1' ,

        ]);

      

        persona::create([
            'doc_identidad'      => '22222222',
            'nombre'             => 'Persona2',
            'apellido'           =>  'Persona2',
            'fecha_nacimiento'   => '03/10/1998',
            'genero'             => 'Masculino',
            'foto'               => 'imagen2',
            'tipo_personas_id'   => '1',
            'dato_ubicacions_id' =>'2' ,

        ]);

        persona::create([
            'doc_identidad'      => '3333333333',
            'nombre'             => 'Persona3',
            'apellido'           =>  'Persona3',
            'fecha_nacimiento'   => '03/10/1998',
            'genero'             => 'Masculino',
            'foto'               => 'imagen3',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '3' ,

        ]);

        persona::create([
            'doc_identidad'      => '444444444',
            'nombre'             => 'Persona4',
            'apellido'           =>  'Persona4',
            'fecha_nacimiento'   => '03/10/1998',
            'genero'             => 'Masculino',
            'foto'               => 'Imagen4',
            'tipo_personas_id'   => '2' ,
            'dato_ubicacions_id' => '4' ,

        ]);
        persona::create([
            'doc_identidad'      => '555555555',
            'nombre'             => 'Persona5',
            'apellido'           =>  'Persona5',
            'fecha_nacimiento'   => '03/10/1998',
            'genero'             => 'Masculino',
            'foto'               => 'imagen5',
            'tipo_personas_id'   => '2' ,
            'dato_ubicacions_id' => '5' ,

        ]);

    }
}
