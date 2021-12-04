<?php

namespace App\Http\Controllers;

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
        foreach($data->pamokaTvarkarastis() as $tdata) {
            foreach ($tdata->tvarkarastisIvertinimas() as $idata){
                if ($idata->fk_Mokinys == session('id_student')) {
                    {
                        $sk+=$idata->Pazymys;
                        $nr++;
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
        foreach($classData[0]->pamokaTvarkarastis() as $tdata) {
            foreach ($tdata->tvarkarastisIvertinimas() as $idata){
                if ($idata->fk_Mokinys == session('id_student')) {
                    {
                        $sk+=$idata->Pazymys;
                        $nr++;
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
}
