<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name', '-IA+YO')}}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_forward" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>

<body class="bg-[#c9abfa9c]">
    <nav class="flex absolute px-12 py-5 justify-between items-center w-full">
        <div class="">
            <img src="{{asset('images/500x500/nobg/1.png')}}" width="200" alt="logo_proyecto">
        </div>
        <div class="">
            {{$title ?? ''}}
        </div>
        <div class="flex flex-col">
            <img src="{{asset('images/logo_oea.png')}}" width="150" alt="logo_proyecto">
            <span class="text-center mt-5 font-bold text-[#9658FA]"><a href="{{route('filament.admin.auth.login')}}"
                    target="_blank">FORO OEISTA 2025</a></span>
        </div>
    </nav>
    <div class="text-gray-900 antialiased ">
        {{ $slot }}
    </div>
</body>

</html>