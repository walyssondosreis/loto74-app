<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inov4 DEV</title>

    @vite(['resources/css/app.css'])

</head>

<body class="h-screen">
    {{-- Container de Topo Navbar --}}
    <div class="flex relative container-full mx-auto">
        {{-- Icone ou logo --}}
        <div class= "flex p-4 text-center text-slate-900 w-3/12">
            <span
                class="before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-black relative inline-block">
                <span class="relative text-5xl justify-center font-jhetegral text-white">Walysson dos Reis</span>
            </span>
        </div>
        {{-- Itens da navbar --}}
        <div class="flex justify-center w-full p-4 items-center">
            <ul class="flex gap-4 text-lg">
                <&sol;>
                    <li
                        class="hover:scale-105 hover:bg-black hover:text-red-300 hover:font-semibold duration-300 px-2 cursor-pointer">
                        inicio</li>
                    <&sol;>
                        <li
                            class="hover:scale-105 hover:bg-black hover:text-red-300 hover:font-semibold duration-300 px-2 cursor-pointer">
                            habilidades</li>
                        <&sol;>
                            <li
                                class="hover:scale-105 hover:bg-black hover:text-red-300 hover:font-semibold duration-300 px-2 cursor-pointer">
                                experiencias</li>
                            <&sol;>
                                <li
                                    class="hover:scale-105 hover:bg-black hover:text-red-300 hover:font-semibold duration-300 px-2 cursor-pointer">
                                    trabalhos</li>
                                <&sol;>
                                    <li
                                        class="hover:scale-105 hover:bg-black hover:text-red-300 hover:font-semibold duration-300 px-2 cursor-pointer">
                                        contatos</li>
            </ul>
        </div>
    </div>
    {{-- Container da capa --}}
    <div class="flex bg-black h-2/5 container mx-auto items-center">

        <div class="flex-col items-center w-full">
            {{-- Texto grande + Slogan --}}
            <div class="bg-white flex-col text-center p-8 rounded-r-3xl justify-start lg:w-4/5 xl:w-3/5" >
                <div class="flex text-9xl justify-center p-4 font-nexah"> INOV <span class="text-blue-600">4</span> DEV
                </div>
                <div class="flex text-2xl justify-center font-nexal"> Inovação e desenvolvimento</div>


            </div>
            {{-- Botão de Jogar pra baixo --}}
            <div class="flex justify-center p-4 h-3/5 items-end">
                <span
                    class= "text-red-300 bg-white rounded-full items-center flex p-2 border-4 border-red-200 shadow-sm shadow-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </span>
            </div>

        </div>
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
