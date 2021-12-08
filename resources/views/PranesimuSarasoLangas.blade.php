@extends('layouts.PagrindisLangasSablonas')
@section('content')
    <div class="flex pt-20 min-h-screen">
        <div class="col-span-12">
            @if(!$messageData->isEmpty())

                <table class="table text-gray-400  space-y-6 border-2 border-gray-500">
                    <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="p-5">Pavadinimas</th>
                        <th class="p-5">Aprašymas</th>
                        <th class="p-5 text-left">Data</th>
                        <th class="p-5 text-left">Mokytojo ID</th>
                        <th class="p-5 text-left">Mokinio ID</th>
                        <th class="p-5 text-left"></th>
                        <th colspan="3" class="p-5 text-center">Veiksmai</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messageData as $data)
                        <tr class="bg-gray-200 lg:text-black">
                            <td class="p-5 border-2 border-gray-500">{{$data -> Pavadinimas}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data-> Aprasymas}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data-> Data}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data -> fk_Mokytojas}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data -> fk_Mokinys}}</td>
                            <td class="p-5 border-2 border-gray-500 hover:bg-blue-300 hover:text-white font-bold"><a href="/placiaupranesimas?id={{$data -> id_Pranesimas}}">Plačiau</a></td>
                            <td class="p-5 border-2 border-gray-500"><a href="/pasalintipranesima?id={{$data -> id_Pranesimas}}">Pašalinti</a></td>
                        </tr>
                    @endforeach
                    @else
                        <div class="p-10 cursor-default md:text-1xl text-xl hover:text-red-500 transition duration-200  font-bold text-red-600">
                            Pranešimų nėra.
                        </div>
    @endif
@endsection
