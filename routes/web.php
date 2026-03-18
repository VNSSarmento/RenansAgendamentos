<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard (RF05/Histórico)
    Route::get('/dashboard', [AppointmentController::class, 'index'])->name('dashboard');
    
    // Seleção de horários (RF02)
    Route::get('/agendar', [AppointmentController::class, 'create'])->name('appointments.create');
    
    // Salvar agendamento
    Route::post('/agendar', [AppointmentController::class, 'store'])->name('appointments.store');
    
    // Lista de agendamentos do usuário
    Route::get('/meus-agendamentos', [AppointmentController::class, 'myAppointments'])->name('appointments.list');
    
    // ROTA DE CANCELAMENTO (Corrigida: Apenas uma rota para evitar conflito)
    Route::delete('/agendamento/{id}/cancelar', [AppointmentController::class, 'cancel'])->name('appointments.cancel');

    // Rota do PDF
    Route::get('/agendamento/{id}/comprovante', [AppointmentController::class, 'downloadPdf'])->name('appointments.pdf');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';