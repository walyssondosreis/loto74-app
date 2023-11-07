document.addEventListener('DOMContentLoaded', (event) => {
    // Envolver o script nesta função DOM garante que o script só seja executado após o carregamento da página
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

        valores.forEach(function (e) {
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
        $('[id^="ind-top' + i + '"]').each(function () {
            vet.push($(this).text());
        });

        var indColor = corGradiente(vet, tema);

        $('[id^="ind-top' + i + '"]').each(function (idx) {
            $(this).css({
                'background-color': indColor[idx]['background'],
                'color': indColor[idx]['color'],
            });
        });
        $('[id^="ind-bas' + i + '"]').each(function (idx) {
            $(this).css({
                'background-color': indColor[idx]['background'],
                'color': indColor[idx]['color'],
            });
        });
        // console.log(vet);
    }
});
