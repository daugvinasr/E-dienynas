<?php

namespace App\Http\Controllers;

use App\Models\Atsiliepimai;
use App\Models\Mokiniai;
use Illuminate\Http\Request;

class AtsiliepimasController extends Controller
{
    public function rodytiAtsiliepimoForma($id_mokinys)
    {
        $atsiliepimoInformacija = Atsiliepimai::select('*')
            ->where([
                ['fk_Mokinys', '=', $id_mokinys],
            ])
            ->get();

        if (!$atsiliepimoInformacija->isEmpty()) {
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
        //TODO: is session paiimt mokytojo id ir idet kai bus
        $atsiliepimas->fk_Mokytojas = 1;
        $atsiliepimas->fk_Mokinys = $id_mokinys;
        $atsiliepimas->save();
        //TODO: turetu redirectint kazkur normaliau
        return redirect('/');
    }


}
