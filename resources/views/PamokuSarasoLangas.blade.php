@extends('layouts.PagrindisLangasSablonas')


@section('content')
<br>
    <table class="w-full">
        <thead>
        <tr class="text-md tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3 text-center">Pavadinimas</th>
            <th class="px-4 py-3 text-center">Kalba</th>
            <th class="px-4 py-3 text-center">Aprašymas</th>
            <th class="px-4 py-3 text-center">Trukmė</th>
            <th class="px-4 py-3 text-center">Mokytojas</th>
            <th class="px-4 py-3 text-center">Ištrinti</th>
            <th class="px-4 py-3 text-center">Redaguoti</th>
        </tr>
        </thead>
        <tbody class="bg-white">
        @foreach($VisosPamokos as $data)
            <tr class="text-gray-700">
                <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->Pavadinimas}}</td>
                <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->Kalba}}</td>
                <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->Aprasymas}}</td>
                <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->Trukme}}</td>
                <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->pamokamokytojas->mokytojasToNaudotojas->Vardas}}</td>
                <br>

                <td class="px-4 py-3 text-ms font-semibold border text-center " style="color:red"><a href="/pasalintiPamoka?id={{$data -> id_Pamoka}}">Pašalinti</a></td>
                <td class="px-4 py-3 text-ms font-semibold border text-center"  style="color:red"><a href="/redaguotiPamoka?id={{$data -> id_Pamoka}}">Redaguoti</a></td>
            </tr>
                @endforeach
            </tr>
        </tbody>
    </table>


    <div class="justify-center ">
        <div class="ml-96 py-6 px-8 h-120 w-80 mt-20 bg-white rounded shadow-xl">
            <form method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-800 font-bold">Pavadinimas:</label>
                    <input name="Pavadinimas" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('Pavadinimas')
                    {{ $message }}
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-800 font-bold">Kalba</label>
                    <input  name="Kalba" type="text" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('Kalba')
                    {{ $message }}
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-800 font-bold">Aprasymas</label>
                    <input name="Aprasymas" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('Aprasymas')
                    {{ $message }}
                    @enderror
                </div>



                <div class="mb-4">
                    <label for="email" class="block text-gray-800 font-bold">Trukme</label>
                    <input name="Trukme" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('Trukme')
                    {{ $message }}
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-800 font-bold">Mokytojas:</label>
                    <select id="fk_Mokytojas" name="fk_Mokytojas">
                        @foreach($VisiMokytojai as $data2)
                            <option value="{{$data2->id_Mokytojas}}">{{$data2->mokytojasToNaudotojas->Vardas}}</option>
                        @endforeach
                    </select>
                    @error('fk_Mokytojas')
                    {{ $message }}
                    @enderror
                </div>

                <button class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded " type="submit">Pridėti pamoką</button>
            </form>
        </div>
    </div>

@endsection
