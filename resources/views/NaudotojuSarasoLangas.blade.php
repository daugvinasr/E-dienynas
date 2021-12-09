@extends('layouts.PagrindisLangasSablonas')
@section('content')

            @if(!$userData->isEmpty())
                <section class="container mx-auto p-6 rounded-10">
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg p-4">
                <table class="w-full">
                    <thead>
                    <tr class="text-md tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                        <th class="p-5">El.paštas</th>
                        <th class="p-5">Vardas</th>
                        <th class="p-5 text-left">Pavardė</th>
                        <th class="p-5 text-left">Pareigos</th>
                        <th colspan="3" class="p-5 text-center">Veiksmai</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach($userData as $data)
                        <tr class="text-gray-700">
                            <td class="p-5 border-2 border-gray-500">{{$data -> El_Pastas}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data-> Vardas}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data-> Pavarde}}</td>
                            <td class="p-5 border-2 border-gray-500">{{$data -> Role}}</td>
                            <td class="p-5 border-2 border-gray-500 hover:bg-blue-300 hover:text-white font-bold"><a href="/placiaunaudotojas?id={{$data -> id_Naudotojas}}">Plačiau</a></td>
                                <td class="p-5 border-2 border-gray-500 text-orange"><a href="/redaguotinaudotoja?id={{$data -> id_Naudotojas}}">Redaguoti</a></td>
                                <td class="p-5 border-2 border-gray-500"><a href="/pasalintinaudotoja?id={{$data -> id_Naudotojas}}">Pašalinti</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    </div>
                    <a href="/pridetiMokini" class="ml-10 bg-teal-900 px-4 py-2 rounded text-white hover:bg-blue-500 text-sm">Pridėti mokinį</a>
                    <a href="/pridetimokytoja" class="ml-10 bg-teal-900 px-4 py-2 rounded text-white hover:bg-blue-500 text-sm">Pridėti mokytoją</a>
                </section>
                    @else
                        <div class="p-10 cursor-default md:text-1xl text-xl hover:text-red-500 transition duration-200  font-bold text-red-600">
                            Naudotojų nėra.
                        </div>
    @endif

@endsection
