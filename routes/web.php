<?php

use App\Http\Controllers\Add_csr;
use App\Http\Controllers\Analisis_sroi;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Data_csr;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
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
    Route::get('/add_csr', [Add_csr::class, 'index'])->name('add_csr');
    Route::post('/csr/store', [Add_csr::class, 'store'])->name('csr.store');
    Route::get('/data-csr', [Data_csr::class, 'index'])->name('data-csr');
    Route::get('/detail-data-csr/{id}', [Data_csr::class, 'detail'])->name('detail-data-csr');

    Route::get('/analisis-sroi', [Analisis_sroi::class, 'index'])->name('analisis-sroi');
    Route::get('/analisis-sroi/{id}', [Analisis_sroi::class, 'detail_analisis'])->name('detail-analisis');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/proxy/provinces', function () {
        $response = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
        return response($response->body(), $response->status());
    });    
    Route::get('/proxy/regencies/{provinceId}', function ($provinceId) {
        $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$provinceId}.json");
        return response($response->body(), $response->status());
    });
    Route::get('/proxy/districts/{regencyId}', function ($regencyId) {
        $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/districts/{$regencyId}.json");
        return response($response->body(), $response->status());
    });
    Route::get('/menu', [MenuController::class, 'menu'])->name('menu.menu');


    // routes/web.php
    //Menu Management
    Route::get('/menuManagement', [MenuController::class, 'menuManagement'])->name('menu.menuManagement');
    // routes/web.php
    //Menu Management
    Route::get('/menuManagement', [MenuController::class, 'menuManagement'])->name('menu.menuManagement');
    Route::get('/menus/dataMenuManagement', [MenuController::class, 'getDataMenuManagement'])->name('menus.getDataMenuManagement');
    Route::post('/menus/storeMenuManagement', [MenuController::class, 'storeMenuManagement'])->name('menus.storeMenuManagement');
    Route::put('/menus/updateMenuManagement/{id}', [MenuController::class, 'updateMenuManagement'])->name('menus.updateMenuManagement');
    Route::delete('menus/menuManagementDeleted/{id}', [MenuController::class, 'menuManagementDeleted'])->name('menus.menuManagementDeleted');
    //Role
    Route::get('/role', [RoleController::class, 'index'])->name('role');
    Route::get('/roles/getData', [RoleController::class, 'getAllRoles'])->name('roles.getAllRoles');

    //Menu
    Route::get('/menu', [MenuController::class, 'menu'])->name('menu.menu');
    Route::get('/menus/data', [MenuController::class, 'getMenuData'])->name('menus.data');
    Route::post('/menus/store', [MenuController::class, 'store'])->name('menus.store');
    Route::put('/menus/update/{id}', [MenuController::class, 'update'])->name('menus.update');
    Route::delete('menus/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');
    // Route untuk mendapatkan semua role
});
