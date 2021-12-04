<?php

namespace App\Http\Controllers;

use App\Mail\EmailStack;
use App\Models\Atsiliepimai;
use App\Models\Mokiniai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AtsiliepimasController extends Controller
{
    public function rodytiAtsiliepimoForma($id_mokinys)
    {
        $atsiliepimoInformacija = Mokiniai::select('*')
            ->where([
                ['id_Mokinys', '=', $id_mokinys],
            ])
            ->get();

        if (!$atsiliepimoInformacija->isEmpty() && session('role') == 'mokytojas') {
            return view('AtsiliepimoForma', ['atsiliepimoInformacija' => $atsiliepimoInformacija]);
        } else {
            return redirect('/');
        }
    }

    public function irasytiAtsiliepimoForma($id_mokinys)
    {
        $atsiliepimas = new Atsiliepimai();
        $atsiliepimas->Pavadinimas = request('pavadinimas');
        $atsiliepimas->Aprasymas = request('textarea');
        $atsiliepimas->Data = date('Y-m-d');
        $atsiliepimas->fk_Mokytojas = session('id_person');
        $atsiliepimas->fk_Mokinys = $id_mokinys;
        $atsiliepimas->save();
        return redirect('/rodytiAtsiliepimuSarasa/'.$id_mokinys);
    }

    public function rodytiAtsiliepimuSarasa($id_mokinys)
    {
        $atsiliepimoInformacija = Atsiliepimai::select('*')
            ->where([
                ['fk_Mokinys', '=', $id_mokinys],
            ])
            ->get();

        return view('AtsiliepimuSarasoLangas', ['atsiliepimoInformacija' => $atsiliepimoInformacija, 'id_mokinys' => $id_mokinys]);
    }

    public function rodytiAtsiliepima($id_atsiliepimas)
    {
        $atsiliepimoInformacija = Atsiliepimai::select('*')
            ->where([
                ['id_Atsiliepimas', '=', $id_atsiliepimas],
            ])
            ->get();

        if (!$atsiliepimoInformacija->isEmpty()) {
            return view('AtsiliepimuInformacijosLangas', ['atsiliepimoInformacija' => $atsiliepimoInformacija, 'id_mokinys' => $atsiliepimoInformacija[0]->atsiliepimasToMokinys->id_Mokinys]);
        } else {
            return redirect('/');
        }
    }

    public function istrintiAtsiliepima($id_atsiliepimas,$id_mokinys)
    {
        Atsiliepimai::where('id_Atsiliepimas','=',$id_atsiliepimas)->delete();
        return redirect('/rodytiAtsiliepimuSarasa/'.$id_mokinys);
    }

    public function rodytiRedagavimoAtsiliepimoForma($id_atsiliepimas,$id_mokinys)
    {
        $atsiliepimoInformacija = Atsiliepimai::select('*')
            ->where([
                ['id_Atsiliepimas', '=', $id_atsiliepimas],
            ])
            ->get();

        return view('AtsiliepimoRedagavimoForma', ['atsiliepimoInformacija' => $atsiliepimoInformacija]);
    }

    public function irasytiRedagavimoAtsiliepimoForma($id_atsiliepimas,$id_mokinys)
    {
        $atsiliepimas = Atsiliepimai::where('id_Atsiliepimas',$id_atsiliepimas);
        $atsiliepimas->update(['Pavadinimas' => request('pavadinimas'),'Aprasymas' => request('textarea'),'Data' => date('Y-m-d'),'fk_Mokytojas' => session('id_person')]);
        return redirect('/rodytiAtsiliepimuSarasa/'.$id_mokinys);
    }

    public function siustiAtsiliepima($id_atsiliepimas,$id_mokinys)
    {
        $atsiliepimoInformacija = Atsiliepimai::select('*')
            ->where([
                ['id_Atsiliepimas', '=', $id_atsiliepimas],
            ])
            ->get();

        $paruostaInformacija = array($atsiliepimoInformacija[0]->atsiliepimasToMokinys->mokinysToNaudotojas->Vardas,
            $atsiliepimoInformacija[0]->atsiliepimasToMokinys->mokinysToNaudotojas->Pavarde,
            $atsiliepimoInformacija[0]->atsiliepimasToMokytojas->mokytojasToNaudotojas->Vardas,
            $atsiliepimoInformacija[0]->atsiliepimasToMokytojas->mokytojasToNaudotojas->Pavarde,
            $atsiliepimoInformacija[0]->Pavadinimas,
            $atsiliepimoInformacija[0]->Aprasymas,
            $atsiliepimoInformacija[0]->Data);


        Mail::to($atsiliepimoInformacija[0]->atsiliepimasToMokinys->mokinysToNaudotojas->El_Pastas)->send(new EmailStack($paruostaInformacija));
        return redirect('/rodytiAtsiliepimuSarasa/'.$id_mokinys);
    }
}
