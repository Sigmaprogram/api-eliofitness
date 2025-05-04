<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\MedidaCorporalController;
use App\Http\Controllers\FotoProgresoController;
use App\Http\Controllers\AlimentoController;
use App\Http\Controllers\PlanAlimenticioController;
use App\Http\Controllers\ComidaController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\RegistroEntrenamientoController;
use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\DetalleComidaController;
use App\Http\Controllers\DetallePedidoController;
use App\Http\Controllers\DiaRutinaController;
use App\Http\Controllers\EjercicioRutinaController;
use App\Http\Controllers\SetCompletadoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HorarioEntrenadorController;
use App\Http\Controllers\SesionEntrenamientoController;
use App\Http\Controllers\RetoController;
use App\Http\Controllers\ParticipacionRetoController;

// Rutas de usuarios
Route::prefix('usuarios')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

// Rutas de perfiles
Route::prefix('perfiles')->group(function () {
    Route::get('/', [PerfilController::class, 'index']);
    Route::post('/', [PerfilController::class, 'store']);
    Route::get('/{id}', [PerfilController::class, 'show']);
    Route::put('/{id}', [PerfilController::class, 'update']);
    Route::delete('/{id}', [PerfilController::class, 'destroy']);
});

// Rutas de medidas corporales
Route::prefix('medidas')->group(function () {
    Route::get('/', [MedidaCorporalController::class, 'index']);
    Route::post('/', [MedidaCorporalController::class, 'store']);
    Route::get('/{id}', [MedidaCorporalController::class, 'show']);
    Route::put('/{id}', [MedidaCorporalController::class, 'update']);
    Route::delete('/{id}', [MedidaCorporalController::class, 'destroy']);
    Route::get('/usuario/{usuario_id}', [MedidaCorporalController::class, 'getByUsuario']);
});

// Rutas de fotos de progreso
Route::prefix('fotos-progreso')->group(function () {
    Route::get('/', [FotoProgresoController::class, 'index']);
    Route::post('/', [FotoProgresoController::class, 'store']);
    Route::get('/{id}', [FotoProgresoController::class, 'show']);
    Route::delete('/{id}', [FotoProgresoController::class, 'destroy']);
    Route::get('/usuario/{usuario_id}', [FotoProgresoController::class, 'getByUsuario']);
});

// Rutas de alimentos
Route::prefix('alimentos')->group(function () {
    Route::get('/', [AlimentoController::class, 'index']);
    Route::post('/', [AlimentoController::class, 'store']);
    Route::get('/{id}', [AlimentoController::class, 'show']);
    Route::put('/{id}', [AlimentoController::class, 'update']);
    Route::delete('/{id}', [AlimentoController::class, 'destroy']);
});

// Rutas de planes alimenticios
Route::prefix('planes-alimenticios')->group(function () {
    Route::get('/', [PlanAlimenticioController::class, 'index']);
    Route::post('/', [PlanAlimenticioController::class, 'store']);
    Route::get('/{id}', [PlanAlimenticioController::class, 'show']);
    Route::put('/{id}', [PlanAlimenticioController::class, 'update']);
    Route::delete('/{id}', [PlanAlimenticioController::class, 'destroy']);
    Route::get('/usuario/{usuario_id}', [PlanAlimenticioController::class, 'getByUsuario']);
});

// Rutas de comidas
Route::prefix('comidas')->group(function () {
    Route::get('/', [ComidaController::class, 'index']);
    Route::post('/', [ComidaController::class, 'store']);
    Route::get('/{id}', [ComidaController::class, 'show']);
    Route::put('/{id}', [ComidaController::class, 'update']);
    Route::delete('/{id}', [ComidaController::class, 'destroy']);
});

// Rutas de ejercicios
Route::prefix('ejercicios')->group(function () {
    Route::get('/', [EjercicioController::class, 'index']);
    Route::post('/', [EjercicioController::class, 'store']);
    Route::get('/{id}', [EjercicioController::class, 'show']);
    Route::put('/{id}', [EjercicioController::class, 'update']);
    Route::delete('/{id}', [EjercicioController::class, 'destroy']);
    Route::get('/categoria/{categoria}', [EjercicioController::class, 'getByCategoria']);
});

// Rutas de rutinas
Route::prefix('rutinas')->group(function () {
    Route::get('/', [RutinaController::class, 'index']);
    Route::post('/', [RutinaController::class, 'store']);
    Route::get('/{id}', [RutinaController::class, 'show']);
    Route::put('/{id}', [RutinaController::class, 'update']);
    Route::delete('/{id}', [RutinaController::class, 'destroy']);
    Route::get('/usuario/{usuario_id}', [RutinaController::class, 'getByUsuario']);
});

