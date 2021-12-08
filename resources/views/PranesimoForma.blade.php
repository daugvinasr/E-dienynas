@extends('layouts.PagrindisLangasSablonas')
@section('content')
    <div class="h-screen bg-gray-100 justify-center">
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
                    <label for="name" class="block text-gray-800 font-bold">Aprašymas:</label>
                    <input  name="Aprasymas" type="text" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('Aprasymas')
                    {{ $message }}
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-800 font-bold">Papildoma informacija:</label>
                    <input name="Papildoma_Informacija" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('Atlikti_Iki')
                    {{ $message }}
                    @enderror
                </div>
                @if(session('role')=="mokytojas")
                <div class="mb-4">
                    <label for="email" class="block text-gray-800 font-bold">Mokinys:</label>
                    <select id="fk_Mokinys" name="fk_Mokinys">
                        @foreach($userData as $data)
                        <option value="{{$data -> id_Naudotojas}}">{{$data -> Vardas}}</option>
                        @endforeach
                    </select>
                    @error('fk_Mokinys')
                    {{ $message }}
                    @enderror
                </div>
                    <input type="hidden" name="fk_Mokytojas" value="{{session('id_person')}}" />
                    <button class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded " type="submit">Siųsti pranešimą</button>
                @elseif(session('role')=="mokinys")
                    <div class="mb-4">
                        <label for="email" class="block text-gray-800 font-bold">Mokytojas:</label>
                        <select id="fk_Mokytojas" name="fk_Mokytojas">
                            @foreach($userData as $data)
                                <option value="{{$data -> id_Naudotojas}}">{{$data -> Vardas}}</option>
                            @endforeach
                        </select>
                        @error('fk_Mokytojas')
                        {{ $message }}
                        @enderror
                    </div>
                    <input type="hidden" name="fk_Mokinys" value="{{session('id_person')}}" />
                    <button class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded " type="submit">Siųsti pranešimą</button>
                @endif

            </form>
        </div>
    </div>
@endsection
