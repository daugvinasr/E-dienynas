@extends('layouts.PagrindisLangasSablonas')
@section('content')
    <div class="flex pt-20 min-h-screen">
        <div class="col-span-12">
            @if(session('role')=="mokytojas")
                <a href="/pridetinaudotoja" class="ml-10 bg-teal-900 px-4 py-2 rounded text-white hover:bg-blue-500 text-sm">Pridėti naudotoją</a>
                <a href="/pridetimokytoja" class="ml-10 bg-teal-900 px-4 py-2 rounded text-white hover:bg-blue-500 text-sm">Pridėti mokytoją</a>

            @endif
            @if(!$userData->isEmpty())

                <table class="table text-gray-400  space-y-6 border-2 border-gray-500">
                    <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="p-5">El.paštas</th>
                        <th class="p-5">Vardas</th>
                        <th class="p-5 text-left">Pavardė</th>
                        <th class="p-5 text-left">Pareigos</th>
                        <th class="p-5 text-left"></th>
                        @if(session('role')=="mokytojas")
                            <th colspan="3" class="p-5 text-center">Veiksmai</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userData as $data)
                        <tr class="bg-gray-200 lg:text-black">
                            <td class="p-5 border-2 border-gray-500">{{$data -> El_Pastas}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data-> Vardas}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data-> Pavarde}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data -> Role}}</td>
                            <td class="p-5 border-2 border-gray-500"><a href="/siustipranesima?id={{$data -> id_Naudotojas}}">Siųsti pranešimą</a></td>
                            @if(session('role')=="mokytojas")
                                <td class="p-5 border-2 border-gray-500 hover:bg-blue-300 hover:text-white font-bold"><a href="/placiaunaudotojas?id={{$data -> id_Naudotojas}}">Plačiau</a></td>
                                <td class="p-5 border-2 border-gray-500 text-orange"><a href="/redaguotinaudotoja?id={{$data -> id_Naudotojas}}">Redaguoti</a></td>
                                <td class="p-5 border-2 border-gray-500"><a href="/pasalintinaudotoja?id={{$data -> id_Naudotojas}}">Pašalinti</a></td>
                            @endif
                        </tr>
                    @endforeach
                    @else
                        <div class="p-10 cursor-default md:text-1xl text-xl hover:text-red-500 transition duration-200  font-bold text-red-600">
                            Naudotojų nėra.
                        </div>
    @endif
@endsection
