<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LotoFC</title>

    {{-- <style>
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
        .number-indicator{
            background-color: red;
            color: white;
            position: absolute;
            bottom: 0;
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
        .casa-seq{
            padding: 5px;
            border: 2px solid gray;
            border-radius: 5px;
            
        }
    </style> --}}
    @vite('resources/css/app.css')
</head>
<?php 
// DADOS DE TESTE 
$seqs =[
  	'3,3,3,3,3' => '256',
  	'3,2,4,3,3' => '200',
  ];

  $jogos = [
  	0=>[
  		'dt'=>'23/08/2023',
  		'cc'=>'2204',
  		'sq'=>[3,3,3,3,3],
  		'ns'=> [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15],
  	],
  	1=>[
  		'dt'=>'28/08/2023',
  		'cc'=>'2205',
  		'sq'=>[3,3,2,4,3],
  		'ns'=> [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15],
  	],
  ];

?>
<body>
    <h1 class="text-3xl font-bold underline">
        Hello world!
      </h1>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <span class="navbar-brand mb-0 h1">LotoV74</span>
        </div>
    </nav>

    <div class="container">
        <div class="row">


            <!-- Tabela de Sequencias -->
            <div class="col-sm-3">
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
                                    <span class="casa-seq"><?= $sqp?></span>
                                <?php endforeach;?>
                            </td>
                            <td><?= $sq?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

            <!-- Cards de Jogos -->
            <div class="col-sm-9">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <?php foreach ($jogos as $jogo) : ?>
                            <div class="loteria-ticket">
                                <div class="header">
                                    <div><?= $jogo['dt']?></div>
                                    <h2><?= 'Concurso ' . $jogo['cc'] ?></h2>   

                                    <?php foreach($jogo['sq'] as $sqp): ?>    
                                    <span class="casa-seq"><?= $sqp?></span>
                                    <?php endforeach;?>
                                    
                                </div>
                                <?php
                                $numTotal = 0;
                                for ($i = 0; $i < 5; $i++) :
                                ?>
                                    <div class="numbers">
                                        <?php for ($j = 0; $j < 5; $j++) : ?>
                                            <?php $numTotal += 1; ?>
                                            <div class="<?= in_array($numTotal, $jogo['ns']) ? 'number-check' : 'number' ?>" style="position: relative;" ><?= $numTotal ?></div>
                                        
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
    <footer class="bg-dark text-light text-center py-3">
        <div class="container">
            <p>&copy; 2023</p>
        </div>
    </footer>

</body>

</html>