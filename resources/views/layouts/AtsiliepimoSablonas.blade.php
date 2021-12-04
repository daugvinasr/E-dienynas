@component('mail::message')
    ### Atsiliepimas Studentui {{$informacija[0]}} {{$informacija[1]}}

    Pavadinimas: {{$informacija[4]}}

    Atsiliepimas: {{$informacija[5]}}

    Mokytojas: {{$informacija[2]}} {{$informacija[3]}}

    {{$informacija[6]}}
@endcomponent




