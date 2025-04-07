<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin Routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('categories', CategoryController::class);
        Route::resource('suppliers', SupplierController::class);
        Route::resource('stockReport', ReportController::class);
    });

    // Staff Routes
    Route::middleware(['role:staff'])->group(function () {
        Route::get('/staff/dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');
    });

    // Shared Routes (Both Admin and Staff)
    Route::resource('products', ProductController::class);
    Route::resource('stock-in', StockInController::class);
    Route::resource('stock-out', StockOutController::class);
    Route::resource('stockReport', ReportController::class);

    // Report Routes (Accessible by both Admin and Staff)
    Route::get('/reports/stock', [ReportController::class, 'stockReport'])->name('reports.stock');
    Route::get('/reports/stock-in', [ReportController::class, 'stockInReport'])->name('reports.stockIn');
    Route::get('/reports/stock-out', [ReportController::class, 'stockOutReport'])->name('reports.stockOut');
    Route::get('/reports/profit', [ReportController::class, 'profitReport'])->name('reports.profit');
    Route::get('/reports/period', [ReportController::class, 'periodReport'])->name('reports.period');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
