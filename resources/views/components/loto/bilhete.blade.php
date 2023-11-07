<div class="container-fluid">
    <div class="row justify-content-center mb-2">
        <?php foreach ($concursos as $cc) : ?>
        <div class="loteria-ticket">
            <div class="header">
                <div>{{ \Carbon\Carbon::parse($cc->data_apuracao)->format('d/m/Y') }}</div>
                <h2>{{ 'Concurso ' . $cc->id }}</h2>

                <?php foreach( explode(',',$cc->resultado->numero->sequencia)  as $sqp): ?>
                <span class="casa-seq"><?= $sqp ?></span>
                <?php endforeach;?>

            </div>
            <?php
            $numTotal = 0;
            for ($i = 0; $i < 5; $i++) :
            ?>
            <div class="numbers">
                <?php for ($j = 0; $j < 5; $j++) : ?>
                <?php $numTotal += 1; ?>
                <div class="<?= in_array($numTotal, explode(',', $cc->resultado->numero->numeros)) ? 'number-check' : 'number' ?>"
                    style="position: relative;"><?= $numTotal ?></div>

                <!-- <span class="number-indicator">10%</span> -->

                <?php endfor; ?>
            </div>
            <?php endfor; ?>


        </div>
        <?php endforeach; ?>
    </div>
    <div class="mb-5 justify-content-center">
        {{ $concursos->links() }}

    </div>

</div>
