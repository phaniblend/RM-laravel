<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Owner\DashboardController as OwnerDashboardController;
use App\Http\Controllers\Manager\DashboardController as ManagerDashboardController;
use App\Http\Controllers\Chef\DashboardController as ChefDashboardController;
use App\Http\Controllers\Waiter\DashboardController as WaiterDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Redirect to role-based dashboard
Route::get('/dashboard', function () {
    if (auth()->check()) {
        $role = auth()->user()->role;
        return redirect()->route($role . '.dashboard');
    }
    return redirect()->route('login');
})->middleware(['auth'])->name('dashboard');

// Owner routes
Route::middleware(['auth', 'role:owner'])->prefix('owner')->name('owner.')->group(function () {
    Route::get('/dashboard', [OwnerDashboardController::class, 'index'])->name('dashboard');
});

// Manager routes
Route::middleware(['auth', 'role:manager,owner'])->prefix('manager')->name('manager.')->group(function () {
    Route::get('/dashboard', [ManagerDashboardController::class, 'index'])->name('dashboard');
});

// Chef routes
Route::middleware(['auth', 'role:chef,manager,owner'])->prefix('chef')->name('chef.')->group(function () {
    Route::get('/dashboard', [ChefDashboardController::class, 'index'])->name('dashboard');
});

// Waiter routes
Route::middleware(['auth', 'role:waiter,chef,manager,owner'])->prefix('waiter')->name('waiter.')->group(function () {
    Route::get('/dashboard', [WaiterDashboardController::class, 'index'])->name('dashboard');
});

// Profile routes (available to all authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';