<?php

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

Route::get('/', function () { return view('main');});
Route::get('/atsiliepimai', function () { return view('atsiliepimai');});
Route::get('/namudarbai', function () { return view('namudarbai');});
Route::get('/naudotojai', function () { return view('naudotojai');});
Route::get('/pazymiai', function () { return view('pazymiai');});
Route::get('/prisijungti', function () { return view('prisijungti');});
Route::get('/registruotis', function () { return view('registruotis');});
Route::get('/tvarkarastis', function () { return view('tvarkarastis');});



