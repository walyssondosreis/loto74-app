<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LotoFC</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <style>
        .loteria-ticket {
            width: 250px;
            background-color: #301934;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
            margin: 5px;
        }

        .header {
            background-color: black;
            border: 2px solid white;
            color: #fff;
            padding: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            margin-bottom: 5px;
        }

        .header h2 {
            margin: 0;
            font-size: 24px;
        }

        .numbers {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            margin: 2px;
        }

        .number {
            width: 40px;
            height: 40px;
            background-color: lightgray;
            border: 2px solid gray;
            font-weight: bold;
            color: gray;
            border-radius: 50%;
            font-size: 20px;
            line-height: 40px;
        }

        .number-check {
            width: 40px;
            height: 40px;
            background-color: purple;
            border: 2px solid white;
            color: white;
            font-weight: bold;
            border-radius: 50%;
            font-size: 20px;
            line-height: 40px;
        }

        .casa-seq {
            padding: 5px;
            border: 2px solid gray;
            border-radius: 5px;

        }

        /* Analizador */
        .ticket-analiz {
            width: 250px;
            padding: 20px;
            text-align: center;
            margin: 5px;
        }

        .numbers-analiz {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin: 10px;
        }

        .indicador {
            width: 40px;
            height: 15px;
            border: 1px solid black;
            font-size: 12px;
            line-height: 12px;

        }

        .indicador-seq {
            width: 15px;
            height: 52px;
            font-size: 12px;
            line-height: 15px;
            text-align: center;
            border: 1px solid black;
        }

        .indicador-seq-dir {
            writing-mode: vertical-lr;
        }

        .indicador-seq-esq {
            writing-mode: vertical-lr;
        }

        .number-analiz {
            width: 40px;
            height: 22px;
            font-size: 20px;
            background-color: black;
            color: white;
            line-height: 22px;
            border: 1px solid black;
        }
    </style>

</head>
{{-- {{ dd($concursos); }} --}}
<?php
// DADOS DE TESTE
$seqs = [
    '3,3,3,3,3' => '256',
    '3,2,4,3,3' => '200',
];
?>

<body>
    <nav class="navbar navbar-dark bg-dark mb-3">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">LotoV74</span>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            {{-- Filtros de Jogos --}}
            <form action="" method="post" class="container" style="width:90%">
                <div class="row mb-2">
                    <div class="row">
                        <div class="col-4 form-group">
                            <label for="nome">Concurso:</label>
                            <input type="text" class="form-control" id="nome"
                                placeholder="Ex.: 2204 ou 2204,2205 ou 2204 2209">
                        </div>
                        <div class="col-4 form-group">
                            <label for="seq">Sequência:</label>
                            <input type="text" class="form-control" id="seq"
                                placeholder="Ex.: 2204 ou 2204,2205 ou 2204 2209">
                        </div>
                        <div class="col-2 form-group">
                            <label for="data_ini">Data de Início:</label>
                            <input type="date" class="form-control" id="data_ini" name="data">
                        </div>
                        <div class="col-2 form-group">
                            <label for="data_fim">Data de Fim:</label>
                            <input type="date" class="form-control" id="data_fim" name="data">
                        </div>
                    </div>
                    <div class="text-center m-2">
                        <button type="button" class="btn btn-secondary btn-sm " style="width: 100px">Cancelar</button>
                        <button type="button" class="btn btn-primary btn-sm" style="width: 100px">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-sm-3">
                {{-- Analisador de Sequencias --}}
                <div class="mb-2">
                    <div class="row justify-content-center">
                        <div class="ticket-analiz">
                            <?php
                                $numTotal = 0;
                                for ($i = 0; $i < 5; $i++) :
                                ?>
                            <div class="numbers-analiz">
                                <div style="display: flex; flex-direction:row">
                                    <div class="indicador-seq indicador-seq-esq">1</div>
                                    <?php for ($j = 0; $j < 5; $j++) : ?>
                                    <?php $numTotal += 1; ?>
                                    <div style="display: flex; flex-direction:column">
                                        <div class="indicador">1</div>
                                        <div class="number-analiz"><?= $numTotal ?></div>
                                        <div class="indicador">1</div>
                                    </div>
                                    <?php endfor; ?>
                                    <div class="indicador-seq indicador-seq-dir">100%</div>
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>

                    </div>
                </div>
                {{-- Ranking de Sequencias --}}
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>n°</th>
                            <th>Sequência</th>
                            <th>x</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $contx=1; foreach($sequencias as $sq):?>
                        <tr>
                            <td><?= $contx++ ?></td>
                            <td>
                                <?php foreach(explode(',',$sq['sequencia']) as $sqp): ?>
                                <span class="casa-seq"><?= $sqp ?></span>
                                <?php endforeach;?>
                            </td>
                            <td><?= $sq['qtd'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-sm-9">

                {{-- Cards de Jogos --}}
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
            </div>
        </div>
    </div>

</body>

</html>
