<?php

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
    return view('index');
});

//Route::get('/', 'Login@show');

Route::post('/login', 'Login@login');


Route::post('/signup', 'Login@signup');

Route::get('/home','WebApp@home')->middleware('checksession');
Route::get('/plans','WebApp@planSelection')->middleware('checksession');
Route::get('/tags','WebApp@tagSelection')->middleware('checksession');
Route::post('/home','WebApp@generateHome')->middleware('checksession');
Route::post('/assignplan','WebApp@assignPlanToUser')->middleware('checksession');