<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\IntroController;
use App\Http\Controllers\DocumentController;
use Illuminate\Routing\Route as RoutingRoute;

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
    return view('home.test');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/list', function () {
    return view('admin.dashboard.room.create');
});


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

    Route::prefix('document')->group(function () {
        Route::get('/', [DocumentController::class, 'getDocument'])->name('get.document');
        Route::get('/create', [DocumentController::class, 'getDocumentCreate'])->name('get.document.create');
        Route::post('/create', [DocumentController::class, 'postDocumentCreate'])->name('post.document.create');
        Route::get('/edit/{id}', [DocumentController::class, 'getDocumentEdit'])->name('get.document.edit');
        Route::post('/edit/{id}', [DocumentController::class, 'postDocumentEdit'])->name('post.document.edit');
        Route::get('/delete/{id}', [DocumentController::class, 'getDocumentDelete'])->name('get.document.delete');    
    });


    Route::prefix('work')->group(function () {
        Route::get('/', [WorkController::class, 'getWork'])->name('get.work');
        Route::get('/create', [WorkController::class, 'getWorkCreate'])->name('get.work.create');
        Route::post('/create', [WorkController::class, 'postWorkCreate'])->name('post.work.create');
        Route::get('/edit/{id}', [WorkController::class, 'getWorkEdit'])->name('get.work.edit');
        Route::post('/edit/{id}', [WorkController::class, 'postWorkEdit'])->name('post.work.edit');
        Route::get('/delete/{id}', [WorkController::class, 'getWorkDelete'])->name('get.work.delete');    
    });

    Route::prefix('intro')->group(function () {
        Route::get('/', [IntroController::class, 'getIntro'])->name('get.intro');
        Route::get('/create', [IntroController::class, 'getIntroCreate'])->name('get.intro.create');
        Route::post('/create', [IntroController::class, 'postIntroCreate'])->name('post.intro.create');
        Route::get('/edit/{id}', [IntroController::class, 'getIntroEdit'])->name('get.intro.edit');
        Route::post('/edit/{id}', [IntroController::class, 'postIntroEdit'])->name('post.intro.edit');
        Route::get('/delete/{id}', [IntroController::class, 'getIntroDelete'])->name('get.intro.delete');    
    });
    
});
