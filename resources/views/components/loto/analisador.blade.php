<div class="w-72 flex-col justify-center items-center text-center border-2 border-roxo-light rounded-md bg-white">
    @php
        $numTotal = 0;
    @endphp
    @for ($i = 0; $i < 5; $i++)
        <div class="p-2">
            <div class="flex justify-center items-stretch">
                @php
                    $qtd_total = array_sum($numeros);
                    $totalFaixa[0] = array_sum(array_slice($numeros, 0, 5));
                    $totalFaixa[1] = array_sum(array_slice($numeros, 5, 5));
                    $totalFaixa[2] = array_sum(array_slice($numeros, 10, 5));
                    $totalFaixa[3] = array_sum(array_slice($numeros, 15, 5));
                    $totalFaixa[4] = array_sum(array_slice($numeros, 20, 5));

                @endphp

                <div class="writing-mode-vertical-left p-1 text-xs border border-roxo-escuro" id="ind-esq{{ $i }}">
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

                    <div class="w-full">
                        <div class=" text-xs border border-roxo-escuro" id="ind-top{{ $i . $j }}">
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
                        <div class="text-xl bg-roxo-escuro text-white">{{ $numTotal }}</div>
                        <div class="p-1 text-xs border border-roxo-escuro" id="ind-bas{{ $i . $j }}">
                            {{ $ind != 0 ? number_format(($ind / $qtd_total) * 100, 2) . '%' : '0 %' }}
                        </div>
                    </div>
                @endfor
                <div class="writing-mode-vertical-right p-1 text-xs border border-roxo-escuro" id="ind-dir{{ $i }}">
                    {{ $totalFaixa[$i] }}
                </div>
            </div>
        </div>
    @endfor
</div>
