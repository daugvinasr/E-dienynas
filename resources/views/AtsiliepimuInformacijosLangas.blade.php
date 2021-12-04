@extends('layouts.PagrindisLangasSablonas')

@section('content')
    <section class="container mx-auto p-6 rounded-10">
        <div class="grid place-items-center">
            <div class="w-3/5">
                <div method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <div class="flex flex-col justify-center items-center">
                        <label class=" text-center text-gray-700 text-xl font-bold mb-2">
                            Atsiliepimas Mokiniui: {{$atsiliepimoInformacija[0]->atsiliepimasToMokinys->mokinysToNaudotojas->Vardas}} {{$atsiliepimoInformacija[0]->atsiliepimasToMokinys->mokinysToNaudotojas->Pavarde}}
                            <br>
                            Iš: {{$atsiliepimoInformacija[0]->atsiliepimasToMokytojas->mokytojasToNaudotojas->Vardas}} {{$atsiliepimoInformacija[0]->atsiliepimasToMokinys->mokinysToNaudotojas->Pavarde}}
                        </label>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-l font-bold mb-2">
                            Pavadinimas
                        </label>
                        <input readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="pavadinimas" type="text" value="{{$atsiliepimoInformacija[0]->Pavadinimas}}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-l font-bold mb-2">
                            Atsiliepimo tekstas
                        </label>
                        <textarea readonly class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-40 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="textarea">{{$atsiliepimoInformacija[0]->Aprasymas}}</textarea>
                    </div>
                    <div class="grid place-items-center">
                        <a href="/rodytiAtsiliepimuSarasa/{{$id_mokinys}}" class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            atgal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
