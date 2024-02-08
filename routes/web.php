<?php
//use App\Http\Controllers\;

use App\Http\Controllers\InsumoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('Landing');
});

/*Index*/
Route::get('/Index', [App\Http\Controllers\IndexController::class, 'index'])->name('Index');


/* Registrar tratamiento*/ 
Route::get('/RegistrarT', [App\Http\Controllers\RegistrarTController::class, 'index'])->name('RegistrarT');

Route::post('/RegistrarT', [App\Http\Controllers\RegistrarTController::class, 'store'])->name('RegistrarT.store');

Route::get('/eliminarT /{id}', [App\Http\Controllers\RegistrarTController::class, 'eliminarT'])->name('eliminarT');

Route::get('/editarT /{id}', [App\Http\Controllers\RegistrarTController::class, 'editarT'])->name('editarT');

Route::put('/update-RegistrarT/{id}', [App\Http\Controllers\RegistrarTController::class, 'update'])->name('RegistrarT.update');


/* Calendario*/ 
Route::get('/Calendario', [App\Http\Controllers\CalendarioController::class, 'index'])->name('Calendario');

Route::post('/Calendario', [App\Http\Controllers\CalendarioController::class, 'store'])->name('Calendario.store');

Route::get('/Calendario/{slug?}/edit', [App\Http\Controllers\CalendarioController::class, 'edit'])->name('marca.edit');

Route::put('/update-Calendario/{slug?}', [App\Http\Controllers\CalendarioController::class, 'update'])->name('marca.update');


/* Citas Confirmadas*/ 
Route::get('/CitasC', [App\Http\Controllers\CitasCController::class, 'index'])->name('CitasC');


/* Registro Expediente*/
Route::get('/RegistroE', [App\Http\Controllers\RegistroEController::class, 'index'])->name('RegistroE');

Route::get('/eliminarE /{id}', [App\Http\Controllers\RegistroEController::class, 'eliminarE'])->name('eliminarE');


/* Historia Clinica*/
Route::get('/HistoriaC', [App\Http\Controllers\HistoriaCController::class, 'index'])->name('HistoriaC');

Route::get('/HistoriaC/buscar/{id}', [App\Http\Controllers\HistoriaCController::class, 'buscar'])->name('HistoriaC.buscar');


/* añadir tratamiento paciente*/ 
Route::get('/AnadirT', [App\Http\Controllers\AnadirTController::class, 'index'])->name('AnadirT');

Route::post('/AnadirT', [App\Http\Controllers\AnadirTController::class, 'store'])->name('AnadirT.store');

Route::put('/AnadirT/edit/{slug?}', [App\Http\Controllers\AnadirTController::class, 'edit'])->name('AnadirT.edit');

Route::get('/AnadirT/buscar/{id}', [App\Http\Controllers\AnadirTController::class, 'buscar'])->name('AnadirT.buscar');

Route::put('/update-AnadirT/{slug?}', [App\Http\Controllers\AnadirTController::class, 'update'])->name('AnadirT.update');


/* Odontograma*/ 
Route::get('/Odontograma', [App\Http\Controllers\OdontogramaController::class, 'index'])->name('Odontograma');

Route::post('/Odontograma/{id}/{piezas_id}', [App\Http\Controllers\OdontogramaController::class, 'store'])->name('Odontograma.store');

Route::get('/AnadirT/{id}/{piezas_id}', [App\Http\Controllers\OdontogramaController::class, 'create'])->name('Odontograma.create');

Route::put('/AnadirT/edit/{slug?}', [App\Http\Controllers\AnadirTController::class, 'edit'])->name('AnadirT.edit');

Route::get('/Odontograma/buscar/{idp}/{id} ', [App\Http\Controllers\OdontogramaController::class, 'buscar'])->name('Odontograma.buscar');

Route::put('/update-AnadirT/{slug?}', [App\Http\Controllers\AnadirTController::class, 'update'])->name('AnadirT.update');


/* Ruta Tratamientoa*/ 
Route::get('/RutaT/{id}', [App\Http\Controllers\RutaTController::class, 'buscar'])->name('RutaT.buscar');

Route::get('/RutaT /{id}', [App\Http\Controllers\RutaTController::class, 'eliminarT'])->name('RutaT.eliminarT');

Route::get('/RutaT/Mostrar/{id}', [App\Http\Controllers\RutaTController::class, 'store'])->name('RutaT.store');

Route::get('/RutaT/editar/{id}', [App\Http\Controllers\RutaTController::class, 'editar'])->name('RutaT.editar');

Route::put('/update-RutaT/{id}', [App\Http\Controllers\RutaTController::class, 'update'])->name('RutaT.update');


/* Gestión de Insumos */
Route::resource('/insumos', InsumoController::class);


/* Ganancias Acumuladas */ 
Route::get('/GananciasA', [App\Http\Controllers\GananciasAController::class, 'index'])->name('GananciasA');


/* Tratamientos Realizados */ 
Route::get('/TratamientoR', [App\Http\Controllers\TratamientoRController::class, 'index'])->name('TratamientoR');


/*GESTION DE USUARIO */
Route::get('/GestionU', [App\Http\Controllers\GestionUController::class, 'index'])->name('GestionU');

Route::post('/GestionU', [App\Http\Controllers\GestionUController::class, 'store'])->name('GestionU.store');


/* Localización*/ 
Route::get('/Localizacion', [App\Http\Controllers\LocalizacionController::class, 'index'])->name('Localizacion');

Route::post('/Localizacion', [App\Http\Controllers\LocalizacionController::class, 'store'])->name('Localizacion.store');


/* Personalizar*/ 
Route::get('/Personalizar', [App\Http\Controllers\PersonalizarController::class, 'index'])->name('Personalizar');

