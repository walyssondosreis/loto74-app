<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{-- Componente de cabeçalho --}}
<x-header></x-header>

<body class="">
    {{-- <div id="app"></div> --}}

    {{ $slot }}

    {{-- Componente de Rodapé --}}
    <x-footer></x-footer>

    @vite(['resources/js/app.js']);

</body>

</html>
