<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{-- Componente de cabeçalho --}}
<x-header></x-header>

<body class="">
    {{-- <div id="app"></div> --}}
    {{-- <x-teste></x-teste> --}}
    {{ $slot }}

    @vite(['resources/js/app.js']);

    {{-- Componente de Rodapé --}}
    <x-footer></x-footer>

</body>

</html>
