
<div class="mb-2">
    <div class="row justify-content-center">
        <div class="ticket-analiz">
            <?php
            $numTotal = 0;

            for ($i = 0; $i < 5; $i++) :
            ?>
            <div class="numbers-analiz">
                <div style="display: flex; flex-direction:row">
                    <?php $totalFaixa[$i] = 0; ?>
                    <div class="indicador-seq indicador-seq-esq" id="ind-esq<?= $i ?>"></div>
                    <?php for ($j = 0; $j < 5; $j++) : ?>
                    <?php $numTotal += 1; ?>
                    <div style="display: flex; flex-direction:column">
                        <div class="indicador" id="ind-top<?= $i . $j ?>"><?php

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
                        <div class="number-analiz"><?= $numTotal ?></div>
                        <div class="indicador" id="ind-bas<?= $i . $j ?>"><?php
                        echo $ind != 0 ? number_format(($ind / $qtd_total) * 100, 2) . '%' : '0 %';
                        ?>
                        </div>
                    </div>
                    <?php endfor; ?>
                    <div class="indicador-seq indicador-seq-dir" id="ind-dir<?= $i ?>">
                        <?= $totalFaixa[$i] ?></div>

                    <script type="module">
                        $('#ind-esq<?= $i ?>').text(((<?= $totalFaixa[$i] ?> / <?= $qtd_total ?>) * 100).toFixed(2) + '%');
                    </script>

                </div>
            </div>
            <?php endfor; ?>
        </div>

    </div>
</div>
