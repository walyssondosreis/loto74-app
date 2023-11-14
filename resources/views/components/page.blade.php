<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{-- Componente de cabeçalho --}}
<x-header></x-header>

<body class="">

    {{ $slot }}

{{-- Componente de Rodapé --}}
<x-footer></x-footer>

</body>

</html>
