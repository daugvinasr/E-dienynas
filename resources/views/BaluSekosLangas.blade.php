@extends('layouts.PagrindisLangasSablonas')

@section('content')
    <div class="flex pt-20 min-h-screen">
        <div class="col-span-12">
            <table class="table text-gray-400  space-y-6 border-2 border-gray-500">
                <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="p-5">Pamoka</th>
                    <th class="p-5 text-left">Balai</th>
                    <th class="p-5 text-left">Vidurkis</th>
                    <th class="p-5 text-left">Skaičiuoti bala</th>
                </tr>
                </thead>
                <tbody>
                @foreach($classData as $data)
                    <tr class="bg-gray-200 lg:text-black">
                        <td class="p-5 border-2 border-gray-500">{{$data -> Pavadinimas}}</td>
                        <td class="p-5 border-2 border-gray-500">
                        @foreach($data->pamokaTvarkarastis as $tdata)
                            @foreach($tdata->tvarkarastisIvertinimas as $idata)
                                @if($idata->fk_Mokinys==session('id_student'))
                                        @if($idata->Pazymys!="")
                                            <a href="/baloinformacija?id={{$idata -> id_Uzsiemimo_Ivertinimas }}">{{$idata -> Pazymys}}</a>
                                        @endif
                                        @if($idata->Lankomumas==1)
                                            <a href="/ninformacija?id={{$idata -> id_Uzsiemimo_Ivertinimas }}">n</a>
                                        @endif
                                  @endif
                            @endforeach
                        @endforeach
                        </td>
                        <td class="p-5 border-2 border-gray-500">{{ App\Http\Controllers\UzsiemimoIvertinimasController::vidurkis($data) }}</td>
                        <td class="p-5 border-2 border-gray-500"><a href="/skaiciuotibala?pamoka={{$data -> id_Pamoka }}">Skaičioti</a></td>
                    </tr>
                @endforeach
@endsection
