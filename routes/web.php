<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\RhsController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\HumainRessourceController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\groupe_userController;
use App\Http\Controllers\roleController;


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

//Main routes
Route::get('/master', function () {
    return view('layouts.master');
});
Route::get('/', function () {
    return view('auth.login');
});

//routes personnels
Route::get('/personnels', 'App\Http\Controllers\PersonnelController@index')->name('personnels.index');
Route::get('/personnels/{id}', 'App\Http\Controllers\PersonnelController@show')->name('personnels.show');

//routes operations
Route::get('/operations', 'App\Http\Controllers\OperationController@index')->name('operations.index');
Route::get('/scan1', [OperationController::class, 'scan'])->name('scan1.page');
Route::post('/upload2', [OperationController::class, 'upload']);

//routes rhs
Route::get('/rhs', [HumainRessourceController::class, 'index'])->name('rhs.index');
Route::get('/scan', [HumainRessourceController::class, 'scan'])->name('scan.page');
Route::post('/upload', [HumainRessourceController::class, 'upload']);

//routes commercials
Route::get('/commercials', 'App\Http\Controllers\CommercialController@index')->name('commercials.index');

//routes finances
Route::get('/finances', 'App\Http\Controllers\FinanceController@index')->name('finances.index');


//Routes auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route groupe users

Route::get('/groups/{group}', 'App\Http\Controllers\groupe_userController@show')->name('groups.show');
Route::PUT('groups/${groupe}', 'App\Http\Controllers\groupe_userController@update')->name('groups.update');
Route::resource('/groupe', groupe_userController::class);
Route::resource('/rolee', roleController::class);
Route::post('/add', 'App\Http\Controllers\roleController@add');

//Route users

Route::put('/tasks/{id}', [TacheController::class, 'updatecheck'])->name('tasks.update');

Route::prefix('/admin')->middleware('auth', 'IsAdmin')->group(function () {

    Route::resource('/user', UserrController::class);
});
Route::prefix('adminDr')->middleware('auth', 'IsAdminDr')->group(function () {

    Route::get('/userCreatee', [UserrController::class, 'create']);
});

// Routes for the Direction model
Route::get('/directions/create', [DirectionController::class, 'create'])->name('directions.create');
Route::get('/directions', [DirectionController::class, 'index'])->name('directions.index');
Route::post('/directions', [DirectionController::class, 'store'])->name('directions.store');
Route::get('/directions/{ID_DR5}/edit', [DirectionController::class, 'edit'])->name('directions.edit');
Route::post('/directions/{ID_DR5}/update', [DirectionController::class, 'update'])->name('directions.update');
Route::get('/directions/{ID_DR5}', [DirectionController::class, 'show'])->name('directions.show');
Route::delete('/directions/{ID_DR5}', [DirectionController::class, 'destroy'])->name('directions.destroy');
Route::get('/directions/restore-all', [DirectionController::class, 'restoreAll'])->name('directions.restoreAll');
