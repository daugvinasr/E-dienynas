<?php

namespace App\Http\Controllers;

use App\Models\Administratoriai;
use App\Models\Mokiniai;
use App\Models\Mokytojai;
use App\Models\Naudotojai;
use App\Models\Pranesimai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class PranesimasController extends Controller
{
    public function rodytiPranesimus(){
        if(session('role')=='mokinys'){
            $messageData = Pranesimai::where('fk_Mokinys', session('id_person'))->get();

        }
        else if(session('role')=='mokytojas') {
            $messageData = Pranesimai::where('fk_Mokytojas', session('id_person'))->get();
        }
        return view('PranesimuSarasoLangas', ['messageData' => $messageData]);
    }
    public function rodytiSiustiPranesima(){
        $messageData = Pranesimai::all();
        $userData = Naudotojai::all();
        return view('PranesimoForma', ['messageData' => $messageData, 'userData' => $userData]);
    }
    public function siustiPranesima(){
        request()->validate([
            'Pavadinimas' => 'required|max:254',
            'Aprasymas' => 'required|max:254',
            'Data' => 'required|max:254',
            'Papildoma_Informacija' => 'required|max:254',
            'fk_Mokinys' => 'required|max:254',
            'fk_Mokytojas' => 'required|max:254',
        ]);

        $message = new Pranesimai();
        $message->Pavadinimas = request('Pavadinimas');
        $message->Aprasymas = request('Aprasymas');
        $message->Data=Carbon::now();
        $message->Papildoma_Informacija = request('Papildoma_Informacija');
        $message->fk_Mokinys = request('fk_Mokinys');
        $message->fk_Mokytojas = request('fk_Mokytojas');
        $message->save();
        return redirect('/pranesimai');
    }
}
