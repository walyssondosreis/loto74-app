<div class="flex-col border-2 border-black rounded-md w-72">
    @php
        $numTotal = 0;
    @endphp
    @for ($i = 0; $i < 5; $i++)
        <div class="flex p-1">
                @php
                    $qtd_total = array_sum($numeros);
                    $totalFaixa[0] = array_sum(array_slice($numeros, 0, 5));
                    $totalFaixa[1] = array_sum(array_slice($numeros, 5, 5));
                    $totalFaixa[2] = array_sum(array_slice($numeros, 10, 5));
                    $totalFaixa[3] = array_sum(array_slice($numeros, 15, 5));
                    $totalFaixa[4] = array_sum(array_slice($numeros, 20, 5));

                @endphp
                {{-- Linha: IndEsq+Numeros**+IndDir --}}
                <div class="flex w-full items-stretch">
                    <div class="flex writing-mode-vertical-left p-1 text-xs border border-black justify-center"
                        id="ind-esq{{ $i }}">
                        @switch($i)
                            @case(0)
                                {{ $totalFaixa[0] != 0 ? number_format(($totalFaixa[0] / $qtd_total) * 100, 2) . '%' : '0 %' }}
                            @break

                            @case(1)
                                {{ $totalFaixa[1] != 0 ? number_format(($totalFaixa[1] / $qtd_total) * 100, 2) . '%' : '0 %' }}
                            @break

                            @case(2)
                                {{ $totalFaixa[2] != 0 ? number_format(($totalFaixa[2] / $qtd_total) * 100, 2) . '%' : '0 %' }}
                            @break

                            @case(3)
                                {{ $totalFaixa[3] != 0 ? number_format(($totalFaixa[3] / $qtd_total) * 100, 2) . '%' : '0 %' }}
                            @break

                            @case(4)
                                {{ $totalFaixa[4] != 0 ? number_format(($totalFaixa[4] / $qtd_total) * 100, 2) . '%' : '0 %' }}
                            @break

                            @default
                                0 %
                        @endswitch
                    </div>
                    @for ($j = 0; $j < 5; $j++)
                        @php
                            $numTotal += 1;
                        @endphp

                        <div class="flex-col w-full ">
                            <div class="flex justify-center text-xs border border-black" id="ind-top{{ $i . $j }}">
                                @php

                                    $ind = array_map(
                                        function ($item, $index) use ($numTotal) {
                                            if ($index + 1 == $numTotal) {
                                                return $item;
                                            }
                                        },
                                        $numeros,
                                        array_keys($numeros),
                                    );
                                    // xdebug_break();

                                    $ind = array_filter($ind, function ($item) {
                                        return $item !== null;
                                    });
                                    $ind = intval(implode($ind)) ? intval(implode($ind)) : 0;

                                    echo $ind;
                                    // xdebug_break();
                                    // dd($ind[0]);
                                @endphp

                            </div>
                            <div class="flex justify-center bg-black text-white
                                @if (isset($numDestaque) && in_array($numTotal, explode(',', $numDestaque))) text-xl
                        @elseif (isset($numDestaque))
                            text-xl
                        @else
                            text-xl @endif ">
                                {{ $numTotal }}
                            </div>
                            <div class="flex justify-center p-1 text-xs border border-black" id="ind-bas{{ $i . $j }}">
                                {{ $ind != 0 ? number_format(($ind / $qtd_total) * 100, 2) . '%' : '0 %' }}
                            </div>
                        </div>
                    @endfor
                    <div class="flex writing-mode-vertical-right p-1 justify-center text-xs border border-black"
                        id="ind-dir{{ $i }}">
                        {{ $totalFaixa[$i] }}
                    </div>
            </div>
        </div>
    @endfor
</div>


