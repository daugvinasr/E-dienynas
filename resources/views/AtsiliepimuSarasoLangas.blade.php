@extends('layouts.PagrindisLangasSablonas')


@section('content')

    @if(session('role') == 'mokinys')
        @if(!$atsiliepimoInformacija->isEmpty())
            <section class="container mx-auto p-6 rounded-10">
                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg p-4">
                    <div class="w-full">
                        <div class="flex flex-col justify-center items-center">
                            <label class=" text-center text-gray-700 text-xl font-bold mb-2">
                                Atsiliepimai Mokinio:
                                <br> {{$atsiliepimoInformacija[0]->AtsiliepimasToMokinys->mokinysToNaudotojas->Vardas}} {{$atsiliepimoInformacija[0]->AtsiliepimasToMokinys->mokinysToNaudotojas->Pavarde}}
                            </label>

                            {{--                            @if(session('role') == 'mokytojas')--}}
                            {{--                                <a class="shadow-lg bg-green-700 hover:bg-green-600 text-white rounded-md py-2 px-2" href="/rodytiAtsiliepimoForma/{{$id_mokinys}}">Pridėti Atsiliepimą</a>--}}
                            {{--                            @endif--}}
                            <br>


                        </div>
                        <table class="w-full">
                            <thead>
                            <tr class="text-md tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3 text-center">ID</th>
                                <th class="px-4 py-3 text-center">Pavadinimas</th>
                                <th class="px-4 py-3 text-center">Data</th>
                                <th class="px-4 py-3 text-center">Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            @foreach($atsiliepimoInformacija as $data)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->id_Atsiliepimas}}</td>
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->Pavadinimas}}</td>
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->Data}}</td>
                                    <td class="px-4 text-ms font-semibold border text-center">
                                        <a class="shadow-lg bg-green-700 hover:bg-green-600 text-white rounded-md py-2 px-2" href="/rodytiAtsiliepima/{{$data->id_Atsiliepimas}}">Peržiurėti</a>
                                        {{--                                        @if(session('role') == 'mokytojas')--}}
                                        {{--                                            <a class="shadow-lg bg-green-700 hover:bg-green-600 text-white rounded-md py-2 px-2" href="/istrintiAtsiliepima/{{$data->id_Atsiliepimas}}/{{$id_mokinys}}">Ištrinti</a>--}}
                                        {{--                                            <a class="shadow-lg bg-green-700 hover:bg-green-600 text-white rounded-md py-2 px-2" href="/rodytiRedagavimoAtsiliepimoForma/{{$data->id_Atsiliepimas}}/{{$id_mokinys}}">Redaguoti</a>--}}
                                        {{--                                            <a class="shadow-lg bg-green-700 hover:bg-green-600 text-white rounded-md py-2 px-2" href="/siustiAtsiliepima/{{$data->id_Atsiliepimas}}/{{$id_mokinys}}">Siusti Laiška su Atsiliepimu</a>--}}
                                        {{--                                        @endif--}}

                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        @else
            <section class="container mx-auto p-6 rounded-10">
                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg p-4">
                    <div class="w-full">
                        <div class="flex flex-col justify-center items-center">
                            <label class=" text-center text-gray-700 text-xl font-bold mb-2">
                                Atsiliepimu nera
                            </label>
                            {{--                            @if(session('role') == 'mokytojas')--}}
                            {{--                                <a class="shadow-lg bg-green-700 hover:bg-green-600 text-white rounded-md py-2 px-2" href="/rodytiAtsiliepimoForma/{{$id_mokinys}}">Pridėti Atsiliepimą</a>--}}
                            {{--                            @endif--}}
                            <br>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif

    @if((session('role') == 'mokytojas' || session('role') == 'administratorius') && !isset($studentoID) )
        <section class="container mx-auto p-6 rounded-10">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg p-4">
                <div class="w-full">
                    <div class="flex flex-col justify-center items-center">
                        <h1>Pasirinkite norimą mokinį</h1>
                        <form method="POST">
                            @csrf
                            <div class="p-5">
                                <select name="selectedStudentas" id="selectedStudentas">
                                    @foreach($mokiniuInformacija as $data)--}}
                                    <option value="{{$data->id_Mokinys}}">{{$data->mokinysToNaudotojas->Vardas}} {{$data->mokinysToNaudotojas->Pavarde}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Rodyti atsiliepimus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    @endif

    @if((session('role') == 'mokytojas' || session('role') == 'administratorius') && isset($studentoID))

        @if(!$atsiliepimoInformacija->isEmpty())
            <section class="container mx-auto p-6 rounded-10">
                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg p-4">
                    <div class="w-full">
                        <div class="flex flex-col justify-center items-center">
                            <label class=" text-center text-gray-700 text-xl font-bold mb-2">
                                Atsiliepimai Mokinio:
                                <br> {{$atsiliepimoInformacija[0]->AtsiliepimasToMokinys->mokinysToNaudotojas->Vardas}} {{$atsiliepimoInformacija[0]->AtsiliepimasToMokinys->mokinysToNaudotojas->Pavarde}}
                            </label>

                            <a class="shadow-lg bg-green-700 hover:bg-green-600 text-white rounded-md py-2 px-2" href="/rodytiAtsiliepimoForma/{{$studentoID}}">Pridėti Atsiliepimą</a>
                            <br>


                        </div>
                        <table class="w-full">
                            <thead>
                            <tr class="text-md tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3 text-center">ID</th>
                                <th class="px-4 py-3 text-center">Pavadinimas</th>
                                <th class="px-4 py-3 text-center">Data</th>
                                <th class="px-4 py-3 text-center">Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            @foreach($atsiliepimoInformacija as $data)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->id_Atsiliepimas}}</td>
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->Pavadinimas}}</td>
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->Data}}</td>
                                    <td class="px-4 text-ms font-semibold border text-center">
                                        <a class="shadow-lg bg-green-700 hover:bg-green-600 text-white rounded-md py-2 px-2" href="/rodytiAtsiliepima/{{$data->id_Atsiliepimas}}">Peržiurėti</a>
                                        <a class="shadow-lg bg-green-700 hover:bg-green-600 text-white rounded-md py-2 px-2" href="/istrintiAtsiliepima/{{$data->id_Atsiliepimas}}">Ištrinti</a>
                                        <a class="shadow-lg bg-green-700 hover:bg-green-600 text-white rounded-md py-2 px-2" href="/rodytiRedagavimoAtsiliepimoForma/{{$data->id_Atsiliepimas}}">Redaguoti</a>
                                        <a class="shadow-lg bg-green-700 hover:bg-green-600 text-white rounded-md py-2 px-2" href="/siustiAtsiliepima/{{$data->id_Atsiliepimas}}">Siusti Laiška su Atsiliepimu</a>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        @endif
    @endif




@endsection
