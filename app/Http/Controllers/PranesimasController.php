<?php

namespace App\Http\Controllers;

use App\Models\Administratoriai;
use App\Models\Mokiniai;
use App\Models\Mokytojai;
use App\Models\Naudotojai;
use App\Models\Pranesimai;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class PranesimasController extends Controller
{
    public function rodytiPranesimus(){
            $messageData = Pranesimai::where('Gavejas', session('id_user'))->get();

        return view('PranesimuSarasoLangas', ['messageData' => $messageData]);
    }
    public function rodytiSiustiPranesima(){
        $messageData = Pranesimai::all();
        $userData = Naudotojai::where('id_Naudotojas','!=',session('id_user'))->get();
        return view('PranesimoForma', ['messageData' => $messageData, 'userData' => $userData]);
    }
    public function siustiPranesima(){
        request()->validate([
            'Pavadinimas' => 'required|max:254',
            'Aprasymas' => 'required|max:254',
            'Papildoma_Informacija' => 'required|max:254',
        ]);

        $message = new Pranesimai();
        $message->Pavadinimas = request('Pavadinimas');
        $message->Aprasymas = request('Aprasymas');
        $message->Data=Carbon::now();
        $message->Papildoma_Informacija = request('Papildoma_Informacija');
        $message->Siuntejas = session('id_user');
        $message->Gavejas = request('Gavejas');
        $message->save();
        return redirect('/pranesimai');
    }
}
