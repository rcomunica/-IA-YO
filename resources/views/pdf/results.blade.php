<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Factura</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="p-10">
    <h1 class="text-2xl font-bold text-blue-600">Hola {{$name ?? ''}}</h1>
    <p class="mt-4 text-gray-700">Llegaron tus resultados</p>
    @livewire(\App\Filament\Widgets\EmotionsPorcentPie::class)

</body>

</html>