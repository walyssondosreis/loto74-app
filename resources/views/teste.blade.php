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
        <div class=" number-container">

            <div class="indicador">1</div>
            <div class="numero">2</div>
            <div class="indicador">3</div>
        </div>
        <div class="indicador-seq">2</div>

    </div>

    </div>
</body>

</html>
