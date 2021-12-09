@extends('layouts.PagrindisLangasSablonas')


@section('content')
    @if(!$userData->isEmpty())
        <div class="flex min-h-screen">
            <div class="col-span-4">
                @foreach($userData as $data)
                    @foreach($data -> toArray() as $column => $value)
                <div class="pl-10 cursor-default md:text-1xl text-sm transition duration-200  font-bold text-black">{{$column}}:</div>
                <div class="pl-12 pt-2 pb-2 cursor-default md:text-1xl text-sm transition duration-200 text-black">{{$value}}</div>
                @endforeach
                @endforeach

        <a href="/naudotojai" class="ml-10 bg-teal-900 px-4 py-2 rounded text-white hover:bg-blue-500 text-sm">Atgal</a>
            </div>
        </div>
    @endif
@endsection
