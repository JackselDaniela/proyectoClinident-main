<?php
//use App\Http\Controllers\;

use App\Http\Controllers\CargaController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\OperacionController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ReservaRestitucionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RolesPController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
 * -----------------------------------------------------------------------------------
 *                                      Explicación Spatie
 * -----------------------------------------------------------------------------------
 */
/**
 * ¿Cómo usar permisos y roles de Spatie Laravel?
 * 
 * Si se tienen varias rutas, ej:
 * 
 * /inicio
 * /ayuda
 * /soporte
 * 
 * Y para acceder a cualquiera de ella se requiere un rol o permiso, se usa el siguiente código:
 * 
 * Route::group(['middleware' => ['role_or_permission:RoleName o PermissionName']], function () {
 *      Route::action('/ruta', [Controller::class, 'method'])->name(DynamicName)
 * });
 * 
 * Caso contrario, que el rol o permiso solo se quiera aplicar a una ruta, se usa:
 * 
 * Route::action('/ruta', [Controller::class, 'method'])->name(DynamicName)->middleware('role_or_permission:RoleName o PermissionName')
 */

/**
 * -----------------------------------------------------------------------------------
 *                                      NOTA - IMPORTANTE
 * -----------------------------------------------------------------------------------
 * 
 * 1. Revisar todos los permisos ubicados en "RoleSeeder.php" si coinciden con los establecidos en las rutas,
 * en caso de querer renombrar algún permiso se debe hacer en ambos archivos (RoleSeeder.php y web.php).
 * 2. Para facilitar la lectura del archivo mantener el órden y estructura ya establecido.
 */

/**
 * -----------------------------------------------------------------------------------
 *                                      Por agrupar
 * -----------------------------------------------------------------------------------
 */

// Enviar correo
Route::view('/correo', 'emails.confirmacion')
    ->middleware('role_or_permission:correo');

/* Leer notificaciones */
Route::post('/notifications/read', function () {
    Auth::user()->unreadNotifications->markAsRead();
    return back();
})->name('notifications.read')
    ->middleware('role_or_permission:notificaciones.read');

//Salida PdfPacientes
Route::get('/get-all-paciente', [PDFController::class, 'getAllpaciente'])->middleware('role_or_permission:pacientes');
Route::get('/download-pdf', [PDFController::class, 'downloadPDF'])
    ->name('descargarPDF')
    ->middleware('role_or_permission:pdf.descargar');

/**
 * -----------------------------------------------------------------------------------
 *                                      Inicio
 * -----------------------------------------------------------------------------------
 */

Route::get('/', function () {
    return view('Landing');
})->name('landing');
/* Landing*/
Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])
    ->name('Landing');
