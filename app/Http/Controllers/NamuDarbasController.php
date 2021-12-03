<?php

namespace App\Http\Controllers;

use App\Models\Namu_darbai;
use App\Models\Tvarkarascio_uzsiemimai;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NamuDarbasController extends Controller
{
    public function showHomework(){
        $homeworkData = Namu_darbai::all();
        return view('NamuDarboSarasoLangas', ['homeworkData' => $homeworkData]);
    }
    public function showAddHomework(){
        $uzsiemimaiData = Tvarkarascio_uzsiemimai::all();
        return view('NamuDarboForma', ['uzsiemimaiData' => $uzsiemimaiData]);
    }
    public function addHomework(){
        request()->validate([
            'Pavadinimas' => 'required|max:254',
            'Aprasymas' => 'required|max:254|',
            'Atlikti_Iki' => 'required|max:254',
            'fk_Tvarkarascio_Uzsiemimas'=>'required',
        ]);

        $homework = new Namu_darbai();
        $homework->Pavadinimas = request('Pavadinimas');
        $homework->Aprasymas = request('Aprasymas');
        $homework->Atlikti_Iki = request('Atlikti_Iki');
        $homework->Data=Carbon::now();
        $homework->fk_Tvarkarascio_Uzsiemimas = request('fk_Tvarkarascio_Uzsiemimas');
        $homework->save();
        return redirect('/namudarbai');
    }
    public function moreHomework(){
        $id = request('id');
        $homeworkData = Namu_darbai::where('id_Namu_Darbas', $id)->get();
        return view('NamuDarboInformacijosLangas', ['homeworkData' => $homeworkData]);
    }

}
