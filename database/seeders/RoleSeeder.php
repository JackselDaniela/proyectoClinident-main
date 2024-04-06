<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * PERMISOS
         * 
         * Registra todos los permisos a los roles especificados de la siguiente manera:
         *      ['nombre-permiso.accion', ['NombreRol']]
         *      ['tratamiento.eliminar', ['Doctor', 'Admin', 'Secretaria']]
         * 
         * Aunque el permiso solo sea para un rol igual debe estar dentro de un array
         * 
         * Para añadir mas permisos al seeder debe mantener la estructura siguiente:
         * 
         * $permisos = [
         *    ...permisos anteriores,
         *    ['nombre-permiso.accion', ['NombreRol']],
         * ];
         */

        $permisos = [
            // Varios
            ['correo', ['Admin', 'Paciente']],
            ['notificaciones.read', ['Admin', 'Secretaria', 'Doctor']],
            ['pacientes', ['Admin', 'Secretaria', 'Doctor']],
            ['pdf.descargar', ['Admin', 'Secretaria', 'Doctor']],
            ['Ayuda', ['Admin', 'Secretaria', 'Doctor']],
            ['operaciones', ['Admin', 'Secretaria', 'Doctor']],
            // diagnosticos
            ['diagnosticos.show', ['Admin', 'Secretaria', 'Doctor']],
            ['diagnosticos.edit', ['Admin', 'Secretaria', 'Doctor']],
            ['diagnosticos.update', ['Admin', 'Secretaria', 'Doctor']],
            ['diagnosticos.consumos.create', ['Admin', 'Secretaria', 'Doctor']],
            ['diagnosticos.consumos.store', ['Admin', 'Secretaria', 'Doctor']],
            // procedimientos-odontologicos
            
            ['RegistrarT', ['Admin', 'Secretaria', 'Doctor']],
            ['RegistrarT.store', ['Admin', 'Secretaria']],
            ['editarT', ['Admin', 'Secretaria']],
            ['eliminarT', ['Admin', 'Secretaria']],
            ['RegistrarT.update', ['Admin', 'Secretaria']],

            //Odontograma
            ['Odontograma', ['Admin', 'Doctor']],
            ['Odontograma.store', ['Admin', 'Doctor']],
            ['Odontograma.create', ['Admin', 'Doctor']],
            ['Odontograma.edit', ['Admin', 'Doctor']],
            ['Odontograma.buscar', ['Admin', 'Doctor']],
            ['Odontograma.update', ['Admin', 'Doctor']],

            // pacientes
            ['RegistroE', ['Admin', 'Secretaria', 'Doctor']],
            ['AnadirP', ['Admin', 'Secretaria', 'Doctor']],
            ['AnadirP.store', ['Admin', 'Secretaria', 'Doctor']],
            ['EditarP.buscar', ['Admin', 'Secretaria']],
            ['EditarP.update', ['Admin', 'Secretaria']],

            //HistoriaC
            ['HistoriaC', ['Admin', 'Secretaria', 'Doctor']],
            ['HistoriaC.buscar', ['Admin', 'Secretaria', 'Doctor']],

            // doctores
            ['Doctores', ['Admin', 'Secretaria']],
            ['AnadirD.store', ['Admin', 'Secretaria']],
            ['EditarPD.update', ['Admin', 'Secretaria']],
            ['EditarPD.edit', ['Admin', 'Secretaria']],
            ['eliminarD', ['Admin', 'Secretaria']],

            // citas
            ['Calendario', ['Admin', 'Secretaria', 'Doctor', 'Paciente']],
            ['Calendario.store', ['Admin', 'Secretaria', 'Doctor']],
            ['Calendario.update', ['Admin', 'Secretaria', 'Doctor']],
            ['Calendario.destroy', ['Admin', 'Secretaria', 'Doctor']],
            ['citas.confirmar', ['Admin', 'Secretaria', 'Doctor', 'Paciente']],

            // tratamientos
            ['TratamientoR', ['Admin', 'Doctor']],
            ['RutaT.buscar', ['Admin', 'Doctor']],
            ['RutaT.editar', ['Admin', 'Doctor']],
            ['RutaT.update', ['Admin', 'Doctor']],
            ['AnadirT.store', ['Admin', 'Secretaria', 'Doctor']],
            ['AnadirT.edit', ['Admin', 'Secretaria', 'Doctor']],
            ['AnadirT.buscar', ['Admin', 'Secretaria', 'Doctor']],
            ['AnadirT.update', ['Admin', 'Secretaria', 'Doctor']],


            // insumos
            ['insumos', ['Admin', 'Secretaria']],
            ['insumos.create', ['Admin', 'Secretaria']],
            ['insumos.store', ['Admin', 'Secretaria']],
            ['insumos.edit', ['Admin', 'Secretaria']],
            ['insumos.update', ['Admin', 'Secretaria']],
            ['insumos.destroy', ['Admin', 'Secretaria']],
            ['cargas', ['Admin', 'Secretaria']],
            ['cargas.store', ['Admin', 'Secretaria']],
            ['cargas.edit', ['Admin', 'Secretaria']],
            ['cargas.update', ['Admin', 'Secretaria']],
            ['cargas.destroy', ['Admin', 'Secretaria']],
            ['reservas', ['Admin', 'Secretaria', 'Doctor']],
            ['reservas.restitucion', ['Admin', 'Secretaria', 'Doctor']],
            // honorarios
            ['GananciasA', ['Admin', 'Secretaria', 'Doctor']],

            // configuracion
            ['configuracion', ['Admin']],
            // mantenimiento
            ['mantenimiento', ['Admin']],
        ];

        /**
         * ROLES
         * 
         * Para la creación de roles predeterminados, se usa el siguiente código:
         * 
         * $nombreRol = Role::create(['name' => 'NombreRol']);
         * 
         * A continuación, se debe añadir en el segundo foreach donde se iteran todos los $roles de la siguiente manera:
         * 
         * else if ($rol === 'NombreRol') $nombreRol->givePermissionTo($permisoRegistrado);
         */
        $admin = Role::create(['name' => 'Admin']);
        $secretaria = Role::create(['name' => 'Secretaria']);
        $doctor = Role::create(['name' => 'Doctor']);
        $paciente = Role::create(['name' => 'Paciente']);

        foreach ($permisos as $permiso) {
            $nombre = $permiso[0];
            $roles = $permiso[1];

            $permisoRegistrado = Permission::create(['name' => $nombre]);
            foreach ($roles as $rol) {
                if ($rol === 'Admin') $admin->givePermissionTo($permisoRegistrado);
                else if ($rol === 'Secretaria') $secretaria->givePermissionTo($permisoRegistrado);
                else if ($rol === 'Doctor') $doctor->givePermissionTo($permisoRegistrado);
                else if ($rol === 'Paciente') $paciente->givePermissionTo($permisoRegistrado);
            }
        }
    }
}
