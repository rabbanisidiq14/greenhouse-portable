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
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'showRegistrationForm']);
Route::post('register', [AuthController::class, 'register']);

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

    // List Sensors
    Route::get('/sensors', [SensorController::class, 'index'])->name('sensors');

    // List Actuators
    Route::get('/actuators', [ActuatorController::class, 'index'])->name('actuators');

    // List MQTT Topics
    Route::get('/topics', [MqttTopicController::class, 'index'])->name('topics');

    // List Control Parameters
    Route::get('/control-parameters', [ControlParameterController::class, 'index'])->name('control-parameters');
});

require __DIR__.'/auth.php';
