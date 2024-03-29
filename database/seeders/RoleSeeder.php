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
            ['Ayuda.store', ['Admin', 'Secretaria']],
            ['Ayuda.edit', ['Admin', 'Secretaria']],
            ['AyudaP.update', ['Admin', 'Secretaria']],
            ['blogAyuda.store', ['Admin', 'Secretaria']],
            ['operaciones', ['Admin', 'Secretaria', 'Doctor']],
            // diagnosticos
            ['diagnosticos.show', ['Admin', 'Secretaria', 'Doctor']],
            ['diagnosticos.edit', ['Admin', 'Secretaria']],
            ['diagnosticos.update', ['Admin', 'Secretaria']],
            ['diagnosticos.consumos.create', ['Admin', 'Secretaria']],
            ['diagnosticos.consumos.store', ['Admin', 'Secretaria']],
            // procedimientos-odontologicos
            ['procedimientos-odontologicos.ver', ['Admin', 'Secretaria', 'Doctor']],
            ['procedimientos-odontologicos.registrar', ['Admin', 'Secretaria']],
            ['procedimientos-odontologicos.editar', ['Admin', 'Secretaria']],
            ['procedimientos-odontologicos.eliminar', ['Admin', 'Secretaria']],
            ['Odontograma', ['Admin', 'Secretaria', 'Doctor']],
            ['Odontograma.store', ['Admin', 'Secretaria', 'Doctor']],
            ['Odontograma.create', ['Admin', 'Secretaria', 'Doctor']],
            ['Odontograma.edit', ['Admin', 'Secretaria', 'Doctor']],
            ['Odontograma.buscar', ['Admin', 'Secretaria', 'Doctor']],
            ['Odontograma.update', ['Admin', 'Secretaria', 'Doctor']],
            // pacientes
            ['EditarP.buscar', ['Admin', 'Secretaria']],
            ['EditarP.update', ['Admin', 'Secretaria']],
            ['EditarPD.store', ['Admin', 'Secretaria']],
            ['EditarPD.update', ['Admin', 'Secretaria']],
            ['AnadirP.edit', ['Admin', 'Secretaria']],
            ['AnadirP.update', ['Admin', 'Secretaria']],
            ['pacientes.agregar', ['Admin', 'Secretaria', 'Doctor']],
            ['pacientes.ver', ['Admin', 'Secretaria', 'Doctor']],
            ['pacientes.eliminar', ['Admin', 'Secretaria', 'Doctor']],
            ['pacientes.editar', ['Admin', 'Secretaria', 'Doctor']],
            ['RegistroE', ['Admin', 'Secretaria']],
            ['HistoriaC', ['Admin', 'Secretaria']],
            ['HistoriaC.buscar', ['Admin', 'Secretaria']],
            // doctores
            ['doctores.ver', ['Admin', 'Secretaria']],
            ['doctores.agregar', ['Admin', 'Secretaria']],
            ['doctores.editar', ['Admin', 'Secretaria']],
            ['doctores.eliminar', ['Admin', 'Secretaria']],
            ['doctores.actualizar', ['Admin', 'Secretaria']],
            // citas
            ['citas.ver', ['Admin', 'Secretaria', 'Doctor']],
            ['citas.agender', ['Admin', 'Secretaria', 'Doctor']],
            ['citas.editar', ['Admin', 'Secretaria', 'Doctor']],
            ['citas.eliminar', ['Admin', 'Secretaria', 'Doctor']],
            ['citas.confirmar', ['Paciente']],
            // tratamientos
            ['RegistrarT.update', ['Admin', 'Secretaria', 'Doctor']],
            ['tratamientos.insertar', ['Admin', 'Secretaria', 'Doctor']],
            ['tratamientos.actualizar', ['Admin', 'Secretaria', 'Doctor']],
            ['TratamientoR', ['Admin', 'Doctor']],
            ['RutaT.buscar', ['Admin', 'Doctor']],
            ['RutaT.editar', ['Admin', 'Doctor']],
            ['RutaT.update', ['Admin', 'Doctor']],
            ['AnadirT.store', ['Admin', 'Secretaria', 'Doctor']],
            ['AnadirT.edit', ['Admin', 'Secretaria', 'Doctor']],
            ['AnadirT.buscar', ['Admin', 'Secretaria', 'Doctor']],
            ['AnadirT.upadte', ['Admin', 'Secretaria', 'Doctor']],
            // insumos
            // ['insumos.agregar', ['Admin', 'Secretaria']],
            // ['insumos.editar', ['Admin', 'Secretaria']],
            // ['insumos.eliminar', ['Admin', 'Secretaria']],
            // ['insumos.reservar', ['Admin', 'Secretaria']],
            ['insumos', ['Admin', 'Secretaria']],
            ['cargas', ['Admin', 'Secretaria']],
            ['reservas', ['Admin', 'Secretaria']],
            ['reservas.restitucion', ['Admin', 'Secretaria']],
            // honorarios
            ['GananciasA', ['Admin', 'Secretaria', 'Doctor']],
            // ['honorarios.consultar', ['Admin', 'Doctor']],
            // ['honorarios.tratamientos', ['Admin', 'Doctor']],
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