<script type="module">
    document.addEventListener('DOMContentLoaded', (event) => {
        // Envolver o script nesta função DOM garante que o script só seja executado após o carregamento da página
        // Função que recebe vetor calcula cor e retorna vetor de cores
        function corGradiente(valores, tema = null) {
            if (tema == null) {
                var tema = [{ // 1
                        'background': '#ffffff',
                        'color': 'black',
                    },
                    { // 2
                        'background': '#ddd3e3',
                        'color': 'black',
                    },
                    { // 3
                        'background': '#bba8c7',
                        'color': 'black',
                    },
                    { // 4
                        'background': '#9a7fab',
                        'color': 'black',
                    },
                    { // 5
                        'background': '#795890',
                        'color': 'white',
                    },
                    { // 6
                        'background': '#583276',
                        'color': 'white',
                    },
                    { // 7
                        'background': '#360a5c',
                        'color': 'white',
                    },
                ];
            }

            var total = Math.max(...valores);
            // console.log(total);

            var coresVal = [];

            valores.forEach(function(e) {
                // console.log((e / total) * 100);
                if (total == 0) coresVal.push(tema[0]);
                else if ((e / total) * 100 >= 85.80) coresVal.push(tema[6]);
                else if ((e / total) * 100 >= 71.50 && (e / total) * 100 < 85.80) coresVal.push(tema[
                    5]);
                else if ((e / total) * 100 >= 57.20 && (e / total) * 100 < 71.50) coresVal.push(tema[
                    4]);
                else if ((e / total) * 100 >= 42.90 && (e / total) * 100 < 57.20) coresVal.push(tema[
                    3]);
                else if ((e / total) * 100 >= 28.60 && (e / total) * 100 < 42.90) coresVal.push(tema[
                    2]);
                else if ((e / total) * 100 >= 14.30 && (e / total) * 100 < 28.60) coresVal.push(tema[
                    1]);
                else if ((e / total) * 100 >= 0 && (e / total) * 100 < 14.30) coresVal.push(tema[0]);

            });
            // console.log(coresVal);
            return coresVal;
        }

        var tema = [{ // 1
                'background': '#ff0000',
                'color': 'white',
            },
            { // 2
                'background': '#ff7f00',
                'color': 'black',
            },
            { // 3
                'background': '#ffaa00',
                'color': 'black',
            },
            { // 4
                'background': '#ffff00',
                'color': 'black',
            },
            { // 5
                'background': '#bfdf00',
                'color': 'black',
            },
            { // 6
                'background': '#7fbf00',
                'color': 'black',
            },
            { // 7
                'background': '#3f9f00',
                'color': 'black',
            },
        ];

        // Pinta os indicadores dos lados esq e dir
        let vet = [];

        for (let i = 0; i < 5; i++) {
            vet.push(document.querySelector('#ind-dir' + i).innerText);
        }

        var indColor = corGradiente(vet, tema);

        for (let i = 0; i < 5; i++) {

            document.querySelector('#ind-dir' + i).style.cssText =
                'background-color:' + indColor[i]['background'] +
                ';color:' + indColor[i]['color'];

            document.querySelector('#ind-esq' + i).style.cssText =
                'background-color:' + indColor[i]['background'] +
                ';color:' + indColor[i]['color'];
        }

        // Pinta os indicadores do topo e base
        for (let i = 0; i < 5; i++) {
            let vet = [];

            document.querySelectorAll('[id^="ind-top' + i + '"]').forEach(function(e) {
                vet.push(e.innerText);
            });

            var indColor = corGradiente(vet, tema);

            document.querySelectorAll('[id^="ind-top' + i + '"]').forEach(function(e, idx) {
                e.style.cssText = 'background-color:' + indColor[idx]['background'] +
                    ';color:' + indColor[idx]['color'];
            });

            document.querySelectorAll('[id^="ind-bas' + i + '"]').forEach(function(e, idx) {
                e.style.cssText = 'background-color:' + indColor[idx]['background'] +
                    ';color:' + indColor[idx]['color'];
            });
        }

    });
</script>
