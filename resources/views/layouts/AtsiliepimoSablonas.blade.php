@extends('layouts.PagrindisLangasSablonas')

@section('content')
    <section class="container mx-auto p-6 rounded-10">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg px-2 py-2">
            <div class="flex flex-wrap -mx-3 mb-6">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">@yield('vardasPavardeKomentaras')</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <label>
                        <textarea readonly class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">@yield('komentaras')</textarea>
                    </label>
                    <div class="px-3 py-3 flex flex-row-reverse">
                        <p class="text-gray-700 px-2 text-l">@yield('autoriusKomentaras')</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