Route::post('/Personalizar', [App\Http\Controllers\PersonalizarController::class, 'store'])->name('Personalizar.store');


/* Roles Y Permisos*/ 
Route::get('/RolesP', [App\Http\Controllers\RolesPController::class, 'index'])->name('RolesP');


/* Correo*/ 
Route::get('/Correo', [App\Http\Controllers\CorreoController::class, 'index'])->name('Correo');

Route::post('/Correo', [App\Http\Controllers\CorreoController::class, 'store'])->name('Correo.store');


/* Porcentajes*/ 
Route::get('/Porcentajes', [App\Http\Controllers\PorcentajesController::class, 'index'])->name('Porcentajes');

Route::post('/Porcentajes', [App\Http\Controllers\PorcentajesController::class, 'store'])->name('Porcentajes.store');


/* Cambiar Contraseña*/ 
Route::get('/CambioC', [App\Http\Controllers\CambioCController::class, 'index'])->name('CambioC');

Route::post('/CambioC', [App\Http\Controllers\CambioCController::class, 'store'])->name('CambioC.store');


/* Bitacora*/ 
Route::get('/Bitacora', [App\Http\Controllers\BitacoraController::class, 'index'])->name('Bitacora');


/* RespaldoB*/ 
Route::get('/RespaldoB', [App\Http\Controllers\RespaldoBController::class, 'index'])->name('RespaldoB');


/* Perfil*/ 
Route::get('/Perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('Perfil');

Route::post('/Perfil/{id}', [App\Http\Controllers\PerfilController::class, 'show'])->name('Perfil.show');


/* Editar Perfil*/ 
// Route::get('/EditarP', [App\Http\Controllers\EditarPController::class, 'index'])->name('EditarP');
// 
// Route::post('/EditarP', [App\Http\Controllers\EditarPController::class, 'store'])->name('EditarP.store');
// 

Route::get('/EditarP/{id}', [App\Http\Controllers\EditarPController::class, 'edit'])->name('EditarP.edit');

Route::get('/AnadirT/{id}', [App\Http\Controllers\EditarPController::class, 'buscar'])->name('EditarP.buscar');

Route::put('/update-EditarP/{id}', [App\Http\Controllers\EditarPController::class, 'update'])->name('EditarP.update');


/* Editar Perfil doctor*/ 
// Route::get('/EditarPD', [App\Http\Controllers\EditarPDController::class, 'index'])->name('EditarPD');

Route::post('/EditarPD', [App\Http\Controllers\EditarPDController::class, 'store'])->name('EditarPD.store');


Route::get('/EditarPD/{id}', [App\Http\Controllers\EditarPDController::class, 'edit'])->name('EditarPD.edit');

Route::put('/update-EditarPD/{id}', [App\Http\Controllers\EditarPDController::class, 'update'])->name('EditarPD.update');




/* Contraseña Perfil*/ 
Route::get('/ContraseñaP', [App\Http\Controllers\ContraseñaPController::class, 'index'])->name('ContraseñaP');


/* Landing*/ 
Route::get('/Landing', [App\Http\Controllers\LandingController::class, 'index'])->name('Landing');


/* Doctores*/ 
Route::get('/Doctores', [App\Http\Controllers\DoctoresController::class, 'index'])->name('Doctores');

Route::get('/eliminarD /{id}', [App\Http\Controllers\DoctoresController::class, 'eliminarD'])->name('eliminarD');


/* añadir Doctores*/ 
Route::get('/AnadirD', [App\Http\Controllers\AnadirDController::class, 'index'])->name('AnadirD');

Route::post('/AnadirD', [App\Http\Controllers\AnadirDController::class, 'store'])->name('AnadirD.store');

Route::get('/AnadirD/{slug?}/edit', [App\Http\Controllers\AnadirDController::class, 'edit'])->name('AnadirD.edit');

Route::put('/update-AnadirD/{slug?}', [App\Http\Controllers\AnadirDController::class, 'update'])->name('AnadirD.update');


/* añadir Pacientes*/ 
Route::get('/AnadirP', [App\Http\Controllers\AnadirPController::class, 'index'])->name('AnadirP');


Route::post('/AnadirP', [App\Http\Controllers\AnadirPController::class, 'store'])->name('AnadirP.store');

Route::get('/AnadirP/{slug?}/edit', [App\Http\Controllers\AnadirPController::class, 'edit'])->name('AnadirP.edit');

Route::put('/update-AnadirP/{slug?}', [App\Http\Controllers\AnadirPController::class, 'update'])->name('AnadirP.update');


/* Ayuda*/ 
Route::get('/Ayuda', [App\Http\Controllers\AyudaController::class, 'index'])->name('Ayuda');

Route::post('/Ayuda', [App\Http\Controllers\AyudaController::class, 'store'])->name('Ayuda.store');

Route::get('/Ayuda/{slug?}/edit', [App\Http\Controllers\AyudaController::class, 'edit'])->name('Ayuda.edit');

Route::put('/update-AnadirP/{slug?}', [App\Http\Controllers\AnadirPController::class, 'update'])->name('AnadirP.update');

/* Ayuda*/ 
Route::get('/blogAyuda', [App\Http\Controllers\blogAyudaController::class, 'index'])->name('blogAyuda');

Route::post('/blogAyuda', [App\Http\Controllers\blogAyudaController::class, 'store'])->name('blogAyuda.store');

Route::get('/Ayuda/{slug?}/edit', [App\Http\Controllers\AyudaController::class, 'edit'])->name('Ayuda.edit');

Route::put('/update-AnadirP/{slug?}', [App\Http\Controllers\AnadirPController::class, 'update'])->name('AnadirP.update');



//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
