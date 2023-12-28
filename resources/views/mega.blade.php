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
        {{-- Titulo --}}
        <div class="flex justify-center bg-green-800 my-4 ">
            <span class="flex text-2xl p-4 text-white font-bold font-nexah text-center">BOLÃO DA MEGA 2023/2024 <br>
                Concurso 2670</span>
        </div>

        <div class="flex flex-wrap font-semibold items-center">
            {{-- Informações --}}
            <ul class="flex-col bg-yellow-200 p-4 rounded-md sm:w-1/2 h-4/5 ">
                <li><span class="font-semibold text-xl text-yellow-600">INFORMAÇÕES</span></li>
                <li><span class="font-semibold">Quantidade de Jogos: </span>{{ count($jogosValidado) }}</li>
                <li><span class="font-semibold">Valor total apostado: </span> R$ {{ 5 * count($jogosValidado) }},00</li>
                <li> ... E ninguém solta a mão de ninguém</li>
            </ul>
            {{-- Resultado --}}
            <div class="flex-col p-4 justify-center sm:w-1/2 w-full">
                @if ($resultado !== '')
                    <div class="flex justify-center gap-1 p-4 bg-green-950 h-4/5 items-center">
                        @foreach (explode('-', $resultado) as $nres)
                            <span
                                class="flex border-2 border-white py-1 text-4xl w-12 h-12 justify-center bg-green-800 text-white rounded-full">{{ $nres }}</span>
                        @endforeach
                    </div>
                    <span class="flex justify-center p-4 bg-green-900 text-white">R E S U L T A D O</span>

                @endif
            </div>
        </div>

        <div class="flex justify-center p-4 w-full">
            <input id="campo_busca" class="px-4 py-2 w-full border border-blue-500 rounded-md font-nexah text-xl"
                type="text" name="" id="" placeholder="ex.: walysson dos reis">
        </div>

        <div id="area_de_jogos" class="flex-col p-4 mt-4">
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
                                <span class="font-semibold flex justify-center w-full">{{ $jogo['pontos'] }} pts</span>
                            @endif
                        @endif
                    </div>

                </div>
            @endforeach
        </div>
    </div>

    {{-- Footer --}}
    <div class="container mx-auto flex justify-center p-4 pt-10 pb-10 border-t-2 mt-10 text-center">
        <p>&copy; {{ date('Y') }} INOV4DEV.<br>Todos os direitos reservados.</p>
    </div>
    @vite(['resources/js/app.js'])

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var campoBusca = document.getElementById('campo_busca');
            var jogos = <?php echo json_encode($jogosValidado); ?>;
            var resultado = <?php echo json_encode($resultado); ?>;

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

                    if(jogo.numeros!==''){
                        hmtlCard += `
                        <div class="flex justify-center w-full gap-1 p-2">`;

                        let numeros = jogo.numeros.split('-');
                        numeros.forEach(function(numero,idx){
                            hmtlCard+=`
                            <span class="flex py-1 text-2xl w-10 h-10 justify-center border-2 border-black rounded-full
                                ${ resultado != '' && resultado.includes(numero) ? 'bg-green-700 text-white font-semibold' : ''  }">${ numero }
                            </span>
                            `;
                        })

                           hmtlCard+=`</div>`;

                        if(jogo.pontos !== ''){
                            hmtlCard+= `
                            <span class="font-semibold flex justify-center w-full">${jogo.pontos} pts</span>
                            `;
                        }

                    }

                    hmtlCard+=`</div></div>`;

                    listaJogos.insertAdjacentHTML('beforeend',hmtlCard);

                });
            }
        });
    </script>
</body>


</html>
