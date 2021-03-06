@extends('layouts.PagrindisLangasSablonas')


@section('content')
    <section class="container mx-auto p-6 rounded-10">
        <div "w-full mb-8 overflow-hidden rounded-lg shadow-lg p-4">
            <table class="w-full">
                <thead>
                <tr class="text-md tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                    @if($t>0)
                    <th class="p-5 text-center">Balas</th>
                    <th class="p-5 text-center">Lankomumas</th>
                    <th class="p-5 text-center">Mokinys</th>
                        <th class="p-5 text-left"></th>
                    @elseif($t==0)
                    <th class="p-5 text-center">Pamoka / data / vieta / klasė</th>
                        <th class="p-5 text-center">Veiksmai</th>
                    @else
                        <th class="p-5 text-center">Mokinys</th>
                        <th class="p-5 text-center">Įvertinimas</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                    <form method="POST">
                        @csrf
                        @if($t>0)
                        <td class="p-5 border-2 border-gray-500">
                        <select name="balas">
                            <option value=""></option>
                            @foreach (range(1, 10) as $i)
                                <option value={{$i}}
                                >{{ $i }}</option>
                            @endforeach
                        </select></td>
                        <td class="p-5 border-2 border-gray-500">
                        <select name="lankomumas">
                            <option value=0>Dalyvavo</option>
                            <option value=1>Nedalyvavo</option>
                        </select></td>
                        <td class="p-5 border-2 border-gray-500">
                        <select name="mokinys">
                            @foreach ($uzData as $i)
                                <option value={{$i->id_Mokinys}}
                                >{{ $i->mokinysToNaudotojas->Vardas }} {{ $i->mokinysToNaudotojas->Pavarde }}</option>
                            @endforeach
                        </select></td>
                        <input name="uzsiemimas" type="hidden" value={{$t}}>
                        @elseif($t<0)
                            @foreach($uzData as $i)
                            <tr>
                                <td class="p-5 border-2 border-gray-500"> {{ $i->mokinysToNaudotojas->Vardas }} {{ $i->mokinysToNaudotojas->Pavarde }}</td>
                                <td class="p-5 border-2 border-gray-500">
                                @foreach($data[0]->tvarkarastisIvertinimas as $idata)
                                    @if($idata->fk_Mokinys==$i->id_Mokinys)
                                        @if($idata->Pazymys!="")
                                            <a href="/baloinformacija?id={{$idata -> id_Uzsiemimo_Ivertinimas }}">{{$idata -> Pazymys}}</a>
                                        @endif
                                        @if($idata->Lankomumas==1)
                                            <a href="/ninformacija?id={{$idata -> id_Uzsiemimo_Ivertinimas }}">n</a>
                                        @endif
                                    @endif
                                @endforeach
                                </td>
                                @endforeach
                        @else
                        <td class="p-5 border-2 border-gray-500">
                        <select name="pamoka">
                            @foreach ($teacherData[0]->mokytojasPamoka as $i)
                                @foreach ($i->pamokaTvarkarastis as $j)
                                    <option value={{$j->id_Tvarkarascio_Uzsiemimas}}
                                    >{{ $i->Pavadinimas }} {{ $j->Data }} {{ $j->Laikas }} {{ $j->Vieta }} {{ $j->tvarkarastisToKlase->Pavadinimas }}</option>
                                @endforeach
                            @endforeach
                        </select></td>
                        @endif
                    @if($t>0)
                            <td class="p-5 border-2 border-gray-500">
                        <button class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="action" value="add">
                            Pridėti
                        </button>
                            </td>
                    @elseif($t==0)
                            <td class="p-5 border-2 border-gray-500">
                        <button class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="action" value="class">
                            Pridėti
                        </button>
                        <button class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="action" value="marks">
                            Rodyti įvertinimus
                        </button>
                            </td>
                    @endif
                </form>
                </tr>
                </tbody>
            </table>
            @if($t>0)
                <br>
                <a href="/rodytiivercioforma" class="ml-10 bg-teal-900 px-4 py-2 rounded text-white hover:bg-blue-500 text-sm">Atgal</a>
            @endif
@endsection
