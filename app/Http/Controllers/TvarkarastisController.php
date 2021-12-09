<?php

namespace App\Http\Controllers;

use App\Models\Tvarkarascio_uzsiemimai;
use Illuminate\Http\Request;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;
use DateTime;
use DateTimeZone;

class TvarkarastisController extends Controller
{
    public function showTvarkarastis(){
            $tvarkarastisData = Tvarkarascio_uzsiemimai::where('Data','>=',date('y-m-d'))->where('fk_Klase',session('id_klase'))->orderBy('Data')->orderBy('Laikas')->get();
            return view('TvarkarasioInformacijosLangas',['tvarkarastisData'=>$tvarkarastisData]);
    }

    public function tvarkarastisEksportuoti()
    {
        $tvarkarastisData = Tvarkarascio_uzsiemimai::where('Data','>=',date('y-m-d'))->where('fk_Klase',session('id_klase'))->orderBy('Data')->orderBy('Laikas')->get();

        $calendar = Calendar::create('E-Dienynas');
        foreach ($tvarkarastisData as $data)
        {
            $calendar->event(Event::create($data->tvarkarastispamoka->Pavadinimas)->startsAt(new DateTime($data->Data." ".$data->Laikas,new DateTimeZone('Europe/Vilnius')))->address($data->Vieta));
        }

        return response($calendar->get(), 200, [
            'Content-Type' => 'text/calendar',
            'Content-Disposition' => 'attachment; filename="tvarkarastis.ics"',
            'charset' => 'utf-8',
        ]);


    }
}
