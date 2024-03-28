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
         * Permisos y rutas definidas
         */
        // $permisos = [
        //     // procedimientos-odontologicos
        //     ['procedimientos-odontologicos.ver', 'RegistrarT'],
        //     ['procedimientos-odontologicos.registrar', 'RegistrarT.store'],
        //     ['procedimientos-odontologicos.editar', 'editarT'],
        //     ['procedimientos-odontologicos.eliminar', 'eliminarT'],
        //     // pacientes
        //     ['pacientes.agregar', 'AnadirP.store'],
        //     ['pacientes.ver', 'AnadirP'],
        //     ['pacientes.eliminar', 'eliminarE'],
        //     ['pacientes.editar', 'EditarP.edit'],
        //     // doctores
        //     ['doctores.ver', 'Doctores'],
        //     ['doctores.agregar', 'AnadirD'],
        //     ['doctores.editar', 'EditarPD.edit'],
        //     ['doctores.eliminar', 'eliminarD'],
        //     // citas
        //     ['citas.ver', 'calendario'],
        //     ['citas.agender', 'js- fullcalendar'],
        //     ['citas.editar', 'js- fullcalendar'],
        //     ['citas.eliminar', 'js- fullcalendar'],
        //     ['citas.confirmar', ''],
        //     // tratamientos
        //     ['tratamientos.insertar', 'AnadirT'],
        //     ['rutatratamientos.actualizar', 'diagnosticos.show'],
        //     // insumos
        //     ['insumos.agregar', ''],
        //     ['insumos.editar', ''],
        //     ['insumos.eliminar', ''],
        //     ['insumos.reservar', ''],
        //     // honorarios
        //     ['honorarios.consultar', ''],
        //     ['honorarios.tratamientos', ''],
        // ];

        /**
         * Permisos pendientes por asignar a rutas
         */
        $permisosPendientes = [
            // insumos
            ['insumos.agregar', ''],
            ['insumos.editar', ''],
            ['insumos.eliminar', ''],
            ['insumos.reservar', ''],
            // honorarios
            ['honorarios.consultar', ''],
            ['honorarios.tratamientos', ''],
        ];

        /**
         * Rutas pendientes, sin rol o permiso
         */
        $rutasPendientes = [
            '/correo',
            'notifications.read',
            '/get-all-paciente',
            'descargarPDF',
            'landing',
            'Landing',
            'Index',
            'home',
            'login.autenticar',
            'login.cerrarSesion',
            'Perfil',
            'Perfil.show',
            'EditarP.buscar',
            'EditarP.update',
            'EditarP.store',
            'EditarPD.update',
            'ContraseñaP',
            'RegistrarT.update',
            'AnadirP.update',
            'RegistroE',
            'HistoriaC',
            'HistoriaC.buscar',
            'AnadirT.store',
            'AnadirT.edit',
            'AnadirT.buscar',
            'AnadirT.update',
            'Odontograma',
            'Odontograma.store',
            'Odontograma.create',
            'Odontograma.edit',
            'Odontograma.buscar',
            'Odontograma.update',
            'RutaT.buscar',
            'RutaT.editar',
            'RutaT.update',
            'insumos (resource - less: show)',
            'cargas (resource - less: show)',
            'reservas (resource)',
            'reservas.restitucion',
            'operaciones.index',
            'diagnosticos.edit',
            'diagnosticos.update',
            'diagnosticos.consumos.create',
            'diagnosticos.consumos.store',
            'AnadirD.store',
            'AnadirD.edit',
            'AnadirD.update',
            'GananciasA',
            'TratamientoR',
            'Ayuda',
            'Ayuda.store',
            'Ayuda.edit',
            'AyudaP.update',
            'blogAyuda',
            'blogAyuda.store',
            'Ayuda',
        ];

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
            // procedimientos-odontologicos
            ['procedimientos-odontologicos.ver', ['Admin', 'Secretaria', 'Doctor']],
            ['procedimientos-odontologicos.registrar', ['Admin', 'Secretaria']],
            ['procedimientos-odontologicos.editar', ['Admin', 'Secretaria']],
            ['procedimientos-odontologicos.eliminar', ['Admin', 'Secretaria']],
            // pacientes
            ['pacientes.agregar', ['Admin', 'Secretaria', 'Doctor']],
            ['pacientes.ver', ['Admin', 'Secretaria', 'Doctor']],
            ['pacientes.eliminar', ['Admin', 'Secretaria', 'Doctor']],
            ['pacientes.editar', ['Admin', 'Secretaria', 'Doctor']],
            // doctores
            ['doctores.ver', ['Admin', 'Secretaria']],
            ['doctores.agregar', ['Admin', 'Secretaria']],
            ['doctores.editar', ['Admin', 'Secretaria']],
            ['doctores.eliminar', ['Admin', 'Secretaria']],
            // citas
            ['citas.ver', ['Admin', 'Secretaria', 'Doctor']],
            ['citas.agender', ['Admin', 'Secretaria', 'Doctor']],
            ['citas.editar', ['Admin', 'Secretaria', 'Doctor']],
            ['citas.eliminar', ['Admin', 'Secretaria', 'Doctor']],
            ['citas.confirmar', ['Paciente']],
            // tratamientos
            ['tratamientos.insertar', ['Admin', 'Secretaria', 'Doctor']],
            ['tratamientos.actualizar', ['Admin', 'Secretaria', 'Doctor']],
            // insumos
            ['insumos.agregar', ['Admin', 'Secretaria', 'Doctor']],
            ['insumos.editar', ['Admin', 'Secretaria', 'Doctor']],
            ['insumos.eliminar', ['Admin', 'Secretaria', 'Doctor']],
            ['insumos.reservar', ['Admin', 'Secretaria', 'Doctor']],
            // honorarios
            ['honorarios.consultar', ['Admin', 'Doctor']],
            ['honorarios.tratamientos', ['Admin', 'Doctor']],
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