// Rutas de registros de entrenamiento
Route::prefix('registros-entrenamiento')->group(function () {
    Route::get('/', [RegistroEntrenamientoController::class, 'index']);
    Route::post('/', [RegistroEntrenamientoController::class, 'store']);
    Route::get('/{id}', [RegistroEntrenamientoController::class, 'show']);
    Route::put('/{id}', [RegistroEntrenamientoController::class, 'update']);
    Route::delete('/{id}', [RegistroEntrenamientoController::class, 'destroy']);
    Route::get('/usuario/{usuario_id}', [RegistroEntrenamientoController::class, 'getByUsuario']);
});

// Rutas de membresías
Route::prefix('membresias')->group(function () {
    Route::get('/', [MembresiaController::class, 'index']);
    Route::post('/', [MembresiaController::class, 'store']);
    Route::get('/{id}', [MembresiaController::class, 'show']);
    Route::put('/{id}', [MembresiaController::class, 'update']);
    Route::delete('/{id}', [MembresiaController::class, 'destroy']);
});

// Rutas de suscripciones
Route::prefix('suscripciones')->group(function () {
    Route::get('/', [SuscripcionController::class, 'index']);
    Route::post('/', [SuscripcionController::class, 'store']);
    Route::get('/{id}', [SuscripcionController::class, 'show']);
    Route::put('/{id}', [SuscripcionController::class, 'update']);
    Route::delete('/{id}', [SuscripcionController::class, 'destroy']);
    Route::get('/usuario/{usuario_id}', [SuscripcionController::class, 'getByUsuario']);
});

// Rutas de detalles de comidas
Route::prefix('detalles-comidas')->group(function () {
    Route::get('/', [DetalleComidaController::class, 'index']);
    Route::post('/', [DetalleComidaController::class, 'store']);
    Route::get('/{id}', [DetalleComidaController::class, 'show']);
    Route::put('/{id}', [DetalleComidaController::class, 'update']);
    Route::delete('/{id}', [DetalleComidaController::class, 'destroy']);
    Route::get('/comida/{comida_id}', [DetalleComidaController::class, 'getByComida']);
});

// Rutas de detalles de pedidos
Route::prefix('detalles-pedidos')->group(function () {
    Route::get('/', [DetallePedidoController::class, 'index']);
    Route::post('/', [DetallePedidoController::class, 'store']);
    Route::get('/{id}', [DetallePedidoController::class, 'show']);
    Route::put('/{id}', [DetallePedidoController::class, 'update']);
    Route::delete('/{id}', [DetallePedidoController::class, 'destroy']);
    Route::get('/pedido/{pedido_id}', [DetallePedidoController::class, 'getByPedido']);
});

// Rutas de días de rutina
Route::prefix('dias-rutina')->group(function () {
    Route::get('/', [DiaRutinaController::class, 'index']);
    Route::post('/', [DiaRutinaController::class, 'store']);
    Route::get('/{id}', [DiaRutinaController::class, 'show']);
    Route::put('/{id}', [DiaRutinaController::class, 'update']);
    Route::delete('/{id}', [DiaRutinaController::class, 'destroy']);
    Route::get('/rutina/{rutina_id}', [DiaRutinaController::class, 'getByRutina']);
});

// Rutas de ejercicios de rutina
Route::prefix('ejercicios-rutina')->group(function () {
    Route::get('/', [EjercicioRutinaController::class, 'index']);
    Route::post('/', [EjercicioRutinaController::class, 'store']);
    Route::get('/{id}', [EjercicioRutinaController::class, 'show']);
    Route::put('/{id}', [EjercicioRutinaController::class, 'update']);
    Route::delete('/{id}', [EjercicioRutinaController::class, 'destroy']);
    Route::get('/dia-rutina/{dia_rutina_id}', [EjercicioRutinaController::class, 'getByDiaRutina']);
});

