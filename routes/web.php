<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
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
    return view('backend.auth.login');
});
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_action'])->name('login.action');
Route::get('/register', [AuthController::class, 'register'])->name('register');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/menu', [MenuController::class, 'menu'])->name('menu.menu');
    Route::get('/menuManagement', [MenuController::class, 'menuManagement'])->name('menu.menuManagement');
    // routes/web.php
    Route::get('/menus/dataMenuManagement', [MenuController::class, 'getDataMenuManagement'])->name('menus.getDataMenuManagement');
    Route::get('/menus/data', [MenuController::class, 'getMenuData'])->name('menus.data');
    Route::post('/menus/store', [MenuController::class, 'store'])->name('menus.store');
    Route::put('/menus/update/{id}', [MenuController::class, 'update'])->name('menus.update');
    Route::delete('menus/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');

});
