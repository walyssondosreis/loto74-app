<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <style>
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

        .numero {
            width: 40px;
            height: 22px;
            font-size: 20px;
            background-color: black;
            color: white;
            line-height: 22px;
            border: 1px solid black;
            position: relative;


        }

        .indicador-seq {
            width: 15px;
            height: 52px;
            font-size: 12px;
            line-height: 52px;
            text-align: center;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div style="display: flex; flex-direction:row">


        <div class="numero" id='n1'>1</div>
        <div class="numero" id='n2'>2</div>
        <div class="numero" id='n3'>3</div>
        <div class="numero" id='n4'>4</div>
        <div class="numero" id='n5'>5</div>


    </div>

    </div>
    <script type="module">
        function corGradiente(valores = [10,20,30,40,50]) {
            var vetorCores =[
                '#ff0000', // Vermelho
                '#ff8c00', // Laranja
                '#ffff00', // Amarelo
                '#5564eb', // Azul
                '#7cfc00', // Verde
            ];

            var total = Math.max(...valores);
            console.log(total);

            var coresVal = [];
            valores.forEach(function(e){
                console.log((e/total)*100);
                if((e/total)*100 >= 80 )  coresVal.push(vetorCores[4]);
                else if((e/total)*100 >= 60 && (e/total)*100 < 80 )  coresVal.push(vetorCores[3]);
                else if((e/total)*100 >= 40 && (e/total)*100 < 60 )  coresVal.push(vetorCores[2]);
                else if((e/total)*100 >= 20 && (e/total)*100 < 40 )  coresVal.push(vetorCores[1]);
                else if((e/total)*100 >= 0 && (e/total)*100 < 20 )  coresVal.push(vetorCores[0]);
                
            });
            console.log(coresVal);
            return coresVal;
        }
        var input = [4,8,9,1,2];
        var cor = corGradiente(input);
        $('#n1').css('background-color', cor[0]).text(input[0]);
        $('#n2').css('background-color', cor[1]).text(input[1]);
        $('#n3').css('background-color', cor[2]).text(input[2]);
        $('#n4').css('background-color', cor[3]).text(input[3]);
        $('#n5').css('background-color', cor[4]).text(input[4]);
    </script>
</body>

</html>
