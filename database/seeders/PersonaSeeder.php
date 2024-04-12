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
use Spatie\Permission\Models\Role;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name', '=', 'Admin')->first();
        $doctor = Role::where('name', '=', 'Doctor')->first();
        $secretaria = Role::where('name', '=', 'Secretaria')->first();
        $paciente = Role::where('name', '=', 'Paciente')->first();

        //$tipo = tipo_persona::where('tipo_persona','Paciente')->first();
        // $dato_ubicacion = persona::where('id','=','dato_ubicacions_id')->first();

        $ve = nacionalidad::first();

        $user1 = User::create([
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
        ])->assignRole($admin);

        persona::create([
            'doc_identidad'      => '25567394',
            'user_id'            => $user1->id,
            'nombre'             => 'Angelica',
            'apellido'           => 'Abache',
            'fecha_nacimiento'   => '10/10/2000',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '4',
            'dato_ubicacions_id' => '1',
            'nacionalidads_id' => $ve->id,
            'foto' => ''
        ]);

        $user2 = User::create([
            'email' => 'secretaria@example.com',
            'password' => bcrypt('secretaria'),
        ])->assignRole($secretaria);

        persona::create([
            'doc_identidad'      => '26000000',
            'user_id'            => $user2->id,
            'nombre'             => 'Carolina',
            'apellido'           =>  'Gutierrez',
            'fecha_nacimiento'   => '03/10/1998',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '3',
            'dato_ubicacions_id' => '2',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);

        $user3 = User::create([
            'email' => 'jackson@example.com',
            'password' => bcrypt('doctor'),
        ])->assignRole($doctor);

        persona::create([
            'doc_identidad'      => '5020873',
            'user_id'            => $user3->id,
            'nombre'             => 'Jackson',
            'apellido'           =>  'Rios',
            'fecha_nacimiento'   => '03/10/1998',
            'genero'             => 'masculino',
            'tipo_personas_id'   => '1',
            'dato_ubicacions_id' => '3',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);

        $user4 = User::create([
            'email' => 'Dayani@example.com',
            'password' => bcrypt('paciente'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '28890123',
            'user_id'            => $user4->id,
            'nombre'             => 'Dayani',
            'apellido'           =>  'Gonzalez',
            'fecha_nacimiento'   => '03/10/1970',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '4',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);

        $user5 = User::create([
            'email' => 'paciente2@example.com',
            'password' => bcrypt('paciente2'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '8687356',
            'user_id'            => $user5->id,
            'nombre'             => 'Elsa',
            'apellido'           =>  'Castro',
            'fecha_nacimiento'   => '03/10/1967',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '5',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);
        $user6 = User::create([
            'email' => 'Juana@ejemplo.com',
            'password' => bcrypt('juana'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '24976989',
            'user_id'            => $user6->id,
            'nombre'             => 'Juana',
            'apellido'           =>  'Perez',
            'fecha_nacimiento'   => '03/10/1998',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '6',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);
      $user7 = User::create([
            'email' => 'Juan@ejemplo.com',
            'password' => bcrypt('juan'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '24976969',
            'user_id'            => $user7->id,
            'nombre'             => 'Juan',
            'apellido'           =>  'Perez',
            'fecha_nacimiento'   => '05/10/1998',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '7',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);
      $user8 = User::create([
            'email' => 'Pablo@ejemplo.com',
            'password' => bcrypt('pablo'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '24976569',
            'user_id'            => $user8->id,
            'nombre'             => 'Juan',
            'apellido'           =>  'Perez',
            'fecha_nacimiento'   => '05/10/1998',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '8',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);
      $user9 = User::create([
            'email' => 'Ana@ejemplo.com',
            'password' => bcrypt('juan'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '17890567',
            'user_id'            => $user9->id,
            'nombre'             => 'Ana',
            'apellido'           =>  'Mendoza',
            'fecha_nacimiento'   => '07/03/1985',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '9',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);
      $user10 = User::create([
            'email' => 'Felipe@ejemplo.com',
            'password' => bcrypt('juan'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '16789234',
            'user_id'            => $user10->id,
            'nombre'             => 'Felipe',
            'apellido'           =>  'Perez',
            'fecha_nacimiento'   => '05/10/1980',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '10',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);
 $user11 = User::create([
            'email' => 'Dora@ejemplo.com',
            'password' => bcrypt('dora'),
        ])->assignRole($doctor);

        persona::create([
            'doc_identidad'      => '18789234',
            'user_id'            => $user11->id,
            'nombre'             => 'Dora',
            'apellido'           =>  'Chacin',
            'fecha_nacimiento'   => '05/10/1990',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '1',
            'dato_ubicacions_id' => '11',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);
 $user12 = User::create([
            'email' => 'Dorian@ejemplo.com',
            'password' => bcrypt('dorian'),
        ])->assignRole($doctor);

        persona::create([
            'doc_identidad'      => '14789234',
            'user_id'            => $user12->id,
            'nombre'             => 'Dora',
            'apellido'           =>  'Chacin',
            'fecha_nacimiento'   => '05/10/1975',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '1',
            'dato_ubicacions_id' => '12',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);
 $user13 = User::create([
            'email' => 'Liz@ejemplo.com',
            'password' => bcrypt('liz'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '30577902',
            'user_id'            => $user13->id,
            'nombre'             => 'Liz',
            'apellido'           =>  'Villegas',
            'fecha_nacimiento'   => '05/10/2000',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '1',
            'dato_ubicacions_id' => '13',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);
 $user14 = User::create([
            'email' => 'andrea@ejemplo.com',
            'password' => bcrypt('dora'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '19167135',
            'user_id'            => $user14->id,
            'nombre'             => 'Andrea',
            'apellido'           =>  'Donato',
            'fecha_nacimiento'   => '17/12/1987',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '1',
            'dato_ubicacions_id' => '14',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);


    }
}
