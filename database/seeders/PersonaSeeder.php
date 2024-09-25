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

 $user21 = User::create([
            'email' => 'adriana@ejemplo.com',
            'password' => bcrypt('adriana'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '18950490',
            'user_id'            => $user21->id,
            'nombre'             => 'Adriana',
            'apellido'           =>  'Madriz',
            'fecha_nacimiento'   => '15/06/1990',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '21',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user22 = User::create([
            'email' => 'Ruben@ejemplo.com',
            'password' => bcrypt('ruben'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '18950490',
            'user_id'            => $user22->id,
            'nombre'             => 'Ruben',
            'apellido'           =>  'Alvarez',
            'fecha_nacimiento'   => '11/06/1987',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '22',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user23 = User::create([
            'email' => 'alejandro@ejemplo.com',
            'password' => bcrypt('pestana'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '20987654',
            'user_id'            => $user23->id,
            'nombre'             => 'Alejandro',
            'apellido'           =>  'Pestana',
            'fecha_nacimiento'   => '10/05/1987',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '23',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user24 = User::create([
            'email' => 'Romer@ejemplo.com',
            'password' => bcrypt('romer'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '17984654',
            'user_id'            => $user24->id,
            'nombre'             => 'Romer',
            'apellido'           =>  'Mena',
            'fecha_nacimiento'   => '10/05/1987',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '24',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user25 = User::create([
            'email' => 'Andreina@ejemplo.com',
            'password' => bcrypt('andreina'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '14984654',
            'user_id'            => $user25->id,
            'nombre'             => 'Andreina',
            'apellido'           =>  'Guerra',
            'fecha_nacimiento'   => '22/05/1987',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '25',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user26 = User::create([
            'email' => 'Juana@ejemplo.com',
            'password' => bcrypt('andreina'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '17914754',
            'user_id'            => $user26->id,
            'nombre'             => 'Juana',
            'apellido'           =>  'Del Carmen',
            'fecha_nacimiento'   => '25/05/1986',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '26',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user27 = User::create([
            'email' => 'Victor@ejemplo.com',
            'password' => bcrypt('victor'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '17914754',
            'user_id'            => $user27->id,
            'nombre'             => 'Victor',
            'apellido'           =>  'Ramos',
            'fecha_nacimiento'   => '25/05/1986',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '27',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user28 = User::create([
            'email' => 'Ysabel@ejemplo.com',
            'password' => bcrypt('ysabel'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '8956754',
            'user_id'            => $user28->id,
            'nombre'             => 'Ysabel',
            'apellido'           =>  'Coello',
            'fecha_nacimiento'   => '25/07/1970',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '28',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user29 = User::create([
            'email' => 'Valentina@ejemplo.com',
            'password' => bcrypt('valentina'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '20426754',
            'user_id'            => $user29->id,
            'nombre'             => 'Valentina',
            'apellido'           =>  'Coronado',
            'fecha_nacimiento'   => '25/07/1991',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '29',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user30 = User::create([
            'email' => 'Valeria@ejemplo.com',
            'password' => bcrypt('valeria'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '22422754',
            'user_id'            => $user30->id,
            'nombre'             => 'Valeria',
            'apellido'           =>  'Coronel',
            'fecha_nacimiento'   => '25/04/1991',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '30',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user31 = User::create([
            'email' => 'Fabiola@ejemplo.com',
            'password' => bcrypt('fabiola'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '21022754',
            'user_id'            => $user31->id,
            'nombre'             => 'Fabiola',
            'apellido'           =>  'Davila',
            'fecha_nacimiento'   => '25/07/1991',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '31',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user32 = User::create([
            'email' => 'Antonio@ejemplo.com',
            'password' => bcrypt('Antonio'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '23420754',
            'user_id'            => $user32->id,
            'nombre'             => 'Antonio',
            'apellido'           =>  'Aizaga',
            'fecha_nacimiento'   => '25/07/1980',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '32',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user33 = User::create([
            'email' => 'Solimar@ejemplo.com',
            'password' => bcrypt('solimar'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '23420754',
            'user_id'            => $user33->id,
            'nombre'             => 'Solimar',
            'apellido'           =>  'Garcia',
            'fecha_nacimiento'   => '23/01/2000',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '33',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user34 = User::create([
            'email' => 'Ilkamida@ejemplo.com',
            'password' => bcrypt('ilkamida'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '30420756',
            'user_id'            => $user34->id,
            'nombre'             => 'Ilkamida',
            'apellido'           =>  'Dominguez',
            'fecha_nacimiento'   => '23/01/2000',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '34',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user36 = User::create([
            'email' => 'Raul@ejemplo.com',
            'password' => bcrypt('raul'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '30445756',
            'user_id'            => $user36->id,
            'nombre'             => 'Raul',
            'apellido'           =>  'Guaido',
            'fecha_nacimiento'   => '23/03/2000',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '36',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user37 = User::create([
            'email' => 'Abraham@ejemplo.com',
            'password' => bcrypt('abraham'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '31445756',
            'user_id'            => $user37->id,
            'nombre'             => 'Abraham',
            'apellido'           =>  'Rojas',
            'fecha_nacimiento'   => '23/03/2002',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '37',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user38 = User::create([
            'email' => 'carolina@ejemplo.com',
            'password' => bcrypt('carolina'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '31450756',
            'user_id'            => $user38->id,
            'nombre'             => 'Carolina',
            'apellido'           =>  'Ricart',
            'fecha_nacimiento'   => '28/03/1990',
            'genero'             => 'Femenino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '38',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user39 = User::create([
            'email' => 'Leandro@ejemplo.com',
            'password' => bcrypt('leandro'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '21450756',
            'user_id'            => $user39->id,
            'nombre'             => 'Leandro',
            'apellido'           =>  'Rios',
            'fecha_nacimiento'   => '29/04/1990',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '39',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user40 = User::create([
            'email' => 'pablo@ejemplo.com',
            'password' => bcrypt('pablo'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '22850756',
            'user_id'            => $user40->id,
            'nombre'             => 'Pablo',
            'apellido'           =>  'Garrido',
            'fecha_nacimiento'   => '29/04/1992',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '40',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user41 = User::create([
            'email' => 'Robert@ejemplo.com',
            'password' => bcrypt('robert'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '21950756',
            'user_id'            => $user41->id,
            'nombre'             => 'Robert',
            'apellido'           =>  'Moreno',
            'fecha_nacimiento'   => '29/08/1992',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '41',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user42 = User::create([
            'email' => 'xavier@ejemplo.com',
            'password' => bcrypt('xavier'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '26760756',
            'user_id'            => $user42->id,
            'nombre'             => 'Xavier',
            'apellido'           =>  'Bracho',
            'fecha_nacimiento'   => '29/09/1999',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '42',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user43 = User::create([
            'email' => 'hector@ejemplo.com',
            'password' => bcrypt('hector'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '25878956',
            'user_id'            => $user43->id,
            'nombre'             => 'Hector',
            'apellido'           =>  'Centeno',
            'fecha_nacimiento'   => '29/04/1998',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '43',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user44 = User::create([
            'email' => 'Theylor@ejemplo.com',
            'password' => bcrypt('theylor'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '21976006',
            'user_id'            => $user44->id,
            'nombre'             => 'Theylor',
            'apellido'           =>  'Mendez',
            'fecha_nacimiento'   => '29/04/1994',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '44',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user45 = User::create([
            'email' => 'Erick@ejemplo.com',
            'password' => bcrypt('erick'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '22023756',
            'user_id'            => $user45->id,
            'nombre'             => 'Erick',
            'apellido'           =>  'Garrido',
            'fecha_nacimiento'   => '09/01/1992',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '45',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);
 $user46 = User::create([
            'email' => 'Eliotk@ejemplo.com',
            'password' => bcrypt('eliot'),
        ])->assignRole($paciente);

        persona::create([
            'doc_identidad'      => '22025656',
            'user_id'            => $user46->id,
            'nombre'             => 'Eliot',
            'apellido'           =>  'Briceño',
            'fecha_nacimiento'   => '16/01/1993',
            'genero'             => 'Masculino',
            'tipo_personas_id'   => '2',
            'dato_ubicacions_id' => '46',
            'nacionalidads_id' => $ve->id,
            'foto' => ''

    ]);


    }
}
