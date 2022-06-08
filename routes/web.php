<?php

use Illuminate\Routing\Route as RoutingRoute;
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
    return view('home.test');
});

Route::get('/test', function () {
    return view('admin.index');
});

Route::get('/list', function () {
    return view('admin.dashboard.room.list');
});


Route::group(['prefix' => 'admin'], function() {
    //
});
