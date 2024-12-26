<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolão da Mega</title>

   {{-- @vite(['resources/css/app.css']) --}}
    <link rel="stylesheet" href="https://mega74-9fc3a9e75da4.herokuapp.com/build/assets/app-4e6b4c65.css">

</head>

<body class="h-screen bg-gradient-to-r from-gray-100 to-gray-200">

    @php
        // var_dump($jogosValidado[0]);
    @endphp

    <div class=" flex-col justify-center">
        {{-- Titulo --}}
        <div class="flex justify-center bg-green-600 border-b border-green-800 ">
            <span class="flex text-2xl p-4 font-nexah text-center py-4 text-white">BOLÃO DA MEGA 2024/2025 <br>
                Concurso 2810</span>
        </div>

        <div class="mt-4 flex flex-wrap font-semibold items-center justify-center ">
            {{-- Informações --}}
            <ul class="container mx-auto w-fit flex-col text-green-800 p-4 rounded-md mb-8 text-center border border-green-800">
                <li><span class="font-semibold text-xl ">INFORMAÇÕES</span></li>
                <li><span class="font-semibold">Quantidade de Jogos: </span>{{ count($jogosValidado) }}</li>
                <li><span class="font-semibold">Valor total apostado: </span> R$ {{ 5 * count($jogosValidado) }},00</li>
                <li> ... E ninguém solta a mão de ninguém</li>
            </ul>
            {{-- Resultado --}}

                @if ($resultado !== '')
                <div class="flex-col p-4 justify-center w-full bg-green-900 shadow-lg">
                    <div class="flex justify-center gap-1 items-center">
                        @foreach (explode('-', $resultado) as $nres)
                            <span
                                class="flex border-2 border-white py-1 text-3xl w-12 h-12 justify-center bg-green-800 text-white rounded-full">{{ $nres }}</span>
                        @endforeach
                    </div>
                    <span class="flex justify-center p-4 bg-green-900 text-white">R E S U L T A D O</span>
                </div>
                @endif

        </div>

        <div class="container mx-auto flex justify-center p-4 w-full">
            <input id="campo_busca" class="px-4 py-2 w-full border border-gray-500 rounded-md font-nexah text-xl"
                type="text" name="" id="" placeholder="... digite seu nome aqui">
        </div>

        <div id="area_de_jogos" class="container mx-auto flex-col p-4 mt-4">
            @foreach ($jogosValidado as $idx => $jogo)
                {{-- Card de Jogos --}}
                <div
                    class="flex @php echo $jogo['status']=='jogo_valido' ? 'bg-white' : 'bg-red-100' @endphp border-b border-black pb-1">

                    <span
                        class="w-10 bg-green-200 font-semibold flex items-center justify-center">{{ $idx + 1 }}</span>

                    <div class="px-2 flex w-full flex-wrap sm:flex-nowrap items-center justify-center">

                        <span class="w-full flex justify-center sm:justify-start font-nexah">
                            {{ $jogo['nome_pessoa'] }}</span>
                        <span class="sm:w-80 justify-center flex font-semibold"> Jogo #{{ $jogo['id'] }} </span>

                        @if ($jogo['numeros'] != '')
                            <div class="flex justify-center w-full gap-1 p-2">
                                @foreach (explode('-', $jogo['numeros']) as $num)
                                    <span
                                        class="flex py-1 text-2xl w-10 h-10 justify-center border-2 border-black rounded-full
                        @if ($resultado != '' && in_array($num, explode('-', $resultado))) bg-green-700 text-white font-semibold @endif
                        ">{{ $num }}</span>
                                @endforeach
                            </div>

                            @if ($jogo['pontos'] != '')
                                @if ($jogo['pontos'] >= 4)
                                    <span class="font-semibold flex justify-center w-full py-2  border-2 border-black bg-green-200
                                    ">GANHOU \o/</span>
                                @else
                                    <span class="font-semibold flex justify-center w-full py-2  border-2 border-black bg-red-200">PERDEU : (</span>
                                @endif
                            @endif
                        @endif
                    </div>

                </div>
            @endforeach

        </div>
    </div>

    {{-- Footer --}}
    <div class="container mx-auto flex justify-center p-4 pt-10 pb-10 border-t-4 border-black mt-10 text-center">
        <p>&copy; {{ date('Y') }} <a href="https://www.inov4dev.com" class="font-bold">INOV4DEV</a><br>Todos os direitos reservados.</p>
    </div>
    @vite(['resources/js/app.js'])

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var campoBusca = document.getElementById('campo_busca');
            var jogos = <?php echo json_encode($jogosValidado); ?>;
            var resultado = <?php echo json_encode($resultado); ?>;

            resultado = resultado.split('-');

            // console.log(typeof resultado);

            campoBusca.addEventListener('input', function() {
                var termoBusca = campoBusca.value.trim().toLowerCase();

                var jogosFiltrados = jogos.filter(function(jogo) {
                    return jogo.nome_pessoa.toLowerCase().includes(termoBusca);
                });

                atualizarListaJogos(jogosFiltrados);
            });

            function atualizarListaJogos(jogosFiltrados) {
                var listaJogos = document.querySelector('#area_de_jogos');

                // Limpa a lista existente
                while (listaJogos.firstChild) {
                    listaJogos.removeChild(listaJogos.firstChild);
                }

                // Adiciona os jogos filtrados à lista
                jogosFiltrados.forEach(function(jogo, idx) {

                    let hmtlCard = `
                    <div class="flex ${ jogo.status == 'jogo_valido' ? 'bg-white': 'bg-red-100'} border-b border-black pb-1" >

                        <span class="w-10 bg-green-200 font-semibold flex items-center justify-center">${ idx+1}</span>

                        <div class="px-2 flex w-full flex-wrap sm:flex-nowrap items-center justify-center">

                            <span class="w-full flex justify-center sm:justify-start font-nexah"> ${jogo.nome_pessoa}</span>
                            <span class="sm:w-80 justify-center flex font-semibold"> Jogo #${jogo.id} </span>`;

                    if (jogo.numeros !== '') {

                        hmtlCard += `
                        <div class="flex justify-center w-full gap-1 p-2">`;

                        let numeros = jogo.numeros.split('-');
                        numeros.forEach(function(numero, idx) {

                            hmtlCard += `
                            <span class="flex py-1 text-2xl w-10 h-10 justify-center border-2 border-black rounded-full
                                ${ resultado.length && resultado.includes(numero) ? 'bg-green-700 text-white font-semibold' : ''  }">${ numero }
                            </span>
                            `;
                        })

                        hmtlCard += `</div>`;

                        if (jogo.pontos !== '') {
                            const ganhou =
                                `<span class="font-semibold flex justify-center w-full py-2  border-2 border-black bg-green-200">GANHOU \\o/</span>`;
                            const perdeu =
                                `<span class="font-semibold flex justify-center w-full py-2  border-2 border-black bg-red-200">PERDEU : (</span>`;

                            hmtlCard += jogo.pontos >= 4 ? ganhou : perdeu;

                        }

                    }

                    hmtlCard += `</div></div>`;

                    listaJogos.insertAdjacentHTML('beforeend', hmtlCard);

                });
            }
        });
    </script>
     <script src="http://mega74-9fc3a9e75da4.herokuapp.com/build/assets/app-1ca61c52.js"></script>
</body>


</html>
