<?php

namespace App\Http\Controllers;

use App\Models\Pamokos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PamokaController extends Controller
{
    public function Index()
    {
        $VisosPamokos = Pamokos::all();

        return view('PamokuSarasoLangas',['VisosPamokos'=>$VisosPamokos]);

    }

    public function irasytiPamoka()
    {
        request()->validate([
            //naudotojo duomenys
            'Pavadinimas' => 'required|max:254',
            'Kalba' => 'required|max:254',
            'Aprasymas' => 'required|max:254',
            'Trukme' => 'required|max:254',
        ]);

        $pamoka = new Pamokos();
        $pamoka->Pavadinimas = request('Pavadinimas');
        $pamoka->Kalba = request('Kalba');
        $pamoka->Aprasymas = request('Aprasymas');
        $pamoka->Trukme = request('Trukme');
        $pamoka->save();
        return redirect('pamokos');
    }

    public function pasalintiPamoka(){
        $id = request('id');
        Pamokos::where('id_Pamoka', $id)->delete();
        return redirect('pamokos');
    }
    public function rodytiRedaguotiPamoka(){
        $id = request('id');
        $userData = Pamokos::where('id_Pamoka', $id)->get();
        return view('PamokosRedagavimoForma', ['userData' => $userData]);
    }
    public function redaguotiPamoka(){
        request()->validate([
            'Pavadinimas' => 'required|max:254',
            'Kalba' => 'required|max:254',
            'Aprasymas' => 'required|max:254',
            'Trukme' => 'required|max:254',
        ]);
        $id = request('id');
        $userUpdate = Pamokos::where('id_Pamoka', $id);
        $userUpdate->update([
            'Pavadinimas' =>request('Pavadinimas'),
            'Kalba'=>request('Kalba'),
            'Aprasymas'=>request('Aprasymas'),
            'Trukme'=>request('Trukme')]);
        return redirect('pamokos');
    }


}
