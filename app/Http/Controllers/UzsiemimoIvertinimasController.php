<?php

namespace App\Http\Controllers;

use App\Models\Klases;
use App\Models\Mokytojai;
use App\Models\Tvarkarascio_uzsiemimai;
use App\Models\Uzsiemimu_ivertinimai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Pamokos;
use App\Models\Mokiniai;

class UzsiemimoIvertinimasController extends Controller
{
    public function rodytiPazymius(){
        $classData = Pamokos::all();
        $id = Mokiniai::where('fk_Naudotojas', session('id_user'))->get();
        Session::put('id_student', $id[0]->id_Mokinys);
        return view('BaluSekosLangas', ['classData' => $classData], ['id' => $id]);
    }

    public function rodytiSkaiciavima(){
        $id=request('pamoka');
        $vid = null;
        $classData = Pamokos::where('id_Pamoka', $id)->get();//where('id_Pamoka',$id);
        return view('BaluSkaiciuoklesLangas', ['classData' => $classData], ['vid' => $vid]);
    }

    public static  function vidurkis($data){
        $sk=0;
        $nr=0;
        foreach($data->pamokaTvarkarastis as $tdata) {
            foreach ($tdata->tvarkarastisIvertinimas as $idata){
                if ($idata->fk_Mokinys == session('id_student')) {
                    {
                        if($idata->Pazymys!=""){
                        $sk+=$idata->Pazymys;
                        $nr++;}
                    }
                }
            }
        }
        if($nr != 0)
        return $sk/$nr;
        return;
    }

    public static  function vidurkisplius(){
        $id=request('pamoka');
        $classData = Pamokos::where('id_Pamoka', $id)->get();//where('id_Pamoka',$id);
        $sk=0;
        $nr=0;
        foreach($classData[0]->pamokaTvarkarastis as $tdata) {
            foreach ($tdata->tvarkarastisIvertinimas as $idata){
                if ($idata->fk_Mokinys == session('id_student')) {
                    {
                        if($idata->Pazymys!=""){
                        $sk+=$idata->Pazymys;
                        $nr++;}
                    }
                }
            }
        }
        $first= request('first');
        $second= request('second');
        $third= request('third');
        $fourth= request('fourth');
        if($first!="" )
            $nr++;
        if($second!="" )
            $nr++;
        if($third!="" )
            $nr++;
        if($fourth!="" )
            $nr++;
        $sk= $sk + ($first+$second+$third+$fourth);
        $vid = null;
        if($nr != 0) {
            $vid = $sk/$nr;
            return view('BaluSkaiciuoklesLangas', ['classData' => $classData], ['vid' => $vid]);
        }
        return  view('BaluSkaiciuoklesLangas', ['classData' => $classData], ['vid' => $vid]);
    }

    public function rodytiPazymi(){
        $id=request('id');
        $markData = Uzsiemimu_ivertinimai::where('id_Uzsiemimo_Ivertinimas', $id)->get();
        $n=0;
        return  view('PazymioLangas', ['markData' => $markData], ['n' => $n]);
    }

    public function rodytiN(){
        $id=request('id');
        $markData = Uzsiemimu_ivertinimai::where('id_Uzsiemimo_Ivertinimas', $id)->get();
        $n=1;
        return  view('PazymioLangas', ['markData' => $markData],['n' => $n]);
    }

    public function istrintiPazymi($id_pazymys)
    {
        Uzsiemimu_ivertinimai::where('id_Uzsiemimo_Ivertinimas','=',$id_pazymys)->delete();
        return redirect('/rodytiivercioforma');
    }

    public function istrintiLankomuma($id_pazymys){
        $mark = Uzsiemimu_ivertinimai::where('id_Uzsiemimo_Ivertinimas','=',$id_pazymys)->get();
        if($mark[0]->Pazymys!=""){
            Uzsiemimu_ivertinimai::where('id_Uzsiemimo_Ivertinimas', $id_pazymys)->update(['Lankomumas' => "0"]);
        }else{
            Uzsiemimu_ivertinimai::where('id_Uzsiemimo_Ivertinimas','=',$id_pazymys)->delete();
        }
        return redirect('/rodytiivercioforma');
    }

    public function keistiPazymi(){
        $id=request('id');
        Uzsiemimu_ivertinimai::where('id_Uzsiemimo_Ivertinimas', $id)->update(['Pazymys' => request('balas')]);
        return redirect('/rodytiivercioforma');
    }

    public function rodytiforma()
    {
        $t = 0;
        $teacherData = Mokytojai::where('id_Mokytojas', session("id_person"))->get();
        return view('UzsiemimoIvertinimoForma', ['teacherData' => $teacherData], ['t'=>$t]);
    }

    public function pridetiPazimi(){
        $t = 0;
        $teacherData = Mokytojai::where('id_Mokytojas', session("id_person"))->get();
        if(request('action')=="class") {
            $t = request('pamoka');
            $data = Tvarkarascio_uzsiemimai::where('id_Tvarkarascio_Uzsiemimas', $t )->get();
            $uzData = Mokiniai::where('fk_Klase', $data[0]->fk_Klase)->get();
            return view('UzsiemimoIvertinimoForma', ['teacherData' => $teacherData], ['uzData' => $uzData, 't'=>$t] );
        }
        if(request('action')=="add") {
            $mark = new Uzsiemimu_ivertinimai();
            $mark->Pazymys = request('balas');
            $mark->Lankomumas = request('lankomumas');
            $mark->fk_Mokinys = request('mokinys');
            $mark->fk_Tvarkarascio_Uzsiemimas = request('uzsiemimas');
            $mark->save();
            $t=0;
            return view('UzsiemimoIvertinimoForma', ['teacherData' => $teacherData],['t'=>$t]);
        }
        if(request('action')=="marks") {
            $t=-1;
            $data = Tvarkarascio_uzsiemimai::where('id_Tvarkarascio_Uzsiemimas', request('pamoka') )->get();
            $uzData = Mokiniai::where('fk_Klase', $data[0]->fk_Klase)->get();
            return view('UzsiemimoIvertinimoForma', ['teacherData' => $teacherData],['uzData' => $uzData,'t'=>$t, 'data'=>$data]);
        }
        return view('UzsiemimoIvertinimoForma', ['teacherData' => $teacherData],['t'=>$t]);
    }
}
