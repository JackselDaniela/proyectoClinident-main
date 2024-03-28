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
 * 1. En el archivo hay varias rutas con un comentario arriba de estas "@PENDING", son rutas que aun no tienen un permiso o rol asignado,
 * se recomienda revisar. Adicionalmente, la representación de cada una es:
 * 
 *    1.1.  @PENDING - all: Todas las rutas en este bloque están pendientes por asignar rol o permiso.
 *    1.2.  @PENDING - many: Muchas o algunas de las rutas en este bloque están pendientes por asignar rol o permiso.
 *    1.3.  @PENDING - unique: Solo la siguiente ruta está pendiente por asignar rol o permiso.
 * 
 * 2. Para facilitar la lectura del archivo mantener el órden y estructura ya establecido.
 */

/**
 * -----------------------------------------------------------------------------------
 *                                      Por agrupar
 * -----------------------------------------------------------------------------------
 */

// @PENDING - all
Route::view('/correo', 'emails.confirmacion');

/* Leer notificaciones */
Route::post('/notifications/read', function () {
    Auth::user()->unreadNotifications->markAsRead();
    return back();
})->name('notifications.read');

//Salida PdfPacientes
Route::get('/get-all-paciente', [PDFController::class, 'getAllpaciente']);
Route::get('/download-pdf', [PDFController::class, 'downloadPDF'])
    ->name('descargarPDF');

/**
 * -----------------------------------------------------------------------------------
 *                                      Inicio
 * -----------------------------------------------------------------------------------
 */

// @PENDING - all
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

// @PENDING - all
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

// @PENDING - all
/* Perfil*/
Route::get('/Perfil', [App\Http\Controllers\PerfilController::class, 'index'])
    ->name('Perfil');
Route::post('/Perfil/{id}', [App\Http\Controllers\PerfilController::class, 'show'])
    ->name('Perfil.show');
Route::get('/EditarP/{id}', [App\Http\Controllers\EditarPController::class, 'edit'])
    ->name('EditarP.edit')
    ->middleware('role_or_permission:pacientes.editar');
Route::get('/AnadirT/{id}', [App\Http\Controllers\EditarPController::class, 'buscar'])
    ->name('EditarP.buscar');
Route::put('/update-EditarP/{id}', [App\Http\Controllers\EditarPController::class, 'update'])
    ->name('EditarP.update');
Route::post('/EditarPD', [App\Http\Controllers\EditarPDController::class, 'store'])
    ->name('EditarPD.store');
Route::get('/EditarPD/{id}', [App\Http\Controllers\EditarPDController::class, 'edit'])
    ->name('EditarPD.edit')
    ->middleware('role_or_permission:doctores.editar');
Route::put('/update-EditarPD/{id}', [App\Http\Controllers\EditarPDController::class, 'update'])
    ->name('EditarPD.update');

/* Contraseña Perfil*/
Route::get('/ContraseñaP', [App\Http\Controllers\ContraseñaPController::class, 'index'])
    ->name('ContraseñaP');

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

// @PENDING - unique
Route::put('/update-RegistrarT/{id}', [App\Http\Controllers\RegistrarTController::class, 'update'])
    ->name('RegistrarT.update');

/**
 * -----------------------------------------------------------------------------------
 *                                      Agendar Citas
 * -----------------------------------------------------------------------------------
 * 
 * Lista:
 * - Calendario de Citas
 * - Citas Confirmadas
 */
// @PENDING - many
/* Calendario*/
Route::get('/Calendario', [App\Http\Controllers\CalendarioController::class, 'index'])
    ->name('Calendario')
    ->middleware('role_or_permission:citas.ver');
Route::post('/Calendario', [App\Http\Controllers\CalendarioController::class, 'store'])
    ->name('Calendario.store')
    ->middleware('role_or_permission:citas.agender');

