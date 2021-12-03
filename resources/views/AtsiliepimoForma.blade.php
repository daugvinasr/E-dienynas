@extends('layouts.PagrindisLangasSablonas')

@section('content')
    <section class="container mx-auto p-6 rounded-10">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg px-2 py-2">
            <form method="POST" class="flex flex-wrap -mx-3 mb-6">
                <p class="text-center text-gray-700 font-bold px-2 text-xl">Atsiliepimas: Mokinys {{$atsiliepimoInformacija[0]->atsiliepimasToMokinys->mokinysToNaudotojas->Vardas}} {{$atsiliepimoInformacija[0]->atsiliepimasToMokinys->mokinysToNaudotojas->Pavarde}}</p>
                @csrf
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <label>
                        <textarea name="textarea" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"></textarea>
                    </label>
                    <div class="px-3 py-3 flex flex-row-reverse">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            komentuoti
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
