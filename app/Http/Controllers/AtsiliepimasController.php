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


}
