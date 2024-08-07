<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManualControlController;
use App\Http\Controllers\AutomaticControlController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\ActuatorController;
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
    Route::get('/automatic-control', [AutomaticControlController::class, 'index'])->name('automatic-control');

    // List MQTT Client
    Route::get('/clients', [ClientController::class, 'index'])->name('clients');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

    // List Sensors
    Route::get('/sensors', [SensorController::class, 'index'])->name('sensors');

    // List Actuators
    Route::get('/actuators', [ActuatorController::class, 'index'])->name('actuators');

    // List MQTT Topics
    Route::get('/topics', [MqttTopicController::class, 'index'])->name('topics');

    // List Control Parameters
    Route::get('/control-parameters', [ControlParameterController::class, 'index'])->name('control-parameters');
    
    // Settings
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');
});

require __DIR__.'/auth.php';
