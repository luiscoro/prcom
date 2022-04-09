<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\MiembroController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\PublicidadController;

Auth::routes();

//VISTAS DE VISITANTE
Route::group(['middleware' => 'visitante'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.inicio');
    Route::post('/post-validar-cuenta', [HomeController::class, 'postValidarCuenta'])->name('home.postValidarCuenta');
    Route::get('/validar-cuenta', [HomeController::class, 'getValidarCuenta'])->name('home.getValidarCuenta');
    Route::post('/validacion-cuenta', [HomeController::class, 'validacionCuenta'])->name('home.validacionCuenta');
    Route::get('/detalle/{id}', [HomeController::class, 'detalleAnuncio'])->name('home.detalle');
    Route::get('/categoria/{id}', [HomeController::class, 'findByCategoria'])->name('home.find_by_categoria');
    Route::get('/categorias', [HomeController::class, 'findAllCategorias'])->name('home.findAllCategorias');
    Route::get('/buscar', [HomeController::class, 'filtrado'])->name('home.filtrado');
    Route::get('/cuenta-baneada', [HomeController::class, 'cuentaBaneada'])->name('home.cuentaBaneada');
    Route::get('/preguntas-frecuentes', [HomeController::class, 'preguntasFrecuentes'])->name('home.faq');
    Route::get('/terminos-y-condiciones', [HomeController::class, 'terminosCondiciones'])->name('home.terminosCondiciones');
    Route::get('/recuperar/password', [HomeController::class, 'getPrevPasswordReset'])->name('home.getPrevPasswordReset');
    Route::post('/recuperar/password', [HomeController::class, 'postPasswordReset'])->name('home.postPasswordReset');
    Route::post('/prev-recuperar/password', [HomeController::class, 'postPrevPasswordReset'])->name('home.postPrevPasswordReset');

    //=== ESTA RUTA SE USA PARA PODER MOSTRAR EL MENSAJE DE NOTIFICACION CON SESSION EN LA VISTA DE INICIO==//
    Route::get('/redireccion', [ClienteController::class, 'redireccion'])->name('cliente.redireccion');
});


//VISTAS DE CLIENTES
Route::group(['middleware' => 'cliente'], function () {
    Route::get('/creditos', [ClienteController::class, 'creditos'])->name('cliente.creditos');
    Route::post('/creditos/gratis', [ClienteController::class, 'creditosGratis'])->name('cliente.creditosGratis');
    Route::post('/comentar/{anuncio}', [ClienteController::class, 'comentarAnuncio'])->name('cliente.comentarAnuncio');

    Route::get('/mi-cuenta', [ClienteController::class, 'miCuenta'])->name('cliente.miCuenta');
    Route::get('/publicar-anuncio', [ClienteController::class, 'crearAnuncio'])->name('cliente.crearAnuncio');
    Route::post('/publicar-anuncio', [ClienteController::class, 'guardarAnuncio'])->name('cliente.guardarAnuncio');
    Route::get('/mis-anuncios', [ClienteController::class, 'misAnuncios'])->name('cliente.misAnuncios');
    Route::get('/mis-ordenes', [ClienteController::class, 'misOrdenes'])->name('cliente.misOrdenes');
    Route::post('/editar-perfil', [ClienteController::class, 'editarMiPerfil'])->name('cliente.editarMiPerfil');
    Route::get('/editar-anuncio/{id}', [ClienteController::class, 'editarAnuncio'])->name('cliente.editarAnuncio');
    Route::post('/editar-anuncio', [ClienteController::class, 'postEditarAnuncio'])->name('cliente.postEditarAnuncio');
    Route::get('/retirar/{id}', [ClienteController::class, 'retirarImagen'])->middleware('cliente');
    Route::get('/creditos', [ClienteController::class, 'creditos'])->name('cliente.creditos');
    Route::post('/comprar-credito', [ClienteController::class, 'comprarCredito'])->name('cliente.comprarCredito');
    Route::get('/anuncio/{id}', [ClienteController::class, 'eliminarAnuncio'])->name('cliente.deleteAnuncio');
    Route::get('/validar-cuenta2', [ClienteController::class, 'validarCuenta'])->name('cliente.validarCuenta');
    Route::get('/payments/pay', [PaymentController::class, 'pay'])->name('pay');
    Route::get('/pasarela', [ClienteController::class, 'getPasarela'])->name('cliente.pasarela');
    Route::post('/reportar', [ClienteController::class, 'reportar'])->name('cliente.reportar');
    Route::get('/pdf/orden/{id}', [AdminController::class, 'pdfOrden'])->name('cliente.pdfOrden');
    Route::get('/estado-anuncio/{id}', [ClienteController::class, 'estadoAnuncio'])->name('cliente.estadoAnuncio');
    //NOTIFICACION DE VERIFICACION DE CUENTA
    Route::get('marcar_notificacion_leida/{notificacion_id}', [NotificacionController::class, 'marcar_notificacion_leida'])->name('marcar_notificacion_leida');
});



