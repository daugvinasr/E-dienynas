@extends('layouts.PagrindisLangasSablonas')
@section('content')
    <div class="flex pt-20 min-h-screen">
        <div class="col-span-12">
            @if(session('role')=="mokytojas")
                <a href="/pridetinamudarba" class="ml-10 bg-teal-900 px-4 py-2 rounded text-white hover:bg-blue-500 text-sm">Pridėti namų darbą</a>
            @endif
    @if(!$homeworkData->isEmpty())

                <table class="table text-gray-400  space-y-6 border-2 border-gray-500">
                    <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="p-5">Dalykas</th>
                        <th class="p-5">Pavadinimas</th>
                        <th class="p-5 text-left">Įrašymo data</th>
                        <th class="p-5 text-left">Atlikti iki</th>
                        <th class="p-5 text-left"></th>
                        @if(session('role')=="mokytojas")
                            <th colspan="2" class="p-5 text-center">Veiksmai</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($homeworkData as $data)
                        <tr class="bg-gray-200 lg:text-black">
                           <td class="p-5 border-2 border-gray-500">{{$data -> pamokaName}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data-> Pavadinimas}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data-> Data}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data -> Atlikti_Iki}}</td>
                            <td class="p-5 border-2 border-gray-500 hover:bg-blue-300 hover:text-white font-bold"><a href="/placiaunamudarbas?id={{$data -> id_Namu_Darbas}}">Plačiau</a></td>
                            @if(session('role')=="mokytojas")
                                <td class="p-5 border-2 border-gray-500 text-orange"><a href="/redaguotinamudarbas?id={{$data -> id_Namu_Darbas}}">Redaguoti</a></td>
                                <td class="p-5 border-2 border-gray-500"><a href="/pasalintinamudarbas?id={{$data -> id_Namu_Darbas}}">Pašalinti</a></td>
                            @endif
                        </tr>
                    @endforeach
                    @else
                        <div class="p-10 cursor-default md:text-1xl text-xl hover:text-red-500 transition duration-200  font-bold text-red-600">
                            Neturite namų darbų. :)
                        </div>
    @endif
@endsection
