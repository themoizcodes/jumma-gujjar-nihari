<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\TableController as AdminTableController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public / Customer-facing routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');
Route::post('/reservation/check-availability', [ReservationController::class, 'checkAvailability'])->name('reservation.check');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/reservation/confirmation/{bookingRef}', [ReservationController::class, 'confirmation'])->name('reservation.confirmation');

/*
|--------------------------------------------------------------------------
| Guest-only auth routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->middleware('throttle:5,1');
});

Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

/*
|--------------------------------------------------------------------------
| Authenticated customer routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::post('/test-email', [AdminDashboardController::class, 'sendTestEmail'])->name('test-email');

    // Reservation Management
    Route::get('/reservations', [AdminReservationController::class, 'index'])->name('reservations.index');
    Route::patch('/reservations/{reservation}/status', [AdminReservationController::class, 'updateStatus'])->name('reservations.status');

    // Menu Management
    Route::get('/menu', [AdminMenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/create', [AdminMenuController::class, 'create'])->name('menu.create');
    Route::post('/menu', [AdminMenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{menuItem}/edit', [AdminMenuController::class, 'edit'])->name('menu.edit');
    Route::patch('/menu/{menuItem}', [AdminMenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{menuItem}', [AdminMenuController::class, 'destroy'])->name('menu.destroy');

    // Category Management
    Route::post('/categories', [AdminMenuController::class, 'storeCategory'])->name('categories.store');
    Route::delete('/categories/{category}', [AdminMenuController::class, 'destroyCategory'])->name('categories.destroy');

    // Table Management
    Route::get('/tables', [AdminTableController::class, 'index'])->name('tables.index');
    Route::post('/tables', [AdminTableController::class, 'store'])->name('tables.store');
    Route::patch('/tables/{table}', [AdminTableController::class, 'update'])->name('tables.update');
    Route::patch('/tables/{table}/toggle-status', [AdminTableController::class, 'toggleStatus'])->name('tables.toggle-status');
    Route::delete('/tables/{table}', [AdminTableController::class, 'destroy'])->name('tables.destroy');

    // Customer Management
    Route::get('/customers', [AdminCustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/{customer}', [AdminCustomerController::class, 'show'])->name('customers.show');
});