//RUTAS PARA MARCAR NOTIFICACIONES
Route::group(['middleware' => 'admin'], function () {
    Route::get('marcar_ordenes_leidas', [NotificacionController::class, 'marcar_ordenes_leidas'])->name('marcar_ordenes_leidas');
    Route::get('marcar_una_leida/{notificacion_id}/{orden_id}', [NotificacionController::class, 'marcar_una_leida'])->name('marcar_una_leida');
    //REPORTES
    Route::get('marcar_reportes_leidos', [NotificacionController::class, 'marcar_reportes_leidos'])->name('marcar_reportes_leidos');
    Route::get('marcar_un_reporte_leido/{notificacion_id}/{reporte_id}', [NotificacionController::class, 'marcar_un_reporte_leido'])->name('marcar_un_reporte_leido');
    //-------------------------------------
    Route::get('/notificaciones/todas', [NotificacionController::class, 'ver_todas'])->name('notificacion.todas');
    Route::get('/notificacion/eliminar/{id}', [NotificacionController::class, 'eliminar'])->name('notificacion.eliminar');
    // SOLICITUDES
    Route::get('marcar_solicitudes_leidas', [NotificacionController::class, 'marcar_solicitudes_leidas'])->name('marcar_solicitudes_leidas');
    Route::get('marcar_solicitud_leida/{notificacion_id}/{solicitud_id}', [NotificacionController::class, 'marcar_solicitud_leida'])->name('marcar_solicitud_leida');
});


// VISTAS DE ADMINISTRADOR
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'administracion'])->name('admin.dashboard');
    Route::resource('categoria', CategoriaController::class);
    Route::resource('publicidad', PublicidadController::class);
    Route::resource('credito', CreditoController::class)->names('credito');
    Route::resource('paquete', PaqueteController::class);
    // Route::resource('roles', RoleController::class)->only('index');
    Route::resource('orden', OrdenController::class);
    Route::resource('miembros', MiembroController::class)->names('miembro');
    Route::get('rol/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('rol/store', [RoleController::class, 'store'])->name('role.store');
    Route::resource('solicitud', SolicitudController::class);
    Route::get('/pdf/orden/{id}', [AdminController::class, 'pdfOrdenAdmin'])->name('admin.pdfOrden');
    Route::get('/datos-cliente/{id}', [OrdenController::class, 'show'])->name('orden.showOrden');
    Route::get('/admin/aprobar-cuenta/{id}', [SolicitudController::class, 'aprobarCuenta'])->name('solicitud.aprobarCuenta');
    Route::get('/reportes', [AdminController::class, 'reportes'])->name('admin.reportes');
    Route::get('/reportar/{id}', [AdminController::class, 'banearCuenta'])->name('reportar');
    Route::get('/usuario-reportado/{id}', [AdminController::class, 'verUsuarioReportado'])->name('admin.usuarioReportado');
});
