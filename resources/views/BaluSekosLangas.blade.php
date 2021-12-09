@extends('layouts.PagrindisLangasSablonas')

@section('content')
    <section class="container mx-auto p-6 rounded-10">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg p-4">
            <table class="w-full">
                <thead>
                <tr class="text-md tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                    <th class="p-5 text-center">Pamoka</th>
                    <th class="p-5 text-center">Balai</th>
                    <th class="p-5 text-center">Vidurkis</th>
                    <th class="p-5 text-center">Skaičiuoti balą</th>
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
                        <td class="p-5 border-2 border-gray-500"><a href="/skaiciuotibala?pamoka={{$data -> id_Pamoka }}"><b>Skaičiuoti</b></a></td>
                    </tr>
                @endforeach
@endsection
