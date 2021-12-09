@extends('layouts.PagrindisLangasSablonas')


@section('content')
    <section class="container mx-auto p-6 rounded-10">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg p-4">
            <table class="w-full">
                <thead>
                <tr class="text-md tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                    <th class="p-5">Balas</th>
                    @if(session('role') == 'mokytojas' && $n!=1)
                        <th class="p-5">Pakeistas balas</th>
                    @endif
                    <th class="p-5 text-center">Data</th>
                    <th class="p-5 text-center">Pamoka</th>
                    <th class="p-5 text-center">Vieta</th>
                    <th class="p-5 text-center">Mokytojas</th>
                    <th class="p-5 text-center">Mokinys</th>
                </tr>
                </thead>
                <tbody>
                    <tr class="bg-gray-200 lg:text-black">
                        @if($n==1)
                            <td class="p-5 border-2 border-gray-500">n</td>
                        @else
                            <td class="p-5 border-2 border-gray-500">{{$markData[0] -> Pazymys}}</td>
                        @endif
                        @if(session('role') == 'mokytojas' && $n!=1)
                                <form method="POST">
                                <td class="p-5 border-2 border-gray-500">
                                    @csrf
                                    <select name="balas">
                                        @foreach (range(1, 10) as $i)
                                            <option value={{$i}}
                                            >{{ $i }}</option>
                                        @endforeach
                                    </select>
                                </td>
                        @endif
                        <td class="p-5 border-2 border-gray-500">{{$markData[0]->iverinimastvarkarastis->Data}} </td>
                        <td class="p-5 border-2 border-gray-500">{{$markData[0]->iverinimastvarkarastis->tvarkarastispamoka->Pavadinimas}} </td>
                        <td class="p-5 border-2 border-gray-500">{{$markData[0]->iverinimastvarkarastis->Vieta}} </td>
                        <td class="p-5 border-2 border-gray-500">{{$markData[0]->iverinimastvarkarastis->tvarkarastispamoka->pamokamokytojas->mokytojasToNaudotojas->Vardas}}
                            {{$markData[0]->iverinimastvarkarastis->tvarkarastispamoka->pamokamokytojas->mokytojasToNaudotojas->Vardas}} </td>
                        <td class="p-5 border-2 border-gray-500">{{$markData[0]->iverinimasMokinys->mokinysToNaudotojas->Vardas}}  {{$markData[0]->iverinimasMokinys->mokinysToNaudotojas->Pavarde}}</td>
                        @if(session('role') == 'mokytojas')
                           @if($n!=1)
                                    <td class="p-5 border-2 border-gray-500"> <a class="shadow-lg bg-green-700 hover:bg-green-600 text-white rounded-md py-2 px-2" href="/istrintiPazymi/{{$markData[0] -> id_Uzsiemimo_Ivertinimas }}">Ištrinti</a></td>
                                    <td class="p-5 border-2 border-gray-500"> <button class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                         Keisti
                                     </button></td>
                                </form>
                            @else
                                <td class="p-5 border-2 border-gray-500"> <a class="shadow-lg bg-green-700 hover:bg-green-600 text-white rounded-md py-2 px-2" href="/istrintiLankomuma/{{$markData[0] -> id_Uzsiemimo_Ivertinimas }}">Ištrinti</a></td>
                            @endif
                        @endif
                    </tr>
                </tbody>
            </table>
            <br>
            @if(session('role') == 'mokytojas')
                <a href="/rodytiivercioforma" class="ml-10 bg-teal-900 px-4 py-2 rounded text-white hover:bg-blue-500 text-sm">Atgal</a>
            @elseif(session('role') == 'mokinys')
            <a href="/balai" class="ml-10 bg-teal-900 px-4 py-2 rounded text-white hover:bg-blue-500 text-sm">Atgal</a>
            @endif
@endsection
