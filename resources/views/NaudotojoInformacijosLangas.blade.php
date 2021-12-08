@extends('layouts.PagrindisLangasSablonas')


@section('content')
    @if(!$userData->isEmpty())
        <div class="flex pt-20 min-h-screen">
            <div class="col-span-12">
        <div class="pt-10 pl-10 cursor-default md:text-1xl text-xl transition duration-200  font-bold text-black">Vardas:</div>
        <div class="pl-12 pt-2 pb-5 cursor-default md:text-1xl text-xl transition duration-200 text-black">{{$userData[0]->Vardas}}</div>
        <a href="/naudotojai" class="ml-10 bg-teal-900 px-4 py-2 rounded text-white hover:bg-blue-500 text-sm">Atgal</a>
            </div>
        </div>
    @endif
@endsection
