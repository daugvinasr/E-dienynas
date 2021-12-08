<?php

namespace App\Http\Controllers;

use App\Models\Tvarkarascio_uzsiemimai;
use Illuminate\Http\Request;

class TvarkarastisController extends Controller
{
    public function showTvarkarastis(){
            $tvarkarastisData = Tvarkarascio_uzsiemimai::where('Data','>=',date('y-m-d'))->where('fk_Klase',session('id_klase'))->orderBy('Data')->orderBy('Laikas')->get();
            return view('TvarkarasioInformacijosLangas',['tvarkarastisData'=>$tvarkarastisData]);
    }
}