/*Index*/
Route::get('/Index', [App\Http\Controllers\IndexController::class, 'index'])
    ->name('Index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

/**
 * -----------------------------------------------------------------------------------
 *                                      Autenticacion
 * -----------------------------------------------------------------------------------
 */

Route::post('/login', [App\Http\Controllers\LandingController::class, 'autenticar'])
    ->name('login.autenticar');
Route::delete('/logout', [App\Http\Controllers\LandingController::class, 'cerrarSesion'])->middleware('auth')
    ->name('login.cerrarSesion');

/**
 * -----------------------------------------------------------------------------------
 *                                      Comentadas - Deshabilitadas
 * -----------------------------------------------------------------------------------
 */
/* Editar Perfil*/
// Route::get('/EditarP', [App\Http\Controllers\EditarPController::class, 'index'])->name('EditarP');
// 
// Route::post('/EditarP', [App\Http\Controllers\EditarPController::class, 'store'])->name('EditarP.store');
// 
/* Editar Perfil doctor*/
// Route::get('/EditarPD', [App\Http\Controllers\EditarPDController::class, 'index'])->name('EditarPD');

/**
 * -----------------------------------------------------------------------------------
 *                                      Perfil
 * -----------------------------------------------------------------------------------
 */

/* Perfil*/
Route::get('/Perfil', [App\Http\Controllers\PerfilController::class, 'index'])
    ->name('Perfil');
Route::put('/Perfil', [App\Http\Controllers\PerfilController::class, 'update'])
    ->name('Perfil.update');
Route::get('/EditarP/{id}', [App\Http\Controllers\EditarPController::class, 'edit'])
    ->name('EditarP.edit')
    ->middleware('role_or_permission:pacientes.editar');
Route::get('/AnadirT/{id}', [App\Http\Controllers\EditarPController::class, 'buscar'])
    ->name('EditarP.buscar')
    ->middleware('role_or_permission:EditarP.buscar');
Route::put('/update-EditarP/{id}', [App\Http\Controllers\EditarPController::class, 'update'])
    ->name('EditarP.update')
    ->middleware('role_or_permission:EditarP.update');
Route::post('/EditarPD', [App\Http\Controllers\EditarPDController::class, 'store'])
    ->name('EditarPD.store')
    ->middleware('role_or_permission:EditarPD.store');
Route::get('/EditarPD/{id}', [App\Http\Controllers\EditarPDController::class, 'edit'])
    ->name('EditarPD.edit')
    ->middleware('role_or_permission:doctores.editar');
Route::put('/update-EditarPD/{id}', [App\Http\Controllers\EditarPDController::class, 'update'])
    ->name('EditarPD.update')
    ->middleware('role_or_permission:EditarPD.update');

/**
 * -----------------------------------------------------------------------------------
 *                                      Procedimientos Od.
 * -----------------------------------------------------------------------------------
 * 
 * Lista:
 * - Registrar
 */
/* Registrar tratamiento*/
Route::get('/RegistrarT', [App\Http\Controllers\RegistrarTController::class, 'index'])
    ->name('RegistrarT')
    ->middleware('role_or_permission:procedimientos-odontologicos.ver');
Route::post('/RegistrarT', [App\Http\Controllers\RegistrarTController::class, 'store'])
    ->name('RegistrarT.store')
    ->middleware('role_or_permission:procedimientos-odontologicos.registrar');
Route::get('/eliminarT /{id}', [App\Http\Controllers\RegistrarTController::class, 'eliminarT'])
    ->name('eliminarT')
    ->middleware('role_or_permission:eliminar');
Route::get('/editarT /{id}', [App\Http\Controllers\RegistrarTController::class, 'editarT'])
    ->name('editarT')
    ->middleware('role_or_permission:procedimientos-odontologicos.editar');

Route::put('/update-RegistrarT/{id}', [App\Http\Controllers\RegistrarTController::class, 'update'])
    ->name('RegistrarT.update')
    ->middleware('role_or_permission:RegistrarT.update');

/**
 * -----------------------------------------------------------------------------------
 *                                      Agendar Citas
 * -----------------------------------------------------------------------------------
 * 
 * Lista:
 * - Calendario de Citas
 * - Citas Confirmadas
 */

/* Calendario*/
Route::get('/Calendario', [App\Http\Controllers\CalendarioController::class, 'index'])
    ->name('Calendario')
    ->middleware('role_or_permission:citas.ver');
Route::post('/Calendario', [App\Http\Controllers\CalendarioController::class, 'store'])
    ->name('Calendario.store')
    ->middleware('role_or_permission:citas.agendar');

Route::put('/Calendario/{cita}', [App\Http\Controllers\CalendarioController::class, 'update'])
    ->name('Calendario.update')
    ->middleware('role_or_permission:citas.editar');

Route::delete('/Calendario/{cita}', [App\Http\Controllers\CalendarioController::class, 'destroy'])
    ->name('Calendario.destroy')
    ->middleware('role_or_permission:citas.eliminar');

/* Citas Confirmadas*/
Route::get('/CitasC', [App\Http\Controllers\CitasCController::class, 'index'])
    ->name('CitasC');
// ->middleware('role_or_permission:citas.confirmar');

Route::get('/CitasC/{token}', [App\Http\Controllers\CitasCController::class, 'cita'])
    ->name('CitasC.cita');
Route::put('/CitasC/{token}', [App\Http\Controllers\CitasCController::class, 'validar'])
    ->name('CitasC.validar');
// ->middleware('role_or_permission:citas.confirmar');

Route::get('/ej', [App\Http\Controllers\CitasCController::class, 'ejemplo'])
    ->name('ejemplo');

/**
 * -----------------------------------------------------------------------------------
 *                                      Gestion de Paciente
 * -----------------------------------------------------------------------------------
 * 
 * Lista:
 * - Registro Expediente
 */

/* añadir Pacientes*/
Route::get('/AnadirP', [App\Http\Controllers\AnadirPController::class, 'index'])
    ->name('AnadirP')
    ->middleware('role_or_permission:pacientes.ver');
Route::post('/AnadirP', [App\Http\Controllers\AnadirPController::class, 'store'])
    ->name('AnadirP.store')
    ->middleware('role_or_permission:pacientes.agregar');

/* Registro Expediente*/
Route::get('/RegistroE', [App\Http\Controllers\RegistroEController::class, 'index'])
    ->name('RegistroE')
    ->middleware('role_or_permission:RegistroE');
Route::get('/eliminarE /{id}', [App\Http\Controllers\RegistroEController::class, 'eliminarE'])
    ->name('eliminarE')
    ->middleware('role_or_permission:pacientes.eliminar');

/* Historia Clinica*/
Route::get('/HistoriaC', [App\Http\Controllers\HistoriaCController::class, 'index'])
    ->name('HistoriaC')
    ->middleware('role_or_permission:HistoriaC');
Route::get('/HistoriaC/buscar/{id}', [App\Http\Controllers\HistoriaCController::class, 'buscar'])
    ->name('HistoriaC.buscar')
    ->middleware('role_or_permission:HistoriaC.buscar');


/* añadir tratamiento paciente*/
Route::get('/AnadirT', [App\Http\Controllers\AnadirTController::class, 'index'])
    ->name('AnadirT')
    ->middleware('role_or_permission:tratamientos.insertar');
Route::post('/AnadirT', [App\Http\Controllers\AnadirTController::class, 'store'])
    ->name('AnadirT.store')
    ->middleware('role_or_permission:AnadirT.store');
Route::put('/AnadirT/edit/{slug?}', [App\Http\Controllers\AnadirTController::class, 'edit'])
    ->name('AnadirT.edit')
    ->middleware('role_or_permission:AnadirT.edi');
Route::get('/AnadirT/buscar/{id}', [App\Http\Controllers\AnadirTController::class, 'buscar'])
    ->name('AnadirT.buscar')
    ->middleware('role_or_permission:AnadirT.buscar');
Route::put('/update-AnadirT/{slug?}', [App\Http\Controllers\AnadirTController::class, 'update'])
    ->name('AnadirT.update')
    ->middleware('role_or_permission:AnadirT.update');

/* Odontograma*/
Route::get('/Odontograma', [App\Http\Controllers\OdontogramaController::class, 'index'])
    ->name('Odontograma')
    ->middleware('role_or_permission:Odontograma');
Route::post('/Odontograma/{id}/{piezas_id}', [App\Http\Controllers\OdontogramaController::class, 'store'])
    ->name('Odontograma.store')
    ->middleware('role_or_permission:Odontograma.store');
Route::get('/AnadirT/{id}/{piezas_id}', [App\Http\Controllers\OdontogramaController::class, 'create'])
    ->name('Odontograma.create')
    ->middleware('role_or_permission:Odontograma.create');
Route::put('/AnadirT/edit/{slug?}', [App\Http\Controllers\AnadirTController::class, 'edit'])
    ->name('AnadirT.edit')
    ->middleware('role_or_permission:AnadirT.edit');
Route::get('/Odontograma/buscar/{idp}/{id} ', [App\Http\Controllers\OdontogramaController::class, 'buscar'])
    ->name('Odontograma.buscar')
    ->middleware('role_or_permission:Odontograma.buscar');
Route::put('/update-AnadirT/{slug?}', [App\Http\Controllers\AnadirTController::class, 'update'])
    ->name('AnadirT.update')
    ->middleware('role_or_permission:AnadirT.update');


/* Ruta Tratamiento */
Route::get('/RutaT/{id}', [App\Http\Controllers\RutaTController::class, 'buscar'])
    ->name('RutaT.buscar')
    ->middleware('role_or_permission:RutaT.buscar');
Route::get('/RutaT/editar/{id}', [App\Http\Controllers\RutaTController::class, 'editar'])
    ->name('RutaT.editar')
    ->middleware('role_or_permission:RutaT.editar');
Route::patch('/update-RutaT/{paciente_diagnostico}', [App\Http\Controllers\RutaTController::class, 'update'])
    ->name('RutaT.update')
    ->middleware('role_or_permission:RutaT.update');

/**
 * -----------------------------------------------------------------------------------
 *                                      Gestion de Insumos
 * -----------------------------------------------------------------------------------
 * 
 * Lista:
 * - Listado de Insumos
 * - Cargas de Insumos
 * - Reservas de Insumos
 * - Historial de Insumos
 */

/* Gestión de Insumos */
Route::resource('/insumos', InsumoController::class)
    ->except('show')
    ->middleware('role_or_permission:insumos');
Route::resource('/cargas', CargaController::class)
    ->except('show')
    ->middleware('role_or_permission:cargas');
Route::resource('/reservas', ReservaController::class)
    ->middleware('role_or_permission:reservas');
Route::patch('/reservas/{reserva}/restitucion', ReservaRestitucionController::class)
    ->name('reservas.restitucion')
    ->middleware('role_or_permission:reservas.restitucion');
Route::get('/operaciones', OperacionController::class)
    ->name('operaciones.index')
    ->middleware('role_or_permission:operaciones');
Route::get('/diagnosticos/{paciente_diagnostico}', [DiagnosticoController::class, 'show'])
    ->name('diagnosticos.show')
    ->middleware('role_or_permission:diagnosticos.show');
Route::get('/diagnosticos/{paciente_diagnostico}/edit', [DiagnosticoController::class, 'edit'])
    ->name('diagnosticos.edit')
    ->middleware('role_or_permission:diagnosticos.edit');
Route::patch('/diagnosticos/{paciente_diagnostico}', [DiagnosticoController::class, 'update'])
    ->name('diagnosticos.update')
    ->middleware('role_or_permission:diagnosticos.update');
Route::get('/diagnosticos/{paciente_diagnostico}/consumos', [DiagnosticoController::class, 'create'])
    ->name('diagnosticos.consumos.create')
    ->middleware('role_or_permission:diagnosticos.consumos.create');
Route::post('/diagnosticos/{paciente_diagnostico}/consumos', [DiagnosticoController::class, 'store'])
    ->name('diagnosticos.consumos.store')
    ->middleware('role_or_permission:diagnosticos.consumos.store');

/**
 * -----------------------------------------------------------------------------------
 *                                      Doctores
 * -----------------------------------------------------------------------------------
 * 
 * Lista:
 * - Registrar Doctor
 */

// Doctores
Route::get('/Doctores', [App\Http\Controllers\DoctoresController::class, 'index'])
    ->name('Doctores')
    ->middleware('role_or_permission:doctores.ver');
Route::get('/eliminarD /{id}', [App\Http\Controllers\DoctoresController::class, 'eliminarD'])
    ->name('eliminarD')
    ->middleware('role_or_permission:doctores.eliminar');

/* añadir Doctores*/
Route::get('/AnadirD', [App\Http\Controllers\AnadirDController::class, 'index'])
    ->name('AnadirD')
    ->middleware('role_or_permission:doctores.agregar');
Route::post('/AnadirD', [App\Http\Controllers\AnadirDController::class, 'store'])
    ->name('AnadirD.store')
    ->middleware('role_or_permission:doctores.agregar');
Route::get('/AnadirD/{slug?}/edit', [App\Http\Controllers\AnadirDController::class, 'edit'])
    ->name('AnadirD.edit')
    ->middleware('role_or_permission:doctores.editar');
Route::put('/update-AnadirD/{slug?}', [App\Http\Controllers\AnadirDController::class, 'update'])
    ->name('AnadirD.update')
    ->middleware('role_or_permission:doctores.actualizar');

/**
 * -----------------------------------------------------------------------------------
 *                                      Honorarios
 * -----------------------------------------------------------------------------------
 * 
 * Lista:
 * - Ganancias
 * - Tratamientos Realizados
 */

Route::get('/GananciasA', [App\Http\Controllers\GananciasAController::class, 'index'])
    ->name('GananciasA')
    ->middleware('role_or_permission:GananciasA');
Route::post('/GananciasA/mostrar', [App\Http\Controllers\GananciasAController::class, 'mostrar'])->name('GananciasA.mostrar');
Route::get('/TratamientoR', [App\Http\Controllers\TratamientoRController::class, 'index'])
    ->name('TratamientoR')
    ->middleware('role_or_permission:TratamientoR');

/**
 * -----------------------------------------------------------------------------------
 *                                      Configuracion
 *                                      (Rol - Admin)
 * -----------------------------------------------------------------------------------
 * 
 * Lista:
 * - Gestion de Usuario
 *   - Contacto
 *   - Localizacion
 *   - Personalizar
 *   - Roles y Permisos
 *   - Correo
 *   - Ajsute de Porcentajes
 *   - Cambio de Contraseña
 * - Mantenimiento:
 *   - Bitácora
 *   - Respaldo BD
 */

Route::group(['middleware' => ['role:Admin']], function () {
    /**
     * -----------------------------------------------------------------------------------
     *                                      Gestion de Usuario
     * -----------------------------------------------------------------------------------
     */

    Route::get('/GestionU', [App\Http\Controllers\GestionUController::class, 'index'])
        ->name('GestionU');
    Route::post('/GestionU', [App\Http\Controllers\GestionUController::class, 'store'])
        ->name('GestionU.store');
    Route::get('/Localizacion', [App\Http\Controllers\LocalizacionController::class, 'index'])
        ->name('Localizacion');
    Route::post('/Localizacion', [App\Http\Controllers\LocalizacionController::class, 'store'])
        ->name('Localizacion.store');
    Route::get('/Personalizar', [App\Http\Controllers\PersonalizarController::class, 'index'])
        ->name('Personalizar');
    Route::post('/Personalizar', [App\Http\Controllers\PersonalizarController::class, 'store'])
        ->name('Personalizar.store');

    // Roles Y Permisos
    Route::controller(RolesPController::class)->group(function () {
        Route::get('/RolesP', 'index')
            ->name('RolesP');
        Route::get('/RolesC', 'create')
            ->name('Roles.create');
        Route::post('/RolesS', 'store')
            ->name('Roles.store');
        Route::get('/Roles/{rolSeleccionado}', 'show')
            ->name('Roles.show');
        Route::put('/Roles/{rolSeleccionado}/actualizar', 'update')
            ->name('Roles.update');
    });

    Route::get('/Correo', [App\Http\Controllers\CorreoController::class, 'index'])
        ->name('Correo');
    Route::post('/Correo', [App\Http\Controllers\CorreoController::class, 'store'])
        ->name('Correo.store');
    Route::get('/Porcentajes', [App\Http\Controllers\PorcentajesController::class, 'index'])
        ->name('Porcentajes');
    Route::post('/Porcentajes', [App\Http\Controllers\PorcentajesController::class, 'store'])
        ->name('Porcentajes.store');
    Route::get('/CambioC', [App\Http\Controllers\CambioCController::class, 'index'])
        ->name('CambioC');
    Route::post('/CambioC', [App\Http\Controllers\CambioCController::class, 'store'])
        ->name('CambioC.store');

    /**
     * -----------------------------------------------------------------------------------
     *                                      Mantenimiento
     * -----------------------------------------------------------------------------------
     */

    Route::get('/Bitacora', [App\Http\Controllers\BitacoraController::class, 'index'])
        ->name('Bitacora');
    Route::get('/RespaldoB', [App\Http\Controllers\RespaldoBController::class, 'index'])
        ->name('RespaldoB');
});

/**
 * -----------------------------------------------------------------------------------
 *                                      Ayuda
 * -----------------------------------------------------------------------------------
 */

Route::get('/Ayuda', [App\Http\Controllers\AyudaController::class, 'index'])
    ->name('Ayuda')
    ->middleware('role_or_permission:Ayuda');
Route::get('/blogAyuda', [App\Http\Controllers\blogAyudaController::class, 'index'])
    ->name('blogAyuda');
