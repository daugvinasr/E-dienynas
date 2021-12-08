@extends('layouts.PagrindisLangasSablonas')


@section('content')
    <section class="container mx-auto p-6 rounded-10">
        <div class="w-3/4 mb-8 overflow-hidden rounded-lg shadow-lg px-2 py-2">
                <table class="w-full">
                    <thead>
                    <tr class="text-md tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                        <th class="px-2 py-3 text-center">Pamoka</th>
                        <th class="px-2 py-3 text-center">Data</th>
                        <th class="px-2 py-3 text-center">Laikas</th>
                        <th class="px-2 py-3 text-center">Vieta</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach($tvarkarastisData as $data)
                        <tr class="text-gray-700">
                            <td class="px-2 py-3 text-ms font-semibold border text-center">{{$data-> tvarkarastispamoka -> Pavadinimas}}</td>
                            <td class="px-2 py-3 text-ms font-semibold border text-center">{{$data->Data}}</td>
                            <td class="px-2 py-3 text-ms font-semibold border text-center">{{$data->Laikas}}</td>
                            <td class="px-2 py-3 text-ms font-semibold border text-center">{{$data->Vieta}}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            <div class="flex flex-row-reverse pt-2 p-1">
                <a class="shadow-lg bg-green-700 hover:bg-green-600 text-white rounded-md py-2 px-2" href="/tvarkarastisEksportuoti">Exportuoti tvarkarašti</a>
            </div>
        </div>



    </section>
@endsection
