<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeadControllers;
use App\Http\Controllers\ProductControllers;
use App\Http\Controllers\ProjectControllers;
use App\Http\Controllers\CustomerControllers;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', function () {
        return view('login');
    })->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('app');
    })->name('app');
    Route::get('/leads', [LeadControllers::class, 'index']);
    Route::get('/products', [ProductControllers::class, 'index']);
    Route::get('/projects', [ProjectControllers::class, 'index']);
    Route::post('/projects/{project}/approve', [ProjectControllers::class, 'approve']);
    Route::get('/customers', [CustomerControllers::class, 'index']);

    Route::get('/leads/create', [LeadControllers::class, 'create']);
    Route::post('/leads', [LeadControllers::class, 'store']);

    Route::post('/leads/{lead}/convert', [ProjectControllers::class, 'storeFromLead'])->name('projects.storeFromLead');
    
    Route::post('/leads/{lead}/approve', [ProjectControllers::class, 'approve'])->name('leads.approve');
    Route::post('/leads/{lead}/reject', [ProjectControllers::class, 'reject'])->name('leads.reject');
});