// @PENDING - chequear el permiso de la siguiente ruta.
Route::put('/Calendario/{cita}', [App\Http\Controllers\CalendarioController::class, 'update'])
    ->name('Calendario.update')
    ->middleware('role_or_permission:citas.editar');
// @PENDING - cierre de chequeo

Route::delete('/Calendario/{cita}', [App\Http\Controllers\CalendarioController::class, 'destroy'])
    ->name('Calendario.destroy')
    ->middleware('role_or_permission:citas.eliminar');

// @PENDING - chequear el permiso de la siguiente ruta.
/* Citas Confirmadas*/
Route::get('/CitasC', [App\Http\Controllers\CitasCController::class, 'index'])
    ->name('CitasC')
    ->middleware('role_or_permission:citas.confirmar');
// @PENDING - cierre de chequeo

/**
 * -----------------------------------------------------------------------------------
 *                                      Gestion de Paciente
 * -----------------------------------------------------------------------------------
 * 
 * Lista:
 * - Registro Expediente
 */

// @PENDING - many
/* añadir Pacientes*/
Route::get('/AnadirP', [App\Http\Controllers\AnadirPController::class, 'index'])
    ->name('AnadirP')
    ->middleware('role_or_permission:pacientes.ver');
Route::post('/AnadirP', [App\Http\Controllers\AnadirPController::class, 'store'])
    ->name('AnadirP.store')
    ->middleware('role_or_permission:pacientes.agregar');
Route::get('/AnadirP/{slug?}/edit', [App\Http\Controllers\AnadirPController::class, 'edit'])
    ->name('AnadirP.edit');
Route::put('/update-AnadirP/{slug?}', [App\Http\Controllers\AnadirPController::class, 'update'])
    ->name('AnadirP.update');

/* Registro Expediente*/
Route::get('/RegistroE', [App\Http\Controllers\RegistroEController::class, 'index'])
    ->name('RegistroE');
Route::get('/eliminarE /{id}', [App\Http\Controllers\RegistroEController::class, 'eliminarE'])
    ->name('eliminarE')
    ->middleware('role_or_permission:pacientes.eliminar');

/* Historia Clinica*/
Route::get('/HistoriaC', [App\Http\Controllers\HistoriaCController::class, 'index'])
    ->name('HistoriaC');
Route::get('/HistoriaC/buscar/{id}', [App\Http\Controllers\HistoriaCController::class, 'buscar'])
    ->name('HistoriaC.buscar');


/* añadir tratamiento paciente*/
Route::get('/AnadirT', [App\Http\Controllers\AnadirTController::class, 'index'])
    ->name('AnadirT')
    ->middleware('role_or_permission:tratamientos.insertar');
Route::post('/AnadirT', [App\Http\Controllers\AnadirTController::class, 'store'])
    ->name('AnadirT.store');
Route::put('/AnadirT/edit/{slug?}', [App\Http\Controllers\AnadirTController::class, 'edit'])
    ->name('AnadirT.edit');
Route::get('/AnadirT/buscar/{id}', [App\Http\Controllers\AnadirTController::class, 'buscar'])
    ->name('AnadirT.buscar');
Route::put('/update-AnadirT/{slug?}', [App\Http\Controllers\AnadirTController::class, 'update'])
    ->name('AnadirT.update');


/* Odontograma*/
Route::get('/Odontograma', [App\Http\Controllers\OdontogramaController::class, 'index'])
    ->name('Odontograma');
Route::post('/Odontograma/{id}/{piezas_id}', [App\Http\Controllers\OdontogramaController::class, 'store'])
    ->name('Odontograma.store');
Route::get('/AnadirT/{id}/{piezas_id}', [App\Http\Controllers\OdontogramaController::class, 'create'])
    ->name('Odontograma.create');
Route::put('/AnadirT/edit/{slug?}', [App\Http\Controllers\AnadirTController::class, 'edit'])
    ->name('AnadirT.edit');
Route::get('/Odontograma/buscar/{idp}/{id} ', [App\Http\Controllers\OdontogramaController::class, 'buscar'])
    ->name('Odontograma.buscar');
