@extends('layouts.PagrindisLangasSablonas')
@section('content')
    <div class="h-screen bg-gray-100 justify-center">
        <div class="ml-96 py-6 px-8 h-120 w-80 mt-20 bg-white rounded shadow-xl">
            <form method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-800 font-bold">Pavadinimas:</label>
                    <input value="{{$homeworkData[0]->Pavadinimas}}" name="Pavadinimas" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('Pavadinimas')
                    {{ $message }}
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-800 font-bold">Aprašymas:</label>
                    <input value="{{$homeworkData[0]->Aprasymas}}" name="Aprasymas" type="text" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('Aprasymas')
                    {{ $message }}
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-800 font-bold">Atlikti Iki:</label>
                    <input value="{{$homeworkData[0]->Atlikti_Iki}}" name="Atlikti_Iki" type="date"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('Atlikti_Iki')
                    {{ $message }}
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-800 font-bold">Užsiemimas:</label>
                    <select id="fk_Tvarkarascio_Uzsiemimas" name="fk_Tvarkarascio_Uzsiemimas">
                        <option value="{{$uzsiemimasData[0]->id_Tvarkarascio_Uzsiemimas}}">{{$uzsiemimasData[0]->id_Tvarkarascio_Uzsiemimas}}</option>
                        @foreach($uzsiemimaiData as $data)
                            <option value="{{$data -> id_Tvarkarascio_Uzsiemimas}}">{{$data -> id_Tvarkarascio_Uzsiemimas}}</option>
                        @endforeach
                    </select>
                    @error('fk_Tvarkarascio_Uzsiemimas')
                    {{ $message }}
                    @enderror
                </div>

                <button class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded " type="submit">Redaguoti namų darbą</button>
            </form>
        </div>
    </div>
@endsection
