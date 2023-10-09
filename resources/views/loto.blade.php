<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LotoFC</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-82c87407.css') }}"> --}}
    {{-- <script src="{{ asset('build/assets/app-a83ed21d.js') }}"></script> --}}
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
        .loteria-ticket-analiz {
            width: 250px;
            /* background-color: #301934; */
            /* border-radius: 10px; */
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); */
            padding: 20px;
            text-align: center;
            margin: 5px;
        }
        .numbers-analiz {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            margin: 10px;
        }
        .number-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .indicador {
            width: 40px;
            height: 15px;
            border: 1px solid black;
            font-size: 12px;
            line-height: 12px;

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
/* teste---------------- */

</style>

</head>
<?php
// DADOS DE TESTE
$seqs = [
    '3,3,3,3,3' => '256',
    '3,2,4,3,3' => '200',
];

$jogos = [
    [
        'dt' => '23/08/2023',
        'cc' => '2204',
        'sq' => [3, 3, 3, 3, 3],
        'ns' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    ],
    [
        'dt' => '28/08/2023',
        'cc' => '2205',
        'sq' => [3, 3, 2, 4, 3],
        'ns' => [4, 6, 8, 9, 10, 12, 13, 14, 15, 18, 19, 20, 21, 22, 24],
    ],
    [
        'dt' => '28/08/2023',
        'cc' => '2205',
        'sq' => [3, 3, 2, 4, 3],
        'ns' => [4, 6, 8, 9, 10, 12, 13, 14, 15, 18, 19, 20, 21, 22, 24],
    ],
    [
        'dt' => '28/08/2023',
        'cc' => '2205',
        'sq' => [3, 3, 2, 4, 3],
        'ns' => [4, 6, 8, 9, 10, 12, 13, 14, 15, 18, 19, 20, 21, 22, 24],
    ],
];

?>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">LotoV74</span>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-3">
                {{-- Analisador de Sequencias --}}
                <div class="mb-2">
                    <div class="row justify-content-center">
                        <div class="loteria-ticket-analiz">
                            <div class="header">
                                <div>Mensagem 1</div>
                                <h2>Mensagem 2</h2>

                                <span class="casa-seq">3</span>
                                <span class="casa-seq">3</span>
                                <span class="casa-seq">3</span>
                                <span class="casa-seq">3</span>
                                <span class="casa-seq">3</span>

                            </div>
                            <?php
                                $numTotal = 0;
                                for ($i = 0; $i < 5; $i++) :
                                ?>
                            <div class="numbers-analiz">
                                <?php for ($j = 0; $j < 5; $j++) : ?>
                                <?php $numTotal += 1; ?>
                                <div class="number-container">
                                    <div class="indicador">1</div>
                                    <div class="number-analiz" style="position: relative;"><?= $numTotal ?></div>
                                    <div class="indicador">1</div>
                                </div>
                                <?php endfor; ?>
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

                        <?php $contx=1; foreach($seqs as $chv=>$sq):?>
                        <tr>
                            <td><?= $contx++ ?></td>
                            <td>
                                <?php foreach(explode(',',$chv) as $sqp): ?>
                                <span class="casa-seq"><?= $sqp ?></span>
                                <?php endforeach;?>
                            </td>
                            <td><?= $sq ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-sm-9">
                {{-- Filtros de Jogos --}}
                <form action="" method="post">
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
                            <button type="button" class="btn btn-secondary btn-sm "
                                style="width: 100px">Cancelar</button>
                            <button type="button" class="btn btn-primary btn-sm" style="width: 100px">Buscar</button>
                        </div>
                    </div>
                </form>
                {{-- Cards de Jogos --}}
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <?php foreach ($jogos as $jogo) : ?>
                        <div class="loteria-ticket">
                            <div class="header">
                                <div><?= $jogo['dt'] ?></div>
                                <h2><?= 'Concurso ' . $jogo['cc'] ?></h2>

                                <?php foreach($jogo['sq'] as $sqp): ?>
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
                                <div class="<?= in_array($numTotal, $jogo['ns']) ? 'number-check' : 'number' ?>"
                                    style="position: relative;"><?= $numTotal ?></div>

                                <!-- <span class="number-indicator">10%</span> -->

                                <?php endfor; ?>
                            </div>
                            <?php endfor; ?>


                        </div>
                        <?php endforeach; ?>
                    </div>


                </div>
            </div>
        </div>
    </div>

</body>

</html>
