<div class="mb-2">
    <div class=" flex-row justify-content-center">
        <div class="bg-green-400 border-2 border-black absolute
        m-1">
            <?php
            $numTotal = 0;

            for ($i = 0; $i < 5; $i++) :
            ?>
            <div class="relative flex justify-center mt-5 m-2 text-center">
                <div class="flex flex-row">
                    <?php $totalFaixa[$i] = 0; ?>
                    {{-- COLOCAR TEXTO NA VERTICAL --}}
                    <div class="w-4 h-14 text-xs leading-4 text-center border border-black" id="ind-esq<?= $i ?>">A</div>
                    <?php for ($j = 0; $j < 5; $j++) : ?>
                    <?php $numTotal += 1; ?>
                    <div class="flex flex-col">
                        <div class="w-10 h-4 text-xs leading-3 border border-black" id="ind-top<?= $i . $j ?>"><?php

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
                        ?>
                        </div>
                        <div class="w-10 h-5 text-xl bg-black text-white leading-5"><?= $numTotal ?></div>
                        <div class="w-10 h-4 text-xs leading-3 border border-black" id="ind-bas<?= $i . $j ?>"><?php
                        echo $ind != 0 ? number_format(($ind / $qtd_total) * 100, 2) . '%' : '0 %';
                        ?>
                        </div>
                    </div>
                    <?php endfor; ?>
                    <div class="w-4 h-14 text-xs leading-4 text-center border border-black" id="ind-dir<?= $i ?>">
                        <?= $totalFaixa[$i] ?></div>
                </div>
            </div>
            <?php endfor; ?>
        </div>

    </div>
</div>
