<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ParcelaController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');

// Rotas de autenticação via API
Route::post('/api/register', [AuthController::class, 'register']);
Route::post('/api/login', [AuthController::class, 'login']);
Route::post('/api/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/api/reset-password', [AuthController::class, 'resetPassword']);

// Rotas de autenticação do Laravel
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');
Route::get('/verify-email', [AuthController::class, 'showVerificationNotice'])->name('verification.notice');
Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
Route::post('/email/verification-notification', [AuthController::class, 'resendVerificationEmail'])->name('verification.send');
Route::get('/confirm-password', [AuthController::class, 'showConfirmPasswordForm'])->name('password.confirm');
Route::post('/confirm-password', [AuthController::class, 'confirmPassword']);

// Rotas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/api/logout', [AuthController::class, 'logout']);
    Route::get('/api/user', function (Request $request) {
        return $request->user();
    });
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('clientes', ClienteController::class);
    Route::resource('contratos', ContratoController::class);
    Route::post('/parcelas/{parcela}/pagar', [ParcelaController::class, 'pagar'])->name('parcelas.pagar');
    Route::post('/contratos/{contrato}/pagar-todas', [ParcelaController::class, 'pagarTodas'])->name('contratos.pagar-todas');
});