// Rutas de sets completados
Route::prefix('sets-completados')->group(function () {
    Route::get('/', [SetCompletadoController::class, 'index']);
    Route::post('/', [SetCompletadoController::class, 'store']);
    Route::get('/{id}', [SetCompletadoController::class, 'show']);
    Route::put('/{id}', [SetCompletadoController::class, 'update']);
    Route::delete('/{id}', [SetCompletadoController::class, 'destroy']);
    Route::get('/registro/{registro_id}', [SetCompletadoController::class, 'getByRegistroEntrenamiento']);
});
// Rutas de pagos
Route::prefix('pagos')->group(function () {
    Route::get('/', [PagoController::class, 'index']);
    Route::post('/', [PagoController::class, 'store']);
    Route::get('/{id}', [PagoController::class, 'show']);
    Route::put('/{id}', [PagoController::class, 'update']);
    Route::get('/suscripcion/{suscripcion_id}', [PagoController::class, 'getBySuscripcion']);
});

// Rutas de productos
Route::prefix('productos')->group(function () {
    Route::get('/', [ProductoController::class, 'index']);
    Route::post('/', [ProductoController::class, 'store']);
    Route::get('/{id}', [ProductoController::class, 'show']);
    Route::put('/{id}', [ProductoController::class, 'update']);
    Route::delete('/{id}', [ProductoController::class, 'destroy']);
    Route::get('/categoria/{categoria}', [ProductoController::class, 'getByCategoria']);
});

// Rutas de pedidos
Route::prefix('pedidos')->group(function () {
    Route::get('/', [PedidoController::class, 'index']);
    Route::post('/', [PedidoController::class, 'store']);
    Route::get('/{id}', [PedidoController::class, 'show']);
    Route::put('/{id}', [PedidoController::class, 'update']);
    Route::delete('/{id}', [PedidoController::class, 'destroy']);
    Route::get('/usuario/{usuario_id}', [PedidoController::class, 'getByUsuario']);
});

// Rutas de empleados
Route::prefix('empleados')->group(function () {
    Route::get('/', [EmpleadoController::class, 'index']);
    Route::post('/', [EmpleadoController::class, 'store']);
    Route::get('/{id}', [EmpleadoController::class, 'show']);
    Route::put('/{id}', [EmpleadoController::class, 'update']);
    Route::delete('/{id}', [EmpleadoController::class, 'destroy']);
    Route::get('/puesto/{puesto}', [EmpleadoController::class, 'getByPuesto']);
});

// Rutas de horarios de entrenadores
Route::prefix('horarios-entrenadores')->group(function () {
    Route::get('/', [HorarioEntrenadorController::class, 'index']);
    Route::post('/', [HorarioEntrenadorController::class, 'store']);
    Route::get('/{id}', [HorarioEntrenadorController::class, 'show']);
    Route::put('/{id}', [HorarioEntrenadorController::class, 'update']);
    Route::delete('/{id}', [HorarioEntrenadorController::class, 'destroy']);
    Route::get('/entrenador/{empleado_id}', [HorarioEntrenadorController::class, 'getByEntrenador']);
});

// Rutas de sesiones de entrenamiento
Route::prefix('sesiones')->group(function () {
    Route::get('/', [SesionEntrenamientoController::class, 'index']);
    Route::post('/', [SesionEntrenamientoController::class, 'store']);
    Route::get('/{id}', [SesionEntrenamientoController::class, 'show']);
    Route::put('/{id}', [SesionEntrenamientoController::class, 'update']);
    Route::delete('/{id}', [SesionEntrenamientoController::class, 'destroy']);
    Route::get('/usuario/{usuario_id}', [SesionEntrenamientoController::class, 'getByUsuario']);
    Route::get('/entrenador/{entrenador_id}', [SesionEntrenamientoController::class, 'getByEntrenador']);
});

// Rutas de retos
Route::prefix('retos')->group(function () {
    Route::get('/', [RetoController::class, 'index']);
    Route::post('/', [RetoController::class, 'store']);
    Route::get('/{id}', [RetoController::class, 'show']);
    Route::put('/{id}', [RetoController::class, 'update']);
    Route::delete('/{id}', [RetoController::class, 'destroy']);
    Route::get('/activos', [RetoController::class, 'getActivos']);
});

// Rutas de participaciones en retos
Route::prefix('participaciones-reto')->group(function () {
    Route::get('/', [ParticipacionRetoController::class, 'index']);
    Route::post('/', [ParticipacionRetoController::class, 'store']);
    Route::get('/{id}', [ParticipacionRetoController::class, 'show']);
    Route::put('/{id}', [ParticipacionRetoController::class, 'update']);
    Route::delete('/{id}', [ParticipacionRetoController::class, 'destroy']);
    Route::get('/usuario/{usuario_id}', [ParticipacionRetoController::class, 'getByUsuario']);
    Route::get('/reto/{reto_id}', [ParticipacionRetoController::class, 'getByReto']);
});
