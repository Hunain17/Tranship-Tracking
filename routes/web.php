<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::user()){
        return redirect('dashboard');
    }
    return redirect('login');
    
})->name('home');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::post('/store-fields', [App\Http\Controllers\RecordsSettingsController::class, 'store'])->name('store.fields');
Route::get('/record', [App\Http\Controllers\CreateRecordController::class, 'index'])->name('record.index');
Route::get('/record/create', [App\Http\Controllers\CreateRecordController::class, 'create'])->name('record.create');
Route::post('/record/store', [App\Http\Controllers\CreateRecordController::class, 'store'])->name('record.store');
Route::get('/record/edit/{id}', [App\Http\Controllers\CreateRecordController::class, 'edit'])->name('record.edit');
Route::put('/record/update/{id}', [App\Http\Controllers\CreateRecordController::class, 'update'])->name('record.update');
Route::delete('/record/delete/{id}', [App\Http\Controllers\CreateRecordController::class, 'destroy'])->name('record.delete');
Route::get('/record/inactive/{id}', [App\Http\Controllers\CreateRecordController::class, 'inactive'])->name('record.inactive');
Route::get('/record/activate/{id}', [App\Http\Controllers\CreateRecordController::class, 'activate'])->name('record.activate');


Route::get('/admin-settings', [App\Http\Controllers\UserController::class, 'index'])->name('admin-settings');
Route::get('/admin-settings/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin-settings.create');
Route::post('/admin-settings/store', [App\Http\Controllers\UserController::class, 'store'])->name('admin-settings.store');
Route::get('/admin-settings/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('admin-settings.edit');
Route::put('/admin-settings/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('admin-settings.update');
Route::delete('/admin-settings/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin-settings.delete');
