<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\NewsController;
use Facade\FlareClient\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//---------API From POST-------//
Route::get('/news',[ApiController::class,'news'] );
Route::get('/news/{id}', [ApiController::class,'newsdesc']);
Route::get('/gallery',[ApiController::class,'gallery']);
Route::get('/file',[ApiController::class,'file']);
Route::get('/gallery/{id}',[ApiController::class,'galleryDetail']);
Route::get('/company',[ApiController::class,'companylist']);

//------------API WEBPAGE---------//
Route::get('/section',[ApiController::class,'section']);
Route::get('/coopdetail',[ApiController::class,'coopdetal']);
Route::get('/schedule/edu',[ApiController::class,'eduSchedule']);
Route::get('/schedule/coop',[ApiController::class,'coopSchedule']);
Route::get('/banner',[ApiController::class,'banner']);