Route::put('/update-AnadirT/{slug?}', [App\Http\Controllers\AnadirTController::class, 'update'])
    ->name('AnadirT.update');


/* Ruta Tratamiento */
Route::get('/RutaT/{id}', [App\Http\Controllers\RutaTController::class, 'buscar'])
    ->name('RutaT.buscar');
Route::get('/RutaT/editar/{id}', [App\Http\Controllers\RutaTController::class, 'editar'])
    ->name('RutaT.editar');
Route::patch('/update-RutaT/{paciente_diagnostico}', [App\Http\Controllers\RutaTController::class, 'update'])
    ->name('RutaT.update');

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

// @PENDING - all
/* Gestión de Insumos */
Route::resource('/insumos', InsumoController::class)->except('show');
Route::resource('/cargas', CargaController::class)->except('show');
Route::resource('/reservas', ReservaController::class);
Route::patch('/reservas/{reserva}/restitucion', ReservaRestitucionController::class)
    ->name('reservas.restitucion');
Route::get('/operaciones', OperacionController::class)
    ->name('operaciones.index');
Route::get('/diagnosticos/{paciente_diagnostico}', [DiagnosticoController::class, 'show'])
    ->name('diagnosticos.show')
    ->middleware('role_or_permission:rutatratamientos.actualizar');
Route::get('/diagnosticos/{paciente_diagnostico}/edit', [DiagnosticoController::class, 'edit'])
    ->name('diagnosticos.edit');
Route::patch('/diagnosticos/{paciente_diagnostico}', [DiagnosticoController::class, 'update'])
    ->name('diagnosticos.update');
Route::get('/diagnosticos/{paciente_diagnostico}/consumos', [DiagnosticoController::class, 'create'])
    ->name('diagnosticos.consumos.create');
Route::post('/diagnosticos/{paciente_diagnostico}/consumos', [DiagnosticoController::class, 'store'])
    ->name('diagnosticos.consumos.store');

/**
 * -----------------------------------------------------------------------------------
 *                                      Doctores
 * -----------------------------------------------------------------------------------
 * 
 * Lista:
 * - Registrar Doctor
 */

// @PENDING - many
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
    ->name('AnadirD.store');
Route::get('/AnadirD/{slug?}/edit', [App\Http\Controllers\AnadirDController::class, 'edit'])
    ->name('AnadirD.edit');
Route::put('/update-AnadirD/{slug?}', [App\Http\Controllers\AnadirDController::class, 'update'])
    ->name('AnadirD.update');

/**
 * -----------------------------------------------------------------------------------
 *                                      Honorarios
 * -----------------------------------------------------------------------------------
 * 
 * Lista:
 * - Ganancias
 * - Tratamientos Realizados
 */

// @PENDING - all
Route::get('/GananciasA', [App\Http\Controllers\GananciasAController::class, 'index'])
    ->name('GananciasA');
Route::get('/TratamientoR', [App\Http\Controllers\TratamientoRController::class, 'index'])
    ->name('TratamientoR');

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

// @PENDING - all
Route::get('/Ayuda', [App\Http\Controllers\AyudaController::class, 'index'])
    ->name('Ayuda');
Route::post('/Ayuda', [App\Http\Controllers\AyudaController::class, 'store'])
    ->name('Ayuda.store');
Route::get('/Ayuda/{slug?}/edit', [App\Http\Controllers\AyudaController::class, 'edit'])
    ->name('Ayuda.edit');
Route::put('/update-AnadirP/{slug?}', [App\Http\Controllers\AnadirPController::class, 'update'])
    ->name('AnadirP.update');
Route::get('/blogAyuda', [App\Http\Controllers\blogAyudaController::class, 'index'])
    ->name('blogAyuda');
Route::post('/blogAyuda', [App\Http\Controllers\blogAyudaController::class, 'store'])
    ->name('blogAyuda.store');
