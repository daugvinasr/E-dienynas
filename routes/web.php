<?php

use App\Http\Controllers\NamuDarbasController;
use App\Http\Controllers\AtsiliepimasController;
use App\Http\Controllers\NaudotojasController;
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


Route::get('/bot', function ()
{
    \Illuminate\Support\Facades\Http::post('https://api.tlgr.org/bot5040648854:AAHs-u4W2gPPoy4KAbFYZUMYZMkyHPRiDLg/sendMessage',[
        'chat_id' => -1001757183255,
        'text' => 'daugvinasaaaaaaaaaaa'
    ]);
});




Route::get('/namudarbai', [NamuDarbasController::class, 'showHomework']);
Route::get('/pridetinamudarba', [NamuDarbasController::class, 'showAddHomework']);
Route::post('/pridetinamudarba', [NamuDarbasController::class, 'addHomework']);
Route::get('/placiaunamudarbas', [NamuDarbasController::class, 'moreHomework']);
Route::get('/pasalintinamudarbas', [NamuDarbasController::class, 'removeHomework']);
Route::get('/redaguotinamudarbas', [NamuDarbasController::class, 'showEditHomework']);
Route::post('/redaguotinamudarbas', [NamuDarbasController::class, 'editHomework']);

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
Route::post('/baloinformacija', [UzsiemimoIvertinimasController::class, 'keistiPazymi']);
