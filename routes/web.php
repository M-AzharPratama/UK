<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LatesController;
use App\Http\Controllers\RayonsController;
use App\Http\Controllers\RombelsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UsersController;

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

// Route::middleware('lsLogin')->group(function(){
    Route::middleware(['lsGuest'])->group(function() {
        Route::get('/', function () {
            return view('login');
        })->name('login');
        Route::post('/login',[UsersController::class, 'loginAuth'])->name('login.auth');
    });
        Route::get('/logout',[UsersController::class, 'logout'])->name('logout');
    
        Route::get('/error-permission', function() {
            return view('errors.permission');
        })->name('error.permission');
    
        Route::middleware(['lsLogin'])->group(function() {
        Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
        Route::get('/home', function () {
            return view('home');
        })->name('home.page');
    });

Route::middleware(['lsLogin', 'lsAdmin'])->group(function() {
    Route::get('/home', function () {
        return view('home');
    })->name('home.page');
Route::prefix('/late')->name('late.')->group(function(){
    Route::get('/create', [LatesController::class, 'create'])->name('create');
    Route::post('/store', [LatesController::class, 'store'])->name('store');
    Route::get('/', [LatesController::class, 'index'])->name('home');
    Route::get('/edit/{id}', [LatesController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [LatesController::class, 'update'])->name('update');
    Route::delete('/{id}', [LatesController::class, 'destroy'])->name('delete');
    Route::get('/{id}', [LatesController::class, 'index'])->name('image.display');
    // Route::get('/display-image/{filename}', 'App\Http\Controllers\LatesController@displayImage')->name('image.display');


});

Route::prefix('/user')->name('user.')->group(function(){
    Route::get('/create', [UsersController::class, 'create'])->name('create');
    Route::post('/store', [UsersController::class, 'store'])->name('store');
    Route::get('/', [UsersController::class, 'index'])->name('home');
    Route::get('/{id}', [UsersController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [UsersController::class, 'update'])->name('update');
    Route::delete('/{id}', [UsersController::class, 'destroy'])->name('delete');
});

Route::prefix('/student')->name('student.')->group(function(){
    Route::get('/create', [StudentsController::class, 'create'])->name('create');
    Route::post('/store', [StudentsController::class, 'store'])->name('store');
    Route::get('/', [StudentsController::class, 'index'])->name('home');
    Route::get('/{id}', [StudentsController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [StudentsController::class, 'update'])->name('update');
    Route::delete('/{id}', [StudentsController::class, 'destroy'])->name('delete');
});

Route::prefix('/rayon')->name('rayon.')->group(function(){
    Route::get('/create', [RayonsController::class, 'create'])->name('create');
    Route::post('/store', [RayonsController::class, 'store'])->name('store');
    Route::get('/', [RayonsController::class, 'index'])->name('home');
    Route::get('/{id}', [RayonsController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [RayonsController::class, 'update'])->name('update');
    Route::delete('/{id}', [RayonsController::class, 'destroy'])->name('delete');
});

Route::prefix('/rombel')->name('rombel.')->group(function(){
    Route::get('/create', [RombelsController::class, 'create'])->name('create');
    Route::post('/store', [RombelsController::class, 'store'])->name('store');
    Route::get('/', [RombelsController::class, 'index'])->name('home');
    Route::get('/{id}', [RombelsController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [RombelsController::class, 'update'])->name('update');
    Route::delete('/{id}', [RombelsController::class, 'destroy'])->name('delete');
});
});

Route::middleware(['lsLogin', 'lsPembimbing'])->group(function() {
    Route::prefix('/pembimbing')->name('pembimbing.')->group(function() {
        Route::get('/home', function () {
            return view('home');
        })->name('home.page');
        Route::prefix('/student')->name('student.')->group(function(){
            Route::get('/data', [StudentsController::class, 'data'])->name('data');
});
});
});


// });