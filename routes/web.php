<?php

use App\Http\Controllers\Add_csr;
use App\Http\Controllers\Analisis_sroi;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Data_csr;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OptionsController;
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
Route::post('/registerAction', [AuthController::class, 'registerAction'])->name('registerAction');

Route::get('/login/google',  [AuthController::class, 'redirectToGoogle'])->name('login.redirectToGoogle');
Route::get('/login/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('login.handleGoogleCallback');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/add_csr', [Add_csr::class, 'index'])->name('add_csr');
    Route::post('/csr/store', [Add_csr::class, 'store'])->name('csr.store');
    Route::get('/data-csr', [Data_csr::class, 'index'])->name('data-csr');
    Route::get('/detail-data-csr/{id}', [Data_csr::class, 'detail'])->name('detail-data-csr');
    Route::post('/update-data-csr/{id}', [Data_csr::class, 'update_program'])->name('update-data-csr');

    Route::delete('/delete-stakeholder/{id}', [Data_csr::class, 'delete_stakeholder']);
    Route::post('/add-stakeholder/{id}', [Data_csr::class, 'add_stakeholder'])->name('add-stakeholder');
    Route::post('/edit-stakeholder/{id}', [Data_csr::class, 'edit_stakeholder'])->name('edit-stakeholder');
    
    Route::get('/analisis-sroi', [Analisis_sroi::class, 'index'])->name('analisis-sroi');
    Route::get('/analisis-sroi/{id}', [Analisis_sroi::class, 'detail_analisis'])->name('detail-analisis');
    Route::post('/add-overclaim/{id}', [Analisis_sroi::class, 'add_overclaim'])->name('add-overclaim');
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
    Route::get('/menus/dataMenuManagement', [MenuController::class, 'getDataMenuManagement'])->name('menus.getDataMenuManagement');
    Route::post('/menus/storeMenuManagement', [MenuController::class, 'storeMenuManagement'])->name('menus.storeMenuManagement');
    Route::put('/menus/updateMenuManagement/{id}', [MenuController::class, 'updateMenuManagement'])->name('menus.updateMenuManagement');
    Route::delete('menus/menuManagementDeleted/{id}', [MenuController::class, 'menuManagementDeleted'])->name('menus.menuManagementDeleted');
    //Role
    Route::get('/role', [RoleController::class, 'index'])->name('role');
    Route::get('/roles/getData', [RoleController::class, 'getAllRoles'])->name('roles.getAllRoles');
    Route::post('/roles/storeRole', [RoleController::class, 'storeRole'])->name('roles.storeRole');
    Route::put('/roles/updateRole/{id}', [RoleController::class, 'updateRole'])->name('roles.updateRole');
    Route::delete('roles/roleDeleted/{id}', [RoleController::class, 'roleDeleted'])->name('roles.roleDeleted');

    //Options
    Route::get('/options', [OptionsController::class, 'index'])->name('options');
    Route::get('/options/getData', [OptionsController::class, 'getAllOptions'])->name('options.getAllOptions');
    Route::post('/options/storeHeader', [OptionsController::class, 'storeHeader'])->name('options.storeHeader');
    Route::post('/options/storeOptions', [OptionsController::class, 'storeOptions'])->name('options.storeOptions');
    Route::put('/options/updateHdr/{id}', [OptionsController::class, 'updateHdr'])->name('options.updateHdr');
    Route::put('/options/updateOpt/{id}', [OptionsController::class, 'updateOpt'])->name('options.updateOpt');
    Route::delete('options/optionsDeletedHeader/{id}', [OptionsController::class, 'optionsDeletedHeader'])->name('options.optionsDeletedHeader');
    Route::delete('/option/delete/{id}', [OptionsController::class, 'optionsDeletedOption'])->name('options.optionsDeletedOption');






    //Menu
    Route::get('/menu', [MenuController::class, 'menu'])->name('menu.menu');
    Route::get('/menus/data', [MenuController::class, 'getMenuData'])->name('menus.data');
    Route::post('/menus/store', [MenuController::class, 'store'])->name('menus.store');
    Route::put('/menus/update/{id}', [MenuController::class, 'update'])->name('menus.update');
    Route::delete('menus/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');
    // Route untuk mendapatkan semua role
});
