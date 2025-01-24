<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\ItemController;
use App\Http\Controllers\Customer\TransactionController;
use App\Http\Controllers\Employee\ItemController as EmployeeItemController;
use App\Http\Controllers\Employee\ReportController as EmployeeReportController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route untuk home
Route::get('/', function () {
    return view('home');
})->name('home');

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Customer routes
Route::middleware(['auth', 'role:customer'])->name('customer.')->prefix('customer')->group(function () {
    Route::resource('page', ItemController::class)->names([
        'index' => 'page.index',
        'create' => 'page.create',
        'store' => 'page.store',
        'show' => 'page.show',
        'destroy' => 'page.destroy'
    ]);
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
});

// Employee routes
Route::middleware(['auth', 'role:employee'])->name('employee.')->prefix('employee')->group(function () {
    Route::resource('items', EmployeeItemController::class)->only(['index', 'show', 'update']);
    Route::get('reports', [EmployeeReportController::class, 'index'])->name('reports');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::get('reports', [AdminReportController::class, 'index'])->name('reports');
});
