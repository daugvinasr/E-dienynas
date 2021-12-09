@extends('layouts.PagrindisLangasSablonas')


@section('content')


    <section class="container mx-auto p-6 rounded-10">
        <h style="font-size:36px"><strong>{{$classData[0]->Pavadinimas}}</strong></h>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg p-4">
            <table class="w-full">
                <thead>
                <tr  class="text-md tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                    <th class="p-5 text-center">Balai</th>
                    <th class="p-5 text-center">Papildomi balai</th>
                    <th class="p-5 text-center">Vidurkis</th>
                    <th class="p-5 text-center">Veiksmai</th>
                </tr>
                </thead>
                <tbody>
                    <tr class="bg-gray-200 lg:text-black">
                        <td class="p-5 border-2 border-gray-500">
                            @foreach($classData[0]->pamokaTvarkarastis as $tdata)
                                @foreach($tdata->tvarkarastisIvertinimas as $idata)
                                    @if($idata->fk_Mokinys==session('id_student'))
                                        {{$idata -> Pazymys}}
                                    @endif
                                @endforeach
                            @endforeach
                        </td>
                        <td class="p-5 border-2 border-gray-500">
                            <form method="POST">
                                @csrf
                                <select name="first">
                                    <option value=""></option>
                                    @foreach (range(1, 10) as $i)
                                        <option value={{$i}}
                                        >{{ $i }}</option>
                                    @endforeach
                                </select>
                                <select name="second">
                                    <option value=""></option>
                                    @foreach (range(1, 10) as $i)
                                        <option value={{$i}}
                                        >{{ $i }}</option>
                                    @endforeach
                                </select>
                                <select name="third">
                                    <option value=""></option>
                                    @foreach (range(1, 10) as $i)
                                        <option value={{$i}}
                                        >{{ $i }}</option>
                                    @endforeach
                                </select>
                                <select name="fourth">
                                    <option value=""></option>
                                    @foreach (range(1, 10) as $i)
                                        <option value={{$i}}
                                        >{{ $i }}</option>
                                    @endforeach
                                </select>

                            @if($vid==null)
                            <td class="p-5 border-2 border-gray-500">{{ App\Http\Controllers\UzsiemimoIvertinimasController::vidurkis($classData[0]) }}</td>
                            @else
                                <td class="p-5 border-2 border-gray-500">{{$vid}}</td>
                            @endif
                                <td class="p-5 border-2 border-gray-500">
                                    <button class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                        Skaičiuoti
                                    </button>
                                </td>
                        </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <a href="/balai" class="ml-10 bg-teal-900 px-4 py-2 rounded text-white hover:bg-blue-500 text-sm">Atgal</a>
@endsection
