<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/userlogin','Api@login');


Route::post('/selecttags','Api@assignTagsToExpert');


Route::post('/getrecentquetions','Api@getRecentQuestion');


Route::post('/updatefcm','Api@updateFCMToken');


Route::post('/addanswer','Api@addingAnAnswer');


Route::get('/gettaglist','Api@gettagList');