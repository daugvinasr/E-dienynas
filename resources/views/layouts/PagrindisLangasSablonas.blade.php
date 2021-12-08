<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>

<!-- component -->
<!DOCTYPE html>
<html class="h-full" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="./tailwind.css"/>
    <title>Chi Desk</title>
    <style>
        html {
            font-size: 14px;
            line-height: 1.285;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
            Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Arial,
            sans-serif;
        }

        html, body {
            width: 100%;
            height: 100%;
        }

        /* can be configured in tailwind.config.js */
        .group:hover .group-hover\:block {
            display: block;
        }

        .focus\:cursor-text:focus {
            cursor: text;
        }

        .focus\:w-64:focus {
            width: 16rem;
        }

        /* zendesk styles */
        .h-16 {
            height: 50px;
        }

        .bg-teal-900 {
            background: #03363d;
        }

        .bg-gray-100 {
            background: #f8f9f9;
        }

        .hover\:border-green-500:hover {
            border-color: #78a300;
        }
    </style>
</head>

<body class="antialiased h-full">

<div class="h-full w-full flex antialiased text-gray-800 bg-white">
    <!-- section body side nav -->
    <nav aria-label="side bar" aria-orientation="vertical" class="flex-none flex flex-col items-center text-center bg-teal-900 text-gray-400 border-r">
        <div class="h-16 flex items-center w-full">
            <img class="h-8 w-8 mx-auto" src="https://i.imgur.com/q7dPshl.png"/>
        </div>

        <ul>
            <li>
                <a title="Pagrindinis" href="/" class="h-16 px-6 flex items-center hover:text-white w-full">
                    <i class="mx-auto">
                        <h1>Pagrindinis</h1>
                    </i>
                </a>
            </li>
            <li>
            @if(session('role') == 'mokinys')
            <li>
                <a title="Atsiliepimai" href="/rodytiAtsiliepimuSarasa/{{session('id_person')}}" class="h-16 px-6 flex items-center hover:text-white w-full">
                    <i class="mx-auto">
                        <h1>Atsiliepimai</h1>
                    </i>
                </a>
            </li>
            @endif
            <li>
                <a title="pamokos" href="/pamokos" class="h-16 px-6 flex items-center hover:text-white w-full">
                    <i class="mx-auto">
                        <h1>Pamokos</h1>
                    </i>
                </a>
            </li>
            <li>
                <a title="susirasinejimas" href="/pranesimai" class="h-16 px-6 flex items-center hover:text-white w-full">
                    <i class="mx-auto">
                        <h1>Susirašinėjimas</h1>
                    </i>
                </a>
            </li>
            @if(session('role') == 'mokinys')
            <li>
                <a title="Pažymiai" href="/balai" class="h-16 px-6 flex items-center hover:text-white w-full">
                    <i class="mx-auto">
                        <h1>Pažymiai</h1>
                    </i>
                </a>
            </li>
            @endif
            @if(session('role') == 'mokytojas')
                <li>
                    <a title="Pažymiai" href="/rodytiivercioforma" class="h-16 px-6 flex items-center hover:text-white w-full">
                        <i class="mx-auto">
                            <h1>Vertinimas</h1>
                        </i>
                    </a>
                </li>
            @endif

            <li>
                <a title="Tvarkaraštis" href="/tvarkarastis" class="h-16 px-6 flex items-center hover:text-white w-full">
                    <i class="mx-auto">
                        <h1>Tvarkaraštis</h1>
                    </i>
                </a>
            </li>
            <li>
                <a title="Namų darbai" href="/namudarbai" class="h-16 px-6 flex items-center hover:text-white w-full">
                    <i class="mx-auto">
                        <h1>Namų darbai</h1>
                    </i>
                </a>
            </li>
            @if(session('role') == 'administratorius')
            <li>
                <a title="Naudotojai" href="/naudotojai" class="h-16 px-6 flex items-center hover:text-white w-full">
                    <i class="mx-auto">
                        <h1>Naudotojai</h1>
                    </i>
                </a>
            </li>
                @endif
        </ul>

    </nav>

    <div class="flex-1 flex flex-col">

        <div class="flex flex-row-reverse p-2">
            @if(session('id_user') == null)
            <a href="/registruotis" class="block px-5 py-4 text-white bg-gray-600 shadow-lg rounded-lg">Registruotis</a>
            <a class="text-white">XD</a>
            <a href="/prisijungti" class="block px-5 py-4 text-white bg-gray-500 shadow-lg rounded-lg">Prisijungti</a>
            <a class="text-white">XD</a>
            @endif
            @if(session('id_user') != null)
                    <a href="/atsijungti" class="block px-5 py-4 text-white bg-gray-500 shadow-lg rounded-lg">Atsijungti</a>
                <a class="text-white">XD</a>
                    <a href="#" class="block px-5 py-4 text-white bg-gray-500 shadow-lg rounded-lg">{{session('role')}}</a>
            @endif

        </div>

        <!-- main content -->

        @yield('content')


    </div>
</div>
</body>
</html>


</body>
</html>
