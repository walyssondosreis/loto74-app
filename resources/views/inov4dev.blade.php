<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inov4 DEV</title>

    @vite(['resources/css/app.css'])

</head>

<body class="h-screen">

    <div class="container-full mx-auto bg-blue-300">
        Esse é conteiner do navbar
    </div>
    <div class="container mx-auto bg-red-300">
        Este é o container da sessão de capa
    </div>

    @vite(['resources/js/app.js'])

</body>

</html>

{{--
Sitem Inspiração: https://tamalsen.dev/
O site terá o seguinte esquema:

> Navbar
> Sessão de capa
> Sessão My Expertise(Habilidades)
> Sessão de Projetos
> Sessão de Experiência Profissional
> Sessão de Disponivel para freelance e contato
> Sessão de indicações e comentários


--}}
