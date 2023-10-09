<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LotoFC</title>

    @vite('resources/css/app.css')

</head>
<?php
// DADOS DE TESTE
$seqs = [
    '3,3,3,3,3' => '256',
    '3,2,4,3,3' => '200',
];

$jogos = [
    0 => [
        'dt' => '23/08/2023',
        'cc' => '2204',
        'sq' => [3, 3, 3, 3, 3],
        'ns' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    ],
    1 => [
        'dt' => '28/08/2023',
        'cc' => '2205',
        'sq' => [3, 3, 2, 4, 3],
        'ns' => [4, 6, 8, 9, 10, 12, 13, 14, 15, 18, 19, 20, 21, 22, 24],
    ],
];

?>

<body>

    <div class="flex flex-row bg-red-500">
        <!-- Tabela de Sequencias -->
        <div class="basis-1/4 bg-yellow-300">

            <div class="flex justify-center">

                <table class="text-center table-auto border border-collapse border-black">
                    <thead>
                        <tr>
                            <th class="border p-2 border-black">n°</th>
                            <th class="border p-2 border-black">Sequência</th>
                            <th class="border p-2 border-black">x</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contx = 1;
                foreach ($seqs as $chv => $sq) : ?>
                        <tr>
                            <td class="border p-2 border-black"><?= $contx++ ?></td>
                            <td class="border p-2 border-black">
                                <?php foreach (explode(',', $chv) as $sqp) : ?>
                                <span class="p-1 border-solid border-2 border-gray-600 rounded"><?= $sqp ?></span>
                                <?php endforeach; ?>
                            </td>
                            <td class="border p-2 border-black"><?= $sq ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- Cards de Jogos -->
        <div class="basis-3/4 bg-blue-400">
            <div class="container mx-auto">
                <div class="flex justify-center">
                    <?php foreach ($jogos as $jogo) : ?>
                    <div class="w-64 bg-purple-950	 rounded-lg p-5 text-center m-1.5 shadow-gray-900">
                        <div class="bg-black border-2 border-white text-white p-2 rounded-t-lg mb-5">
                            <div><?= $jogo['dt'] ?></div>
                            <h2 class="m-0 text-2xl mb-2"><?= 'Concurso ' . $jogo['cc'] ?></h2>

                            <?php foreach ($jogo['sq'] as $sqp) : ?>
                            <span class="p-1 border-2 border-gray rounded"><?= $sqp ?></span>
                            <?php endforeach; ?>

                        </div>
                        <?php
                        $numTotal = 0;
                        for ($i = 0; $i < 5; $i++) :
                        ?>
                        <div class="flex justify-between mt-4 m-1">
                            <?php for ($j = 0; $j < 5; $j++) : ?>
                            <?php $numTotal += 1; ?>
                            <div class="<?= in_array($numTotal, $jogo['ns']) ? 'w-9 h-9 bg-purple-900 border-2 border-white text-white rounded-full text-lg leading-8' : 'w-8 h-8 bg-gray-500 border-2 border-gray-400 text-gray-400 rounded-full text-lg leading-8' ?>"
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
</body>

</html>
