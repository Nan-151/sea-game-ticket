<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\GameMatchController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\ZoneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('venue', VenueController::class);
Route::resource('zone', ZoneController::class);
Route::get('/zone/seat/getAll', [ZoneController::class, 'getAllSeat']);
Route::resource('event', EventController::class);
Route::get('/event/getEvent/{sport}', [EventController::class, 'getEvent']);
Route::resource('match', GameMatchController::class);
Route::resource('sport', SportController::class);
Route::resource('ticket', TicketController::class);

Route::fallback(function(){
    return "Page not found!!";
});