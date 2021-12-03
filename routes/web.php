<?php

use App\Http\Controllers\NamuDarbasController;
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

Route::get('/', function () { return view('PagrindinisLangas');});
Route::get('/namudarbai', [NamuDarbasController::class, 'showHomework']);
Route::get('/pridetinamudarba', [NamuDarbasController::class, 'showAddHomework']);
Route::post('/pridetinamudarba', [NamuDarbasController::class, 'addHomework']);
Route::get('/placiaunamudarbas', [NamuDarbasController::class, 'moreHomework']);


