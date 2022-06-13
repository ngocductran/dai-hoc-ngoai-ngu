<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\RouteGroup;

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
    return view('home.home');
});

Route::get('/dashboard', function () {
    return view('admin.index');
});

Route::get('/list', function () {
    return view('admin.dashboard.room.create');
});

Route::get('login',[HomeController::class,'getLogin'])->name('get.login');
Route::post('login',[HomeController::class,'postLogin']);
Route::get('register',[HomeController::class,'getRegister']);
Route::post('register',[HomeController::class,'postRegister']);

Route::group(['prefix' => 'admin'], function() {

    Route::prefix('room')->group(function () {
        Route::get('/', [RoomController::class, 'getRoom'])->name('get.room');
        Route::get('/create', [RoomController::class, 'getRoomCreate'])->name('get.room.create');
        Route::post('/create', [RoomController::class, 'postRoomCreate'])->name('post.room.create');
        Route::get('/edit/{id}', [RoomController::class, 'getRoomEdit'])->name('get.room.edit');
        Route::post('/edit/{id}', [RoomController::class, 'postRoomEdit'])->name('post.room.edit');
        Route::get('/delete/{id}', [RoomController::class, 'getRoomDelete'])->name('get.room.delete');    
    });

    Route::prefix('event')->group(function () {
        Route::get('/', [EventController::class, 'getEvent'])->name('get.event');
        Route::get('/create', [EventController::class, 'getEventCreate'])->name('get.event.create');
        Route::post('/create', [EventController::class, 'postEventCreate'])->name('post.event.create');
        Route::get('/delete/{id}', [EventController::class, 'getEventDelete'])->name('get.event.delete');  
    });
    
});
