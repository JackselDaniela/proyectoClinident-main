<?php
//use App\Http\Controllers\;
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
    Auth::routes();
Route::post('/marca', [App\Http\Controllers\MarcaController::class, 'store'])->name('marca.store');
    Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
    Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
    Auth::routes();
    
    /* Registrar tratamiento*/ 
Route::get('/RegistrarT', [App\Http\Controllers\RegistrarTController::class, 'index'])->name('RegistrarT');
Auth::routes();
Route::post('/RegistrarT', [App\Http\Controllers\RegistrarTController::class, 'store'])->name('RegistrarT.store');
Auth::routes();
Route::get('/eliminarT /{id}', [App\Http\Controllers\RegistrarTController::class, 'eliminarT'])->name('eliminarT');
Auth::routes();
Route::get('/editarT /{id}', [App\Http\Controllers\RegistrarTController::class, 'editarT'])->name('editarT');
Auth::routes();

Route::put('/update-RegistrarT/{id}', [App\Http\Controllers\RegistrarTController::class, 'update'])->name('RegistrarT.update');
Auth::routes();
    
    /* Calendario*/ 
Route::get('/Calendario', [App\Http\Controllers\CalendarioController::class, 'index'])->name('Calendario');
Auth::routes();
Route::post('/Calendario', [App\Http\Controllers\CalendarioController::class, 'store'])->name('Calendario.store');
Auth::routes();
Route::get('/Calendario/{slug?}/edit', [App\Http\Controllers\CalendarioController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-Calendario/{slug?}', [App\Http\Controllers\CalendarioController::class, 'update'])->name('marca.update');
Auth::routes();
    
    /* Citas Confirmadas*/ 
Route::get('/CitasC', [App\Http\Controllers\CitasCController::class, 'index'])->name('CitasC');
Auth::routes();
Route::post('/marca', [App\Http\Controllers\MarcaController::class, 'store'])->name('marca.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

    /* Registro Expediente*/ 
Route::get('/RegistroE', [App\Http\Controllers\RegistroEController::class, 'index'])->name('RegistroE');
Auth::routes();
Route::post('/marca', [App\Http\Controllers\MarcaController::class, 'store'])->name('marca.store');
Auth::routes();
Route::get('/eliminarE /{id}', [App\Http\Controllers\RegistroEController::class, 'eliminarE'])->name('eliminarE');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

    /* Historia Clinica*/ 
Route::get('/HistoriaC', [App\Http\Controllers\HistoriaCController::class, 'index'])->name('HistoriaC');
Auth::routes();
Route::post('/marca', [App\Http\Controllers\MarcaController::class, 'store'])->name('marca.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();
Route::get('/HistoriaC/buscar/{id}', [App\Http\Controllers\HistoriaCController::class, 'buscar'])->name('HistoriaC.buscar');
Auth::routes();


/* añadir tratamiento paciente*/ 
Route::get('/AnadirT/', [App\Http\Controllers\AnadirTController::class, 'index'])->name('AnadirT');
Auth::routes();
Route::post('/AnadirT', [App\Http\Controllers\AnadirTController::class, 'store'])->name('AnadirT.store');
Auth::routes();
Route::put('/AnadirT/edit/{slug?}', [App\Http\Controllers\AnadirTController::class, 'edit'])->name('AnadirT.edit');
Auth::routes();
Route::get('/AnadirT/buscar/{id}', [App\Http\Controllers\AnadirTController::class, 'buscar'])->name('AnadirT.buscar');
Auth::routes();
Route::put('/update-AnadirT/{slug?}', [App\Http\Controllers\AnadirTController::class, 'update'])->name('AnadirT.update');
Auth::routes();

/* Odontograma*/ 
Route::get('/Odontograma', [App\Http\Controllers\OdontogramaController::class, 'index'])->name('Odontograma');
Auth::routes();
Route::post('/Odontograma/{id}/{piezas_id}', [App\Http\Controllers\OdontogramaController::class, 'store'])->name('Odontograma.store');
Auth::routes();
Route::get('/AnadirT/{id}/{piezas_id}', [App\Http\Controllers\OdontogramaController::class, 'create'])->name('Odontograma.create');
Auth::routes();
Route::put('/AnadirT/edit/{slug?}', [App\Http\Controllers\AnadirTController::class, 'edit'])->name('AnadirT.edit');
Auth::routes();
Route::get('/Odontograma/buscar/{idp}/{id} ', [App\Http\Controllers\OdontogramaController::class, 'buscar'])->name('Odontograma.buscar');
Auth::routes();
Route::put('/update-AnadirT/{slug?}', [App\Http\Controllers\AnadirTController::class, 'update'])->name('AnadirT.update');
Auth::routes();

/* Ruta Tratamientoa*/ 
Route::get('/RutaT/{id}', [App\Http\Controllers\RutaTController::class, 'buscar'])->name('RutaT.buscar');
Auth::routes();
Route::get('/RutaT /{id}', [App\Http\Controllers\RutaTController::class, 'eliminarT'])->name('RutaT.eliminarT');
Auth::routes();
Route::get('/RutaT/Mostrar/{id}', [App\Http\Controllers\RutaTController::class, 'store'])->name('RutaT.store');
Auth::routes();
Route::get('/RutaT/editar/{id}', [App\Http\Controllers\RutaTController::class, 'editar'])->name('RutaT.editar');
Auth::routes();
Route::put('/update-RutaT/{id}', [App\Http\Controllers\RutaTController::class, 'update'])->name('RutaT.update');
Auth::routes();

/* Solicitud Insumos*/ 
Route::get('/SolicitudI', [App\Http\Controllers\SolicitudIController::class, 'index'])->name('SolicitudI');
Auth::routes();
Route::post('/SolicitudI', [App\Http\Controllers\SolicitudIController::class, 'store'])->name('SolicitudI.store');
Auth::routes();
Route::get('/SolicitudI/{slug?}/edit', [App\Http\Controllers\SolicitudIController::class, 'edit'])->name('SolicitudI.edit');
Auth::routes();
Route::put('/update-SolicitudI/{slug?}', [App\Http\Controllers\SolicitudIController::class, 'update'])->name('SolicitudI.update');
Auth::routes();

/* Nueva Carga */ 
Route::get('/NuevaC', [App\Http\Controllers\NuevaCController::class, 'index'])->name('NuevaC');
Auth::routes();
Route::post('/marca', [App\Http\Controllers\MarcaController::class, 'store'])->name('marca.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

/* Ganancias Acumuladas */ 
Route::get('/GananciasA', [App\Http\Controllers\GananciasAController::class, 'index'])->name('GananciasA');
Auth::routes();
Route::post('/marca', [App\Http\Controllers\MarcaController::class, 'store'])->name('marca.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

/* Tratamientos Realizados */ 
Route::get('/TratamientoR', [App\Http\Controllers\TratamientoRController::class, 'index'])->name('TratamientoR');
Auth::routes();
Route::post('/marca', [App\Http\Controllers\MarcaController::class, 'store'])->name('marca.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

/*GESTION DE USUARIO */

/* Tratamientos Realizados */ 
Route::get('/GestionU', [App\Http\Controllers\GestionUController::class, 'index'])->name('GestionU');
Auth::routes();
Route::post('/GestionU', [App\Http\Controllers\GestionUController::class, 'store'])->name('GestionU.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

/* Localización*/ 
Route::get('/Localizacion', [App\Http\Controllers\LocalizacionController::class, 'index'])->name('Localizacion');
Auth::routes();
Route::post('/Localizacion', [App\Http\Controllers\LocalizacionController::class, 'store'])->name('Localizacion.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

/* Personalizar*/ 
Route::get('/Personalizar', [App\Http\Controllers\PersonalizarController::class, 'index'])->name('Personalizar');
Auth::routes();
Route::post('/Personalizar', [App\Http\Controllers\PersonalizarController::class, 'store'])->name('Personalizar.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

/* Roles Y Permisos*/ 
Route::get('/RolesP', [App\Http\Controllers\RolesPController::class, 'index'])->name('RolesP');
Auth::routes();
Route::post('/marca', [App\Http\Controllers\MarcaController::class, 'store'])->name('marca.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

/* Correo*/ 
Route::get('/Correo', [App\Http\Controllers\CorreoController::class, 'index'])->name('Correo');
Auth::routes();
Route::post('/Correo', [App\Http\Controllers\CorreoController::class, 'store'])->name('Correo.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

/* Porcentajes*/ 
Route::get('/Porcentajes', [App\Http\Controllers\PorcentajesController::class, 'index'])->name('Porcentajes');
Auth::routes();
Route::post('/Porcentajes', [App\Http\Controllers\PorcentajesController::class, 'store'])->name('Porcentajes.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

/* Cambiar Contraseña*/ 
Route::get('/CambioC', [App\Http\Controllers\CambioCController::class, 'index'])->name('CambioC');
Auth::routes();
Route::post('/CambioC', [App\Http\Controllers\CambioCController::class, 'store'])->name('CambioC.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

/* Bitacora*/ 
Route::get('/Bitacora', [App\Http\Controllers\BitacoraController::class, 'index'])->name('Bitacora');
Auth::routes();
Route::post('/marca', [App\Http\Controllers\MarcaController::class, 'store'])->name('marca.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();


/* RespaldoB*/ 
Route::get('/RespaldoB', [App\Http\Controllers\RespaldoBController::class, 'index'])->name('RespaldoB');
Auth::routes();
Route::post('/marca', [App\Http\Controllers\MarcaController::class, 'store'])->name('marca.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

/* Perfil*/ 
Route::get('/Perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('Perfil');
Auth::routes();
Route::post('/Perfil/{id}', [App\Http\Controllers\PerfilController::class, 'show'])->name('Perfil.show');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

/* Editar Perfil*/ 
// Route::get('/EditarP', [App\Http\Controllers\EditarPController::class, 'index'])->name('EditarP');
// Auth::routes();
// Route::post('/EditarP', [App\Http\Controllers\EditarPController::class, 'store'])->name('EditarP.store');
// Auth::routes();

Route::get('/EditarP/{id}', [App\Http\Controllers\EditarPController::class, 'edit'])->name('EditarP.edit');
Auth::routes();
Route::get('/AnadirT/{id}', [App\Http\Controllers\EditarPController::class, 'buscar'])->name('EditarP.buscar');

Route::put('/update-EditarP/{id}', [App\Http\Controllers\EditarPController::class, 'update'])->name('EditarP.update');
Auth::routes();

/* Editar Perfil doctor*/ 
// Route::get('/EditarPD', [App\Http\Controllers\EditarPDController::class, 'index'])->name('EditarPD');
Auth::routes();
Route::post('/EditarPD', [App\Http\Controllers\EditarPDController::class, 'store'])->name('EditarPD.store');
Auth::routes();

Route::get('/EditarPD/{id}', [App\Http\Controllers\EditarPDController::class, 'edit'])->name('EditarPD.edit');
Auth::routes();
Route::put('/update-EditarPD/{id}', [App\Http\Controllers\EditarPDController::class, 'update'])->name('EditarPD.update');
Auth::routes();



/* Contraseña Perfil*/ 
Route::get('/ContraseñaP', [App\Http\Controllers\ContraseñaPController::class, 'index'])->name('ContraseñaP');
Auth::routes();
Route::post('/marca', [App\Http\Controllers\MarcaController::class, 'store'])->name('marca.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

/* Landing*/ 
Route::get('/Landing', [App\Http\Controllers\LandingController::class, 'index'])->name('Landing');
Auth::routes();
Route::post('/marca', [App\Http\Controllers\MarcaController::class, 'store'])->name('marca.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

/* Doctores*/ 
Route::get('/Doctores', [App\Http\Controllers\DoctoresController::class, 'index'])->name('Doctores');
Auth::routes();
Route::post('/marca', [App\Http\Controllers\MarcaController::class, 'store'])->name('marca.store');
Auth::routes();
Route::get('/marcas/{slug?}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marca.edit');
Auth::routes();
Route::get('/eliminarD /{id}', [App\Http\Controllers\DoctoresController::class, 'eliminarD'])->name('eliminarD');
Auth::routes();
Route::put('/update-marca/{slug?}', [App\Http\Controllers\MarcaController::class, 'update'])->name('marca.update');
Auth::routes();

/* añadir Doctores*/ 
Route::get('/AnadirD', [App\Http\Controllers\AnadirDController::class, 'index'])->name('AnadirD');
Auth::routes();
Route::post('/AnadirD', [App\Http\Controllers\AnadirDController::class, 'store'])->name('AnadirD.store');
Auth::routes();
Route::get('/AnadirD/{slug?}/edit', [App\Http\Controllers\AnadirDController::class, 'edit'])->name('AnadirD.edit');
Auth::routes();
Route::put('/update-AnadirD/{slug?}', [App\Http\Controllers\AnadirDController::class, 'update'])->name('AnadirD.update');
Auth::routes();

/* añadir Pacientes*/ 
Route::get('/AnadirP', [App\Http\Controllers\AnadirPController::class, 'index'])->name('AnadirP');
Auth::routes();

Route::post('/AnadirP', [App\Http\Controllers\AnadirPController::class, 'store'])->name('AnadirP.store');
Auth::routes();
Route::get('/AnadirP/{slug?}/edit', [App\Http\Controllers\AnadirPController::class, 'edit'])->name('AnadirP.edit');
Auth::routes();
Route::put('/update-AnadirP/{slug?}', [App\Http\Controllers\AnadirPController::class, 'update'])->name('AnadirP.update');
Auth::routes();

/* Ayuda*/ 
Route::get('/Ayuda', [App\Http\Controllers\AyudaController::class, 'index'])->name('Ayuda');
Auth::routes();
Route::post('/Ayuda', [App\Http\Controllers\AyudaController::class, 'store'])->name('Ayuda.store');
Auth::routes();
Route::get('/Ayuda/{slug?}/edit', [App\Http\Controllers\AyudaController::class, 'edit'])->name('Ayuda.edit');
Auth::routes();
Route::put('/update-AnadirP/{slug?}', [App\Http\Controllers\AnadirPController::class, 'update'])->name('AnadirP.update');
Auth::routes();
/* Ayuda*/ 
Route::get('/blogAyuda', [App\Http\Controllers\blogAyudaController::class, 'index'])->name('blogAyuda');
Auth::routes();
Route::post('/blogAyuda', [App\Http\Controllers\blogAyudaController::class, 'store'])->name('blogAyuda.store');
Auth::routes();
Route::get('/Ayuda/{slug?}/edit', [App\Http\Controllers\AyudaController::class, 'edit'])->name('Ayuda.edit');
Auth::routes();
Route::put('/update-AnadirP/{slug?}', [App\Http\Controllers\AnadirPController::class, 'update'])->name('AnadirP.update');
Auth::routes();


//Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
