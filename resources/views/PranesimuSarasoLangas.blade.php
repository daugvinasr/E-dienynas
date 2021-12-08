@extends('layouts.PagrindisLangasSablonas')
@section('content')
    <div class="flex pt-20 min-h-screen">
        <div class="col-span-12">
            <a href="/siustipranesima" class="ml-10 bg-teal-900 px-4 py-2 rounded text-white hover:bg-blue-500 text-sm">Siųsti pranešimą</a>
            @if(!$messageData->isEmpty())

                <table class="table text-gray-400  space-y-6 border-2 border-gray-500">
                    <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="p-5">Pavadinimas</th>
                        <th class="p-5">Aprašymas</th>
                        <th class="p-5 text-left">Data</th>
                        <th class="p-5 text-left">Siuntejas</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messageData as $data)
                        <tr class="bg-gray-200 lg:text-black">
                            <td class="p-5 border-2 border-gray-500">{{$data -> Pavadinimas}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data-> Aprasymas}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data-> Data}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data -> pranesimasToNaudotojas -> Vardas}} {{$data -> pranesimasToNaudotojas -> Pavarde}}</td>
                        </tr>
                    @endforeach
                    @else
                        <div class="p-10 cursor-default md:text-1xl text-xl hover:text-red-500 transition duration-200  font-bold text-red-600">
                            Pranešimų nėra.
                        </div>
    @endif
@endsection
