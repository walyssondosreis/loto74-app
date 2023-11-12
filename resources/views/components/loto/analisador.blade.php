<div class="w-64 bg-white border-2 border-roxo-escuro rounded-md">
    @php
        $numTotal = 0;
    @endphp
    @for ($i = 0; $i < 5; $i++)
        <div class="flex justify-center text-center p-2">
            <div class="flex">
                @php
                    $totalFaixa[$i] = 0;
                @endphp

                <div class=" p-1 text-xs border border-roxo-escuro" id="ind-esq{{ $i }}">A</div>
                @for ($j = 0; $j < 5; $j++)
                    @php
                        $numTotal += 1;
                    @endphp

                    <div class="">
                        <div class=" text-xs border border-roxo-escuro" id="ind-top{{ $i . $j }}">
                            @php

                                $ind = array_map(function ($item) use ($numTotal) {
                                    if ($item['numero'] == $numTotal) {
                                        return $item['qtd'];
                                    }
                                }, $numeros);
                                // xdebug_break();
                                $qtd_total = array_reduce(
                                    $numeros,
                                    function ($total, $item) {
                                        $total += $item['qtd'];
                                        return $total;
                                    },
                                    0,
                                );

                                $ind = array_filter($ind, function ($item) {
                                    return $item !== null;
                                });
                                $ind = intval(implode($ind)) ? intval(implode($ind)) : 0;
                                $totalFaixa[$i] += $ind;

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
                <div class="p-1 text-xs border border-roxo-escuro" id="ind-dir{{ $i }}">
                    {{ $totalFaixa[$i] }}
                </div>
            </div>
        </div>
    @endfor
</div>
