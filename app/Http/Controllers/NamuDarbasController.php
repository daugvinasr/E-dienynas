<?php

namespace App\Http\Controllers;

use App\Models\Namu_darbai;
use App\Models\Tvarkarascio_uzsiemimai;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class NamuDarbasController extends Controller
{
    public function showHomework(){
        if(session('role')=='mokinys') {
            $homeworkData = DB::table('Namu_darbai')
                ->leftJoin('Tvarkarascio_uzsiemimai', 'Namu_darbai.fk_Tvarkarascio_Uzsiemimas', '=', 'Tvarkarascio_uzsiemimai.id_Tvarkarascio_Uzsiemimas')
                ->join('Pamokos','Tvarkarascio_uzsiemimai.fk_Pamoka','=','Pamokos.id_Pamoka')
                ->where('Tvarkarascio_uzsiemimai.fk_Klase','=',session('id_klase'))
                ->select('Namu_darbai.*','Pamokos.Pavadinimas as pamokaName')
                ->get();
        }
        else{
            $homeworkData=Namu_darbai::all();
        }

        return view('NamuDarboSarasoLangas', ['homeworkData' => $homeworkData]);
    }
    public function showAddHomework(){
        $uzsiemimaiData = Tvarkarascio_uzsiemimai::all();
        return view('NamuDarboPridejimoForma', ['uzsiemimaiData' => $uzsiemimaiData]);
    }
    public function addHomework(){
        request()->validate([
            'Pavadinimas' => 'required|max:254',
            'Aprasymas' => 'required|max:254',
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
    public function removeHomework(){
        $id = request('id');
        Namu_darbai::where('id_Namu_Darbas', $id)->delete();
        return redirect('/namudarbai');
    }
    public function showEditHomework(){
        $id = request('id');
        $homeworkData = Namu_darbai::where('id_Namu_Darbas', $id)->get();
        $temp=$homeworkData[0]->fk_Tvarkarascio_Uzsiemimas;
        $uzsiemimasData = Tvarkarascio_uzsiemimai::where('id_Tvarkarascio_Uzsiemimas',$temp)->get();
        $uzsiemimaiData = Tvarkarascio_uzsiemimai::where('id_Tvarkarascio_Uzsiemimas','!=',$temp)->get();
        return view('NamuDarboRedagavimoForma', ['homeworkData' => $homeworkData,'uzsiemimasData' => $uzsiemimasData,'uzsiemimaiData' => $uzsiemimaiData]);
    }
    public function editHomework(){
        request()->validate([
            'Pavadinimas' => 'required|max:254',
            'Aprasymas' => 'required|max:254',
            'Atlikti_Iki' => 'required|max:254',
            'fk_Tvarkarascio_Uzsiemimas'=>'required',
        ]);
        $id = request('id');
        $homeworkUpdate = Namu_darbai::where('id_Namu_Darbas', $id);
        $homeworkUpdate->update(['Pavadinimas' =>request('Pavadinimas'),'Aprasymas'=>request('Aprasymas'),'Atlikti_Iki'=>request('Atlikti_Iki'),'fk_Tvarkarascio_Uzsiemimas'=>request('fk_Tvarkarascio_Uzsiemimas')]);
        return redirect('/namudarbai');
    }


}
