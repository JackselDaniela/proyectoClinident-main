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
            'email' => 'secretaria@ejemplo.com',
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
            'email' => 'jackson@ejemplo.com',
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
            'email' => 'Carlos@ejemplo.com',
            'password' => bcrypt('paciente'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '90295942',
            'user_id'            => $user4->id,
            'nombre'             => 'Carlos',
            'apellido'           =>  'Vargas',
            'fecha_nacimiento'   => '13/03/1960',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '4',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);

        $user5 = User::create([
            'email' => 'Antonela@ejemplo.com',
            'password' => bcrypt('paciente'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '233031496',
            'user_id'            => $user5->id,
            'nombre'             => 'Antonela',
            'apellido'           =>  'Madariaga',
            'fecha_nacimiento'   => '21/04/2010',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '5',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);
        $user6 = User::create([
            'email' => 'eduardo@ejemplo.com',
            'password' => bcrypt('eduardo'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '183857349',
            'user_id'            => $user6->id,
            'nombre'             => 'Eduardo',
            'apellido'           =>  'Toro',
            'fecha_nacimiento'   => '13/01/2006',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '6',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);
      $user7 = User::create([
            'email' => 'felipe@ejemplo.com',
            'password' => bcrypt('felipe'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '177475785',
            'user_id'            => $user7->id,
            'nombre'             => 'Felipe',
            'apellido'           =>  'Torres',
            'fecha_nacimiento'   => '17/06/1991',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '7',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);
      $user8 = User::create([
            'email' => 'Javier@ejemplo.com',
            'password' => bcrypt('javier'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '199139428',
            'user_id'            => $user8->id,
            'nombre'             => 'Javier',
            'apellido'           =>  'Tovar',
            'fecha_nacimiento'   => '19/04/1998',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '8',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);
      $user9 = User::create([
            'email' => 'jose@ejemplo.com',
            'password' => bcrypt('jose'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '142055740',
            'user_id'            => $user9->id,
            'nombre'             => 'Jose',
            'apellido'           =>  'Toledo',
            'fecha_nacimiento'   => '11/06/1981',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '9',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

        ]);
      $user10 = User::create([
            'email' => 'Macarena@ejemplo.com',
            'password' => bcrypt('macarena'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '16789234',
            'user_id'            => $user10->id,
            'nombre'             => 'Macarena',
            'apellido'           =>  'Tapia',
            'fecha_nacimiento'   => '04/05/1992',
            'genero'             => 'Femenino',
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
            'email' => 'Andrea@ejemplo.com',
            'password' => bcrypt('andrea'),
        ])->assignRole($doctor);

        persona::create([
            'doc_identidad'      => '17137164',
            'user_id'            => $user12->id,
            'nombre'             => 'Andrea',
            'apellido'           =>  'Castro',
            'fecha_nacimiento'   => '17/12/1987',
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
            'email' => 'maria@ejemplo.com',
            'password' => bcrypt('maria'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '19167135',
            'user_id'            => $user14->id,
            'nombre'             => 'Maria',
            'apellido'           =>  'Paulete',
            'fecha_nacimiento'   => '22/08/1994',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '14',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user15 = User::create([
            'email' => 'nelson@ejemplo.com',
            'password' => bcrypt('nelson'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '106007799',
            'user_id'            => $user15->id,
            'nombre'             => 'Nelson',
            'apellido'           =>  'Torres',
            'fecha_nacimiento'   => '10/01/1966',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '15',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user16 = User::create([
            'email' => 'Berta@ejemplo.com',
            'password' => bcrypt('berta'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '84541656',
            'user_id'            => $user16->id,
            'nombre'             => 'Berta',
            'apellido'           =>  'Toloza',
            'fecha_nacimiento'   => '27/09/1959',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '16',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user17 = User::create([
            'email' => 'monica@ejemplo.com',
            'password' => bcrypt('monica'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '114152420',
            'user_id'            => $user17->id,
            'nombre'             => 'Monica',
            'apellido'           =>  'Tapia',
            'fecha_nacimiento'   => '29/04/1971',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '17',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user18 = User::create([
            'email' => 'darwin@ejemplo.com',
            'password' => bcrypt('darwin'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '202241042',
            'user_id'            => $user18->id,
            'nombre'             => 'Darwin',
            'apellido'           =>  'Olguin',
            'fecha_nacimiento'   => '23/04/2003',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '18',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user19 = User::create([
            'email' => 'jacksel@ejemplo.com',
            'password' => bcrypt('jacksel'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '25976987',
            'user_id'            => $user19->id,
            'nombre'             => 'Jacksel',
            'apellido'           =>  'Rios',
            'fecha_nacimiento'   => '24/03/1998',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '19',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user20 = User::create([
            'email' => 'nicole@ejemplo.com',
            'password' => bcrypt('nicole'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '18950490',
            'user_id'            => $user20->id,
            'nombre'             => 'Nicole',
            'apellido'           =>  'Astorga',
            'fecha_nacimiento'   => '14/02/1995',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '20',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);


    }
}
