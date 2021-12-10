@extends('layouts.PagrindisLangasSablonas')
@section('content')
    <div class="h-screen bg-gray-100 justify-center">
        <div class="ml-96 py-6 px-8 h-120 w-80 mt-20 bg-white rounded shadow-xl">
            <form method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-800 font-bold">Pavadinimas:</label>
                    <input value="{{$userData[0]->Pavadinimas}}" name="Pavadinimas" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('Pavadinimas')
                    {{ $message }}
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-800 font-bold">Kalba</label>
                    <input value="{{$userData[0]->Kalba}}" name="Kalba" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('Kalba')
                    {{ $message }}
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-800 font-bold">Aprašymas:</label>
                    <input value="{{$userData[0]->Aprasymas}}" name="Aprasymas" type="text" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('Aprasymas')
                    {{ $message }}
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-800 font-bold">Trukmė:</label>
                    <input value="{{$userData[0]->Trukme}}" name="Trukme" type="text" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
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

                <button class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded " type="submit">Redaguoti pamoką</button>
            </form>
        </div>
    </div>
@endsection
