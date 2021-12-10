<?php

namespace App\Http\Controllers;

use App\Models\Administratoriai;
use App\Models\Klases;
use App\Models\Mokiniai;
use App\Models\Mokytojai;
use App\Models\Naudotojai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class NaudotojasController extends Controller
{
    public function rodytiPrisijungima()
    {
        return view('PrisijungimoLangas');
    }

//    public function paskutinisRegistruotasNaudotojas()
//    {
//        return DB::table('Naudotojai')->latest('id_Naudotojas')->first();
//    }

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
                $duomenys2 = Klases::where('fk_Mokytojas',$duomenys[0]->id_Mokytojas)->get();
                Session::put('id_klase', $duomenys2[0]->id_Klase);
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
            'Vardas' => 'required|max:254',
            'Pavarde' => 'required|max:254',
            'Amzius' => 'required|max:254',
            'Miestas' => 'required|max:254',
            'Telefono_Numeris' => 'required|max:254',
            'Asmens_Kodas' => 'required|max:254',
            'Gimimo_Data' => 'required',
            'Lytis' => 'required|max:254',
            'Zodiako_Zenklas' => 'required|max:254',
            'Pasto_Kodas' => 'required|max:254',
            'Gatve' => 'required|max:254',
            'El_Pastas' => 'required|email|unique:Naudotojai',
            'Slaptazodis' => 'required|max:254'
        ]);

        $naudotojas = new Naudotojai();
        $naudotojas->Vardas = request('Vardas');
        $naudotojas->Pavarde = request('Pavarde');
        $naudotojas->Amzius = request('Amzius');
        $naudotojas->Miestas = request('Miestas');
        $naudotojas->Telefono_Numeris = request('Telefono_Numeris');
        $naudotojas->Asmens_Kodas = request('Asmens_Kodas');
        $naudotojas->Gimimo_Data = request('Gimimo_Data');
        $naudotojas->Lytis = request('Lytis');
        $naudotojas->Zodiako_Zenklas = request('Zodiako_Zenklas');
        $naudotojas->Pasto_Kodas = request('Pasto_Kodas');
        $naudotojas->Gatve = request('Gatve');
        $naudotojas->Galimybiu_Pasas = request('Galimybiu_Pasas');
        $naudotojas->El_Pastas = request('El_Pastas');
        $naudotojas->Slaptazodis = Hash::make(request('Slaptazodis'));
        $naudotojas->Role = 'svecias';
        $naudotojas->save();

        return redirect('/');
    }

    public function atsijungti()
    {
        Session::flush();
        return redirect('/');
    }
    public function rodytiNaudotojus(){
            $userData = Naudotojai::all();
        return view('NaudotojuSarasoLangas', ['userData' => $userData]);
    }
    public function placiauNaudotojas(){
        $id = request('id');
        $userData = Naudotojai::where('id_Naudotojas', $id)->get();
        return view('NaudotojoInformacijosLangas', ['userData' => $userData]);
    }
    public function pasalintiNaudotoja(){
        $id = request('id');
        Mokiniai::where('fk_Naudotojas',$id)->delete();
        Mokytojai::where('fk_Naudotojas',$id)->delete();
        Naudotojai::where('id_Naudotojas', $id)->delete();
        return redirect('/naudotojai');
    }
    public function rodytiNaudotojuPridejima(){
        $userData = Naudotojai::all();
        return view('NaudotojuForma', ['userData' => $userData]);
    }
    public function rodytiRedaguotiNaudotoja(){
        $id = request('id');
        $userData = Naudotojai::where('id_Naudotojas', $id)->get();
        return view('NaudotojoRedagavimoForma', ['userData' => $userData]);
    }
    public function redaguotiNaudotoja(){
        request()->validate([
            'Vardas' => 'required|max:254',
            'Pavarde' => 'required|max:254',
            'Amzius' => 'required|max:254',
            'Role' => 'required',
            'Miestas' => 'required|max:254',
            'Telefono_Numeris' => 'required|max:254',
            'Asmens_Kodas' => 'required|max:254',
            'Gimimo_Data' => 'required',
            'Lytis' => 'required|max:254',
            'Zodiako_Zenklas' => 'required|max:254',
            'Pasto_Kodas' => 'required|max:254',
            'Gatve' => 'required|max:254',
            'El_Pastas' => 'required|email'
        ]);
        $id = request('id');
        $userUpdate = Naudotojai::where('id_Naudotojas', $id);
        $userUpdate->update([
            'Vardas' =>request('Vardas'),
            'Pavarde'=>request('Pavarde'),
            'Amzius'=>request('Amzius'),
            'Role'=>request('Role'),
            'Miestas'=>request('Miestas'),
            'Galimybiu_Pasas' => request('Galimybiu_Pasas'),
            'Telefono_Numeris'=>request('Telefono_Numeris'),
            'Asmens_Kodas'=>request('Asmens_Kodas'),
            'Gimimo_Data'=>request('Gimimo_Data'),
            'Lytis'=>request('Lytis'),
            'Zodiako_Zenklas'=>request('Zodiako_Zenklas'),
            'Pasto_Kodas'=>request('Pasto_Kodas'),
            'Gatve'=>request('Gatve'),
            'El_Pastas'=>request('El_Pastas')]);
        return redirect('/naudotojai');
    }

    public function rodytiPridetiMokytoja(){
        $userData = Naudotojai::all();
        return view('MokytojoPridejimoForma', ['userData' => $userData]);
    }
    public function pridetiMokytoja(){
        request()->validate([
            //naudotojo duomenys
            'Vardas' => 'required|max:254',
            'Pavarde' => 'required|max:254',
            'Amzius' => 'required|max:254',
            'Miestas' => 'required|max:254',
            'Telefono_Numeris' => 'required|max:254',
            'Asmens_Kodas' => 'required|max:254',
            'Gimimo_Data' => 'required',
            'Lytis' => 'required|max:254',
            'Zodiako_Zenklas' => 'required|max:254',
            'Pasto_Kodas' => 'required|max:254',
            'Gatve' => 'required|max:254',
            'El_Pastas' => 'required|email|unique:Naudotojai',
            'Slaptazodis' => 'required|max:254',
            //mokytojo duomenys
            'Alga' => 'required|max:254',
            'Banko_Saskaita' => 'required|max:254',
            'Darbo_Patirtis' => 'required|max:254',
            'Issilavinimas' => 'required|max:254',
            'Idarbinimo_Data' => 'required|max:254',
            'Kabineto_NR' => 'required|max:254',
            'Ar_Pavaduotoja' => 'required|max:254'
        ]);
        $naudotojas = new Naudotojai();
        $naudotojas->Vardas = request('Vardas');
        $naudotojas->Pavarde = request('Pavarde');
        $naudotojas->Amzius = request('Amzius');
        $naudotojas->Miestas = request('Miestas');
        $naudotojas->Telefono_Numeris = request('Telefono_Numeris');
        $naudotojas->Asmens_Kodas = request('Asmens_Kodas');
        $naudotojas->Gimimo_Data = request('Gimimo_Data');
        $naudotojas->Lytis = request('Lytis');
        $naudotojas->Zodiako_Zenklas = request('Zodiako_Zenklas');
        $naudotojas->Pasto_Kodas = request('Pasto_Kodas');
        $naudotojas->Gatve = request('Gatve');
        $naudotojas->Galimybiu_Pasas = request('Galimybiu_Pasas');
        $naudotojas->El_Pastas = request('El_Pastas');
        $naudotojas->Slaptazodis = Hash::make(request('Slaptazodis'));
        $naudotojas->Role = 'mokytojas';
        $naudotojas->save();

        $naudotojoInformacija = Naudotojai::select('*')
            ->where([
                ['El_Pastas', '=', request('El_Pastas')],
            ])
            ->get();


        $mokytojas = new Mokytojai();
        $mokytojas->Alga = request('Alga');
        $mokytojas->Banko_Saskaita = request('Banko_Saskaita');
        $mokytojas->Darbo_Patirtis = request('Darbo_Patirtis');
        $mokytojas->Issilavinimas = request('Issilavinimas');
        $mokytojas->Idarbinimo_Data= request('Idarbinimo_Data');
        $mokytojas->Kabineto_NR = request('Kabineto_NR');
        $mokytojas->Ar_Pavaduotoja = request('Ar_Pavaduotoja');
        $mokytojas->fk_Naudotojas = $naudotojoInformacija[0]->id_Naudotojas;
        $mokytojas->save();
        return redirect('/naudotojai');
    }

    public function rodytiPridetiMokini()
    {
        $klaseData = Klases::all();
        return view('MokinioPridejimoForma',[ 'klaseData' => $klaseData]);
    }


    public function pridetiMokini()
    {
        request()->validate([
            //naudotojo duomenys
            'Vardas' => 'required|max:254',
            'Pavarde' => 'required|max:254',
            'Amzius' => 'required|max:254',
            'Miestas' => 'required|max:254',
            'Telefono_Numeris' => 'required|max:254',
            'Asmens_Kodas' => 'required|max:254',
            'Gimimo_Data' => 'required',
            'Lytis' => 'required|max:254',
            'Zodiako_Zenklas' => 'required|max:254',
            'Pasto_Kodas' => 'required|max:254',
            'Gatve' => 'required|max:254',
            'El_Pastas' => 'required|email|unique:Naudotojai',
            'Slaptazodis' => 'required|max:254',
            //mokytojo duomenys
            'Tevu_Numeris' => 'required|max:254',
            'Tevu_Adresas' => 'required|max:254',
            'Ar_Seniunas' => 'required|max:254',
            'Ar_Pavaduotojas' => 'required|max:254',
            'fk_Klase' => 'required|max:254',
        ]);
        $naudotojas = new Naudotojai();
        $naudotojas->Vardas = request('Vardas');
        $naudotojas->Pavarde = request('Pavarde');
        $naudotojas->Amzius = request('Amzius');
        $naudotojas->Miestas = request('Miestas');
        $naudotojas->Telefono_Numeris = request('Telefono_Numeris');
        $naudotojas->Asmens_Kodas = request('Asmens_Kodas');
        $naudotojas->Gimimo_Data = request('Gimimo_Data');
        $naudotojas->Lytis = request('Lytis');
        $naudotojas->Zodiako_Zenklas = request('Zodiako_Zenklas');
        $naudotojas->Pasto_Kodas = request('Pasto_Kodas');
        $naudotojas->Gatve = request('Gatve');
        $naudotojas->Galimybiu_Pasas = request('Galimybiu_Pasas');
        $naudotojas->El_Pastas = request('El_Pastas');
        $naudotojas->Slaptazodis = Hash::make(request('Slaptazodis'));
        $naudotojas->Role = 'mokinys';
        $naudotojas->save();

        $naudotojoInformacija = Naudotojai::select('*')
            ->where([
                ['El_Pastas', '=', request('El_Pastas')],
            ])
            ->get();

        $mokinys = new Mokiniai();
        $mokinys ->Tevu_Numeris = request('Tevu_Numeris');
        $mokinys ->Tevu_Adresas = request('Tevu_Adresas');
        $mokinys ->Ar_Seniunas = request('Ar_Seniunas');
        $mokinys ->Ar_Pavaduotojas = request('Ar_Pavaduotojas');
        $mokinys ->fk_Klase = request('fk_Klase');
        $mokinys ->fk_Naudotojas = $naudotojoInformacija[0]->id_Naudotojas;
        $mokinys->save();
        return redirect('/naudotojai');

    }


}
