<?php

namespace App\Http\Controllers;

use App\Models\Administratoriai;
use App\Models\Mokiniai;
use App\Models\Mokytojai;
use App\Models\Naudotojai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class NaudotojasController extends Controller
{
    public function rodytiPrisijungima()
    {
        return view('PrisijungimoLangas');
    }

    public function rodytiRegistracija()
    {
        return view('RegistracijosLangas');
    }

    public function prisijungti()
    {
        request()->validate([
            'email' => 'required|max:254',
            'password' => 'required|max:254'
        ]);

        $data = Naudotojai::select('*')->where([['El_Pastas', '=', request('email')]])->get();
        if (!$data->isEmpty() && Hash::check(request('password'), $data[0]->Slaptazodis)) {
            Session::put('id_user', $data[0]->id_Naudotojas);
            Session::put('vardas', $data[0]->Vardas);
            Session::put('pavarde', $data[0]->Pavarde);
            Session::put('role', $data[0]->Role);

            if ($data[0]->Role == 'mokinys')
            {
                $duomenys = Mokiniai::select('*')->where([['fk_Naudotojas', '=', $data[0]->id_Naudotojas]])->get();
                Session::put('id_person', $duomenys[0]->id_Mokinys);
                Session::put('id_klase', $duomenys[0]->fk_Klase);
            }
            else if ($data[0]->Role == 'mokytojas')
            {
                $duomenys = Mokytojai::select('*')->where([['fk_Naudotojas', '=', $data[0]->id_Naudotojas]])->get();
                Session::put('id_person', $duomenys[0]->id_Mokytojas);
            }
            else if ($data[0]->Role == 'administratorius')
            {
                $duomenys = Administratoriai::select('*')->where([['fk_Naudotojas', '=', $data[0]->id_Naudotojas]])->get();
                Session::put('id_person', $duomenys[0]->id_Administratorius);
            }
            return redirect('/');
        } else {
            return back()->withErrors(['loginFail' => 'Įvesti neteisingi duomenys.']);
        }
    }

    public function registruotis()
    {
        request()->validate([
            'vardas' => 'required|max:254',
            'pavarde' => 'required|max:254',
            'amzius' => 'required|max:254',
            'miestas' => 'required|max:254',
            'telefonoNumeris' => 'required|max:254',
            'asmensKodas' => 'required|max:254',
            'gimimoData' => 'required',
            'lytis' => 'required|max:254',
            'zodiakoZenklas' => 'required|max:254',
            'pastoKodas' => 'required|max:254',
            'gatve' => 'required|max:254',
            'El_Pastas' => 'required|email|unique:Naudotojai',
            'password' => 'required|max:254'
        ]);

        $naudotojas = new Naudotojai();
        $naudotojas->Vardas = request('vardas');
        $naudotojas->Pavarde = request('pavarde');
        $naudotojas->Amzius = request('amzius');
        $naudotojas->Miestas = request('miestas');
        $naudotojas->Telefono_Numeris = request('telefonoNumeris');
        $naudotojas->Asmens_Kodas = request('asmensKodas');
        $naudotojas->Gimimo_Data = request('gimimoData');
        $naudotojas->Lytis = request('lytis');
        $naudotojas->Zodiako_Zenklas = request('zodiakoZenklas');
        $naudotojas->Pasto_Kodas = request('pastoKodas');
        $naudotojas->Gatve = request('gatve');
        $naudotojas->Galimybiu_Pasas = request('gpasas');
        $naudotojas->El_Pastas = request('El_Pastas');
        $naudotojas->Slaptazodis = Hash::make(request('password'));
        $naudotojas->Role = 'svecias';
        $naudotojas->save();

        return redirect('/');
    }

    public function atsijungti()
    {
        Session::flush();
        return redirect('/');
    }

}
