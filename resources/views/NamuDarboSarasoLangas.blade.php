@extends('layouts.PagrindisLangasSablonas')
@section('content')


    @if(!$homeworkData->isEmpty())
        <section class="container mx-auto p-6 rounded-10">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg p-4">
                <table class="w-full">
                    <thead>
                    <tr class="text-md tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                        <th class="p-5 text-center">Dalykas</th>
                        <th class="p-5 text-center">Pavadinimas</th>
                        <th class="p-5 text-center">Įrašymo data</th>
                        <th class="p-5 text-center">Atlikti iki</th>
                        <th class="p-5 text-center"></th>
                        @if(session('role')=="mokytojas")
                            <th colspan="3" class="p-5 text-center">Veiksmai</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody class="bg-white">
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
                                <td class="p-5 border-2 border-gray-500"><a href="/primintinamudarba?id={{$data -> id_Namu_Darbas}}">Priminti</a></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if(session('role')=="mokytojas")
                <form action="/pridetinamudarba">
                    <button class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="action" value="marks">
                        Pridėti namų darbą
                    </button>
                </form>
            @endif
        </section>

    @else
        <div class="p-10 cursor-default md:text-1xl text-xl hover:text-red-500 transition duration-200  font-bold text-red-600">
            Neturite namų darbų. :)
        </div>
    @endif



@endsection
