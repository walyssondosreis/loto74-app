<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolão da Mega</title>

    @vite(['resources/css/app.css'])

</head>

<body class="h-screen">

    @php
        // var_dump($jogosValidado[0]);
    @endphp

    <div class=" container mx-auto flex-col justify-center">
        <div class="flex justify-center rounded-xl bg-green-800 my-4 p-4 ">
            <span class="flex text-2xl p-4 text-white font-bold">Bolão da Mega 2023/2024</span>
        </div>
        <div class="flex flex-wrap">

            <ul class="flex-col bg-yellow-200 p-4 rounded-md sm:w-1/2 px-8">
                <li><span class="font-semibold text-xl text-yellow-600">INFORMAÇÕES</span></li>
                <li><span class="font-semibold">Quantidade de Jogos: </span>{{ count($jogosValidado) }}</li>
                <li><span class="font-semibold">Valor total apostado: </span> R$ {{ 5*count($jogosValidado) }},00</li>
                <li>Seu prêmio = (Premio/Qtd_de_jogos) * Qtd_de_jogos_que_vc_fez</li>
            </ul>

            <div class="flex-col p-4 justify-center sm:w-1/2">
                @if ($resultado !== '')
                    <div class="flex justify-center gap-1 p-4 bg-green-300">
                        @foreach (explode('-',$resultado) as $nres )
                            <span class="flex px-4 py-1 text-4xl bg-green-800 text-white rounded-full">{{ $nres }}</span>
                        @endforeach
                    </div>
                    <span class="flex justify-center p-4 bg-green-900 text-white">R E S U L T A D O</span>

                @endif
            </div>
        </div>

        <div class="flex-col p-4 mt-4">
            @foreach ($jogosValidado as $idx=>$jogo )

            <div class="flex @php echo $jogo['status']=='jogo_valido' ? 'bg-blue-100' : 'bg-red-100' @endphp border-b border-black pb-1" >

                <span class="px-2 w-2/12 font-semibold">{{ $idx+1 }}</span>

                <span class="italic w-5/12"> {{ $jogo['nome_pessoa'] }}</span>

                <div class="bg-white w-4/12 flex justify-center"> {{ $jogo['numeros'] }}</div>

                @if ($jogo['pontos']!='')
                <span class=" font-bold w-1/12">{{ $jogo['pontos'] }} pts</span>
                @endif

            </div>
            @endforeach
        </div>
    </div>

    {{-- Footer --}}
    <div class="container mx-auto flex justify-center p-4 pt-10 pb-10 border-t-2 mt-10 text-center">
        <p>&copy; {{ date('Y') }} INOV4DEV.<br>Todos os direitos reservados.</p>
    </div>
    @vite(['resources/js/app.js'])

</body>

</html>


