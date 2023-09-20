<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwilioController;

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
    return view('welcome');
});

Route::get('/call', [TwilioController::class, 'call']);
Route::get('/make-call', [TwilioController::class, 'makeCall']);
Route::post('/voice', [TwilioController::class, 'handleVoiceRequest']);

