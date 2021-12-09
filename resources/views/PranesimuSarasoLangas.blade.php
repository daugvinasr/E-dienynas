@extends('layouts.PagrindisLangasSablonas')
@section('content')

            @if(!$messageData->isEmpty())
                <section class="container mx-auto p-6 rounded-10">
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg p-4">
                        <table class="w-full">
                            <thead>
                            <tr class="text-md tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                        <th class="p-5 text-center">Pavadinimas</th>
                        <th class="p-5 text-center">Aprašymas</th>
                        <th class="p-5 text-center">Data</th>
                        <th class="p-5 text-center">Siuntejas</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach($messageData as $data)
                        <tr class="bg-gray-200 lg:text-black">
                            <td class="p-5 border-2 border-gray-500">{{$data -> Pavadinimas}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data-> Aprasymas}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data-> Data}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data -> pranesimasToNaudotojas -> Vardas}} {{$data -> pranesimasToNaudotojas -> Pavarde}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    </div>
                    <form action="/siustipranesima">
                        <button class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="action" value="marks">
                            Siųsti pranešimą
                        </button>
                    </form>
                </section>
                    @else
                        <div class="p-10 cursor-default md:text-1xl text-xl hover:text-red-500 transition duration-200  font-bold text-red-600">
                            Pranešimų nėra.
                        </div>
            @endif

@endsection
