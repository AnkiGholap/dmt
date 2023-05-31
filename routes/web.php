<?php

use App\Http\Controllers\AcademicYearController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MasterskuController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SkuController;
use App\Http\Controllers\SalesdataController;

Route::redirect('/','login' );
Auth::routes();

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('posts', PostController::class);
    Route::post('settings/update_records', [SettingController::class, 'update_records'])->name('update_records');
    Route::resource('settings', SettingController::class);
    Route::resource('cities', CityController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('mastersku', MasterskuController::class);
    Route::resource('tags', TagController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('skus', SkuController::class);
    Route::post('removeMasterSku', [MasterskuController::class, 'removeMasterSku'])->name('removeMasterSku');
    Route::get('/salesdataImport',[SalesdataController::class,'sales_data_import'])->name('salesDataImport');
    Route::post('/salesDataSave',[SalesdataController::class,'sales_data_save'])->name('salesDataSave');
    Route::get('/skuForeCastT1Import',[SalesdataController::class,'sku_forecast_t1_import'])->name('skuForeCastT1Import');
    Route::post('/skuForeCastT1Save',[SalesdataController::class,'sku_forecast_t1_save'])->name('skuForeCastT1Save');
});
