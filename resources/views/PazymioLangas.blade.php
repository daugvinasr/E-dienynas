@extends('layouts.PagrindisLangasSablonas')


@section('content')
    <div class="flex pt-20 min-h-screen">
        <div class="col-span-12">
            <table class="table text-gray-400  space-y-6 border-2 border-gray-500">
                <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="p-5">Balas</th>
                    @if(session('role') == 'mokytojas' && $n!=1)
                        <th class="p-5">Pakeistas balas</th>
                    @endif
                    <th class="p-5 text-left">Data</th>
                    <th class="p-5 text-left">Pamoka</th>
                    <th class="p-5 text-left">Vieta</th>
                    <th class="p-5 text-left">Mokytojas</th>
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
                        <td class="p-5 border-2 border-gray-500">{{$markData[0]->iverinimastvarkarastis->Laikas}} </td>
                        <td class="p-5 border-2 border-gray-500">{{$markData[0]->iverinimastvarkarastis->tvarkarastispamoka->Pavadinimas}} </td>
                        <td class="p-5 border-2 border-gray-500">{{$markData[0]->iverinimastvarkarastis->Vieta}} </td>
                        <td class="p-5 border-2 border-gray-500">{{$markData[0]->iverinimastvarkarastis->tvarkarastispamoka->pamokamokytojas->mokytojasToNaudotojas->Vardas}}
                            {{$markData[0]->iverinimastvarkarastis->tvarkarastispamoka->pamokamokytojas->mokytojasToNaudotojas->Vardas}} </td>
                        @if(session('role') == 'mokytojas')
                            <td class="p-5 border-2 border-gray-500"> <a class="shadow-lg bg-green-700 hover:bg-green-600 text-white rounded-md py-2 px-2" href="/istrintiPazymi/{{$markData[0] -> id_Uzsiemimo_Ivertinimas }}">Ištrinti</a></td>
                           @if($n!=1)
                                 <td class="p-5 border-2 border-gray-500"> <button class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                         Keisti
                                     </button></td>
                                </form>
                            @endif
                        @endif
                    </tr>
                </tbody>
            </table>
            <br>
                    <a href="/balai" class="ml-10 bg-teal-900 px-4 py-2 rounded text-white hover:bg-blue-500 text-sm">Atgal</a>
@endsection
