<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\IngressoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::middleware('role:visitante')->group(function () {
        Route::get('/visitor/dashboard', [DashboardController::class, 'visitor'])->name('visitor.dashboard');
        Route::get('/visitor/profile', [ProfileController::class, 'visitorProfile'])->name('visitor.profile');
        route::get('/visitor/edit/profile', [ProfileController::class, 'edit'])->name('visitante.profile.edit');
        Route::put('/visitor/edit/profile', [ProfileController::class, 'update'])->name('visitante.profile.update');
        Route::post('visitor/comprar/{evento}', [CompraController::class, 'store'])->name('compras.store');
        Route::delete('/compras/{compra}', [CompraController::class, 'cancelar'])->name('compras.cancelar');
    });
    Route::middleware('role:organizador')->group(function () {
        Route::get('/organizer/dashboard', [DashboardController::class, 'organizer'])->name('organizer.dashboard');
        Route::get('/organizer/profile', [ProfileController::class, 'organizerProfile'])->name('organizer.profile');
        Route::get('/organizer/evento/create', [EventoController::class, 'create'])->name('eventos.create');
        Route::post('/organizer/evento', [EventoController::class, 'store'])->name('eventos.store');
        Route::get('/organizer/evento/{evento}/editar', [EventoController::class, 'edit'])->name('eventos.edit');
        Route::put('/organizer/evento/{evento}', [EventoController::class, 'update'])->name('eventos.update');
        Route::put('/perfil/organizador', [ProfileController::class, 'update'])->name('organizer.profile.update');
    });
    Route::middleware('role:administrador')->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
        Route::get('/admin/eventos', [AdminController::class, 'index'])->name('admin.eventos.index');
        Route::get('/admin/eventos/{id}', [AdminController::class, 'show'])->name('admin.eventos.show');
        Route::get('/admin/eventos/{id}/editar', [AdminController::class, 'edit'])->name('admin.eventos.edit'); 
        Route::put('/admin/eventos/{id}', [AdminController::class, 'update'])->name('admin.eventos.update'); 
        Route::get('/admin/eventos/pendentes', [AdminController::class, 'eventosPendentes'])->name('admin.eventos.pendentes');
        Route::post('/admin/eventos/{evento}/aprovar', [AdminController::class, 'aprovar'])->name('admin.eventos.aprovar');
        Route::post('/admin/eventos/{evento}/rejeitar', [AdminController::class, 'rejeitar'])->name('admin.eventos.rejeitar');
        Route::get('/admin/usuarios/criar', [AdminController::class, 'createAdmin'])->name('admin.usuarios.create');
        Route::post('/admin/usuarios', [AdminController::class, 'storeAdmin'])->name('admin.usuarios.store');
        Route::get('/admin/usuarios', [AdminController::class, 'listarUsuarios'])->name('admin.usuarios.index');
        Route::get('/admin/usuarios/{user}/editar', [AdminController::class, 'editarUsuario'])->name('admin.usuarios.edit');
        Route::put('/admin/usuarios/{user}', [AdminController::class, 'atualizarUsuario'])->name('admin.usuarios.update');
        Route::delete('/admin/usuarios/{user}', [AdminController::class, 'destroy'])->name('admin.usuarios.destroy');
    });

    Route::middleware('auth')->delete('/evento/{evento}', [EventoController::class, 'destroy'])->name('eventos.destroy');

    Route::get('/ingressos/pdf/{evento}', [IngressoController::class, 'gerarPdf'])->name('ingresso.pdf');



});

require __DIR__.'/auth.php';
