<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use App\Models\dato_ubicacion;
use App\Models\nacionalidad;
use App\Models\persona;
use App\Models\tipo_persona;
use App\Models\User;

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

        $ve = nacionalidad::first();

        $user1 = User::create([
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),

        ]);

        persona::create([
            'doc_identidad'      => '111111111',
            'user_id'            => $user1 ->id,
            'nombre'             => 'Persona1',
            'apellido'           => 'Persona1',
            'fecha_nacimiento'   => '03/10/1998',
            'genero'             => 'Masculino',
            'foto'               => 'imagen',
            'tipo_personas_id'   => '4',
            'dato_ubicacions_id' => '1' ,
            'nacionalidads_id' => $ve->id,
        ]);

        $user2 = User::create([
            'email' => 'secretaria@example.com',
            'password' => bcrypt('secretaria'),
        ]);

        persona::create([
            'doc_identidad'      => '22222222',
            'user_id'            => $user2 ->id,
            'nombre'             => 'Persona2',
            'apellido'           =>  'Persona2',
            'fecha_nacimiento'   => '03/10/1998',
            'genero'             => 'Masculino',
            'foto'               => 'imagen2',
            'tipo_personas_id'   => '3',
            'dato_ubicacions_id' =>'2' ,
            'nacionalidads_id' => $ve->id,

        ]);
        $user3 = User::create([
            'email' => 'doctor@example.com',
            'password' => bcrypt('doctor'),
        ]);

        persona::create([
            'doc_identidad'      => '3333333333',
            'user_id'            => $user3 ->id,
            'nombre'             => 'Persona3',
            'apellido'           =>  'Persona3',
            'fecha_nacimiento'   => '03/10/1998',
            'genero'             => 'Masculino',
            'foto'               => 'imagen3',
            'tipo_personas_id'   => '1',
            'dato_ubicacions_id' => '3' ,
            'nacionalidads_id' => $ve->id,

        ]);
        $user4 = User::create([
            'email' => 'paciente@example.com',
            'password' => bcrypt('paciente'),
        ]);

        persona::create([
            'doc_identidad'      => '444444444',
            'user_id'            => $user4 ->id,
            'nombre'             => 'Persona4',
            'apellido'           =>  'Persona4',
            'fecha_nacimiento'   => '03/10/1998',
            'genero'             => 'Masculino',
            'foto'               => 'Imagen4',
            'tipo_personas_id'   => '2' ,
            'dato_ubicacions_id' => '4' ,
            'nacionalidads_id' => $ve->id,

        ]);
        $user5 = User::create([
            'email' => 'paciente2@example.com',
            'password' => bcrypt('paciente2'),
        ]);
        persona::create([
            'doc_identidad'      => '555555555',
            'user_id'            => $user5 ->id,
            'nombre'             => 'Persona5',
            'apellido'           =>  'Persona5',
            'fecha_nacimiento'   => '03/10/1998',
            'genero'             => 'Masculino',
            'foto'               => 'imagen5',
            'tipo_personas_id'   => '2' ,
            'dato_ubicacions_id' => '5' ,
            'nacionalidads_id' => $ve->id,

        ]);

    }
}
