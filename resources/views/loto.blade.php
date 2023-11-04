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
            width: 200px;
            height: 320px;
            /* padding: 20px; */
            /* text-align: center; */
            margin: 5px;
            border: 1px solid black;
            /* border-radius: 5px; */
            background-color: black;
        }

        .numbers-analiz {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin: 10px;
            text-align: center;
            /* border: 1px solid white; */
        }

        .indicador {
            width: 40px;
            height: 15px;
            /* border: 1px solid white; */
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
            /* border: 1px solid white; */
        }

        .info-rotulo {
            font-size: 9pt;
            padding-left: 5px;
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
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                {{-- <img src="{{ asset('images/logo_74.png') }}" alt="Logo74" width="80" height="80"> --}}
                LotoV74
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Início</a>
                      </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Atualizar
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('atualizar', ['modo' => 'api']) }}">Via API</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('atualizar', ['modo' => 'csv']) }}">Via Arquivo
                                    CSV</a></li>
                            {{-- <li><hr class="dropdown-divider"></li> --}}
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle">
                            Aposta
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="" data-bs-toggle="dropdown" class="dropdown-item">Conferidor</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('mensagem'))
        <div class="alert alert-success">
            {{ session('mensagem') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            {{-- Filtros de Jogos --}}
            <form action="/loto" method="POST" class="container" style="width:90%">
                @csrf
                <div class="row mb-2">
                    <div class="row">
                        <div class="col-4 form-group">
                            <label for="concursos">Concurso:</label>
                            <input type="text" class="form-control" id="concursos" name="concursos"
                                placeholder="Ex.: 2204 ou 2204,2207,2306,n ou 2204-2209"
                                @if (!empty($filtros) && $filtros['concursos']) value="{{ $filtros['concursos'] }}"; @endif>
                        </div>
                        <div class="col-4 form-group">
                            <label for="sequencias">Sequência:</label>
                            <input type="text" class="form-control" id="sequencias" name="sequencias"
                                placeholder="Ex.: 33423 ou 33423,33324,33333,n"
                                @if (!empty($filtros) && $filtros['sequencias']) value="{{ $filtros['sequencias'] }}"; @endif>

                        </div>
                        <div class="col-2 form-group">
                            <label for="data_ini">Data de Início:</label>
                            <input type="date" class="form-control" id="data_ini" name="data_ini"
                                @if (!empty($filtros) && $filtros['data_ini']) value="{{ $filtros['data_ini'] }}"; @endif>
                        </div>
                        <div class="col-2 form-group">
                            <label for="data_fim">Data de Fim:</label>
                            <input type="date" class="form-control" id="data_fim" name="data_fim"
                                @if (!empty($filtros) && $filtros['data_fim']) value="{{ $filtros['data_fim'] }}"; @endif>

                        </div>
                    </div>
                    <div class="text-center m-2">
                        <button type="reset" class="btn btn-secondary btn-sm " style="width: 100px">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-sm" style="width: 100px">Buscar</button>
                    </div>
                </div>
            </form>

            <a href="{{ route('limparFiltros') }}" style="text-align: center">Limpar Filtros</a>

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
                                        ?></div>
                                        <div class="number-analiz"><?= $numTotal ?></div>
                                        <div class="indicador" id="ind-bas<?= $i . $j ?>"><?php
                                        echo $ind != 0 ? number_format(($ind / $qtd_total) * 100, 2) . '%' : '0 %';
                                        ?></div>
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
    <script type="module">
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
                else if ((e / total) * 100 >= 71.50 && (e / total) * 100 < 85.80) coresVal.push(tema[5]);
                else if ((e / total) * 100 >= 57.20 && (e / total) * 100 < 71.50) coresVal.push(tema[4]);
                else if ((e / total) * 100 >= 42.90 && (e / total) * 100 < 57.20) coresVal.push(tema[3]);
                else if ((e / total) * 100 >= 28.60 && (e / total) * 100 < 42.90) coresVal.push(tema[2]);
                else if ((e / total) * 100 >= 14.30 && (e / total) * 100 < 28.60) coresVal.push(tema[1]);
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


        // Colore os indicadores dos lados esq e dir
        let vet = [];

        for (let i = 0; i < 5; i++) {
            vet.push($('#ind-dir' + i).text().trim());
        }

        var indColor = corGradiente(vet, tema);

        for (let i = 0; i < 5; i++) {
            vet.push($('#ind-dir' + i + ',#ind-esq' + i).css({
                'background-color': indColor[i]['background'],
                'color': indColor[i]['color'],
            }));
        }

        // Colore os indicadores do topo e base
        for (let i = 0; i < 5; i++) {
            let vet = [];
            $('[id^="ind-top' + i + '"]').each(function() {
                vet.push($(this).text());
            });

            var indColor = corGradiente(vet, tema);

            $('[id^="ind-top' + i + '"]').each(function(idx) {
                $(this).css({
                    'background-color': indColor[idx]['background'],
                    'color': indColor[idx]['color'],
                });
            });
            $('[id^="ind-bas' + i + '"]').each(function(idx) {
                $(this).css({
                    'background-color': indColor[idx]['background'],
                    'color': indColor[idx]['color'],
                });
            });
            // console.log(vet);
        }
    </script>
</body>


</html>
