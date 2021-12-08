@extends('layouts.PagrindisLangasSablonas')
@section('content')

    <div class="grid place-items-center">
        <div class="w-2/4">
            <form method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="flex flex-col justify-center items-center">
                    <label class=" text-center text-gray-700 text-xl font-bold mb-2">
                        registruoti mokytoją
                    </label>
                </div>

                <div class="flex space-x-56 justify-center">
                    <div>


                        <div class="mb-4">
                            <label for="slaptazodis" class="block text-gray-800 font-bold">Slaptažodis:</label>
                            <input name="Slaptazodis" type="password"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Slaptazodis')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Miestas" class="block text-gray-800 font-bold">Miestas:</label>
                            <input name="Miestas" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Miestas')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Telefono_Numeris" class="block text-gray-800 font-bold">Telefono numeris:</label>
                            <input name="Telefono_Numeris" type="number"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Telefono_Numeris')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Asmens_Kodas" class="block text-gray-800 font-bold">Asmens kodas:</label>
                            <input name="Asmens_Kodas" type="number"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Asmens_Kodas')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Gimimo_Data" class="block text-gray-800 font-bold">Gimimo data:</label>
                            <input name="Gimimo_Data" type="date"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Gimimo_Data')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Lytis" class="block text-gray-800 font-bold">Lytis:</label>
                            <input name="Lytis" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Lytis')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Zodiako_Zenklas" class="block text-gray-800 font-bold">Zodiako ženklas:</label>
                            <input name="Zodiako_Zenklas" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Zodiako_Zenklas')
                            {{ $message }}
                            @enderror
                        </div>

                    </div>
                    <div>

                        <div class="mb-4">
                            <label for="Pavarde" class="block text-gray-800 font-bold">Pavardė:</label>
                            <input  name="Pavarde" type="text" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Pavarde')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Amzius" class="block text-gray-800 font-bold">Amžius:</label>
                            <input name="Amzius" type="number"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Amzius')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Galimybiu_Pasas" class="block text-gray-800 font-bold">Galimybių pasas:</label>
                            <input name="Galimybiu_Pasas" type="range" min="0" max="1" value="0"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Galimybiu_Pasas')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Pasto_Kodas" class="block text-gray-800 font-bold">Pašto kodas:</label>
                            <input name="Pasto_Kodas" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Pasto_Kodas')
                            {{ $message }}
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="Gatve" class="block text-gray-800 font-bold">Gatvė:</label>
                            <input name="Gatve" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Gatve')
                            {{ $message }}
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label for="Alga" class="block text-gray-800 font-bold">Alga:</label>
                            <input name="Alga" type="number"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Alga')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Darbo_Patirtis" class="block text-gray-800 font-bold">Darbo patirtis:</label>
                            <input name="Darbo_Patirtis" type="number"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Darbo_Patirtis')
                            {{ $message }}
                            @enderror
                        </div>

                    </div>
                    <div>
                        <div class="mb-4">
                            <label for="Vardas" class="block text-gray-800 font-bold">Vardas:</label>
                            <input name="Vardas" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Vardas')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="El_Pastas" class="block text-gray-800 font-bold">El.Paštas:</label>
                            <input name="El_Pastas" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('El_Pastas')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Issilavinimas" class="block text-gray-800 font-bold">Išsilavinimas:</label>
                            <input name="Issilavinimas" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Issilavinimas')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Idarbinimo_Data" class="block text-gray-800 font-bold">Įdarbinimo data:</label>
                            <input name="Idarbinimo_Data" type="date"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Idarbinimo_Data')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Kabineto_NR" class="block text-gray-800 font-bold">Kabineto numeris:</label>
                            <input name="Kabineto_NR" type="number"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Kabineto_NR')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Ar_Pavaduotoja" class="block text-gray-800 font-bold">Ar pavaduotoja:</label>
                            <input name="Ar_Pavaduotoja" type="range" min="0" max="1" value="0"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Ar_Pavaduotoja')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="Banko_Saskaita" class="block text-gray-800 font-bold">Banko sąskaita:</label>
                            <input name="Banko_Saskaita" type="text" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('Ar_Pavaduotoja')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="grid place-items-center">
                    <button class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        pridėti mokytoja
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
