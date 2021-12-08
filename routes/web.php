<?php

use App\Http\Controllers\NamuDarbasController;
use App\Http\Controllers\AtsiliepimasController;
use App\Http\Controllers\NaudotojasController;
use App\Http\Controllers\TvarkarastisController;
use App\Http\Controllers\UzsiemimoIvertinimasController;
use Illuminate\Support\Facades\Mail;
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
    return view('PagrindinisLangas');
});


Route::get('/namudarbai', [NamuDarbasController::class, 'showHomework']);
Route::get('/pridetinamudarba', [NamuDarbasController::class, 'showAddHomework']);
Route::post('/pridetinamudarba', [NamuDarbasController::class, 'addHomework']);
Route::get('/placiaunamudarbas', [NamuDarbasController::class, 'moreHomework']);
Route::get('/pasalintinamudarbas', [NamuDarbasController::class, 'removeHomework']);
Route::get('/redaguotinamudarbas', [NamuDarbasController::class, 'showEditHomework']);
Route::post('/redaguotinamudarbas', [NamuDarbasController::class, 'editHomework']);
Route::get('/primintinamudarba', [NamuDarbasController::class, 'reminder']);

Route::get('/rodytiAtsiliepimoForma/{id_mokinys}', [AtsiliepimasController::class, 'rodytiAtsiliepimoForma']);
Route::post('/rodytiAtsiliepimoForma/{id_mokinys}', [AtsiliepimasController::class, 'irasytiAtsiliepimoForma']);
Route::get('/rodytiRedagavimoAtsiliepimoForma/{id_atsiliepimas}/{id_mokinys}', [AtsiliepimasController::class, 'rodytiRedagavimoAtsiliepimoForma']);
Route::post('/rodytiRedagavimoAtsiliepimoForma/{id_atsiliepimas}/{id_mokinys}', [AtsiliepimasController::class, 'irasytiRedagavimoAtsiliepimoForma']);

Route::get('/rodytiAtsiliepimuSarasa/{id_mokinys}', [AtsiliepimasController::class, 'rodytiAtsiliepimuSarasa']);
Route::get('/rodytiAtsiliepima/{id_atsiliepimas}', [AtsiliepimasController::class, 'rodytiAtsiliepima']);
Route::get('/istrintiAtsiliepima/{id_atsiliepimas}/{id_mokinys}', [AtsiliepimasController::class, 'istrintiAtsiliepima']);
Route::get('/siustiAtsiliepima/{id_atsiliepimas}/{id_mokinys}', [AtsiliepimasController::class, 'siustiAtsiliepima']);




//auth
Route::get('/prisijungti', [NaudotojasController::class, 'rodytiPrisijungima']);
Route::post('/prisijungti', [NaudotojasController::class, 'prisijungti']);
Route::get('/registruotis', [NaudotojasController::class, 'rodytiRegistracija']);
Route::post('/registruotis', [NaudotojasController::class, 'registruotis']);
Route::get('/atsijungti', [NaudotojasController::class, 'atsijungti']);

Route::get('/balai', [UzsiemimoIvertinimasController::class, 'rodytiPazymius']);
Route::get('/skaiciuotibala', [UzsiemimoIvertinimasController::class, 'rodytiSkaiciavima']);
Route::post('/skaiciuotibala', [UzsiemimoIvertinimasController::class, 'vidurkisplius']);
Route::get('/baloinformacija', [UzsiemimoIvertinimasController::class, 'rodytiPazymi']);
Route::get('/ninformacija', [UzsiemimoIvertinimasController::class, 'rodytiN']);
Route::get('/istrintiPazymi/{id}', [UzsiemimoIvertinimasController::class, 'istrintiPazymi']);
Route::get('/istrintiLankomuma/{id}', [UzsiemimoIvertinimasController::class, 'istrintiLankomuma']);
Route::post('/baloinformacija', [UzsiemimoIvertinimasController::class, 'keistiPazymi']);
Route::get('/rodytiivercioforma', [UzsiemimoIvertinimasController::class, 'rodytiforma']);
Route::post('/rodytiivercioforma', [UzsiemimoIvertinimasController::class, 'pridetiPazimi']);

Route::get('/naudotojai', [NaudotojasController::class, 'rodytiNaudotojus']);
Route::get('/pridetinaudotoja', [NaudotojasController::class, 'rodytiRegistracija']);
Route::post('/pridetinaudotoja', [NaudotojasController::class, 'registruotis']);
Route::get('/pridetimokytoja', [NaudotojasController::class, 'rodytiPridetiMokytoja']);
Route::post('/pridetimokytoja', [NaudotojasController::class, 'pridetiMokytoja']);
Route::get('/placiaunaudotojas', [NaudotojasController::class, 'placiauNaudotojas']);
Route::get('/pasalintinaudotoja', [NaudotojasController::class, 'pasalintiNaudotoja']);
Route::get('/redaguotinaudotoja', [NaudotojasController::class, 'rodytiRedaguotiNaudotoja']);
Route::post('/redaguotinaudotoja', [NaudotojasController::class, 'redaguotiNaudotoja']);

Route::get('/tvarkarastis', [TvarkarastisController::class, 'showTvarkarastis']);
