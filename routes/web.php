<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManualControlController;
use App\Http\Controllers\MqttTopicController;
use App\Http\Controllers\ControlParameterController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;


// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Manual Control
    Route::get('/manual-control', [ManualControlController::class, 'index'])->name('manual-control');

    // Automatic Control
    Route::get('/control-parameters', [ControlParameterController::class, 'index'])->name('control-parameters');
    Route::put('/control-parameters/{id}', [ControlParameterController::class, 'update'])->name('control-parameters.update');
    Route::delete('/control-parameters/{id}', [ControlParameterController::class, 'destroy'])->name('control-parameters.destroy');
    Route::get('/control-parameters/create', [ControlParameterController::class,'create'])->name('control-parameters.create');
    Route::post('/control-parameters', [ControlParameterController::class,'store'])->name('control-parameters.store');

    // List MQTT Client
    Route::get('/clients', [ClientController::class, 'index'])->name('clients');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

    // List MQTT Topics
    Route::get('/topics', [MqttTopicController::class, 'index'])->name('topics');
    Route::get('/topics/create', [MqttTopicController::class, 'create'])->name('topics.create');
    Route::post('/topics', [MqttTopicController::class, 'store'])->name('topics.store');
    Route::get('/topics/{id}/edit', [MqttTopicController::class, 'edit'])->name('topics.edit');
    Route::put('/topics/{id}', [MqttTopicController::class, 'update'])->name('topics.update');
    Route::delete('/topics/{id}', [MqttTopicController::class, 'destroy'])->name('topics.destroy');
});
require __DIR__.'/auth.php';
