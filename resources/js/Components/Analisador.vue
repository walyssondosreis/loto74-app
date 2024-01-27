<script lang="ts" setup>
import { onMounted, watchEffect } from 'vue';


const props = defineProps({
    numeros: { type: Object }
})

function numero(idx_lin: number, idx_col: number): number {
    return (idx_lin - 1) * 5 + idx_col;
}

function total(linha: null | number = null) {

    if (linha) {
        switch (linha) {
            case 1:
                return props.numeros[1] + props.numeros[2] + props.numeros[3] + props.numeros[4] + props.numeros[5];
            case 2:
                return props.numeros[6] + props.numeros[7] + props.numeros[8] + props.numeros[9] + props.numeros[10];
            case 3:
                return props.numeros[11] + props.numeros[12] + props.numeros[13] + props.numeros[14] + props.numeros[15];
            case 4:
                return props.numeros[16] + props.numeros[17] + props.numeros[18] + props.numeros[19] + props.numeros[20];
            case 5:
                return props.numeros[21] + props.numeros[22] + props.numeros[23] + props.numeros[24] + props.numeros[25];
            default: return 0;
        }
        return 30;
    }
    return Object.values(props.numeros).reduce((acum, vl) => acum + vl, 0);

}

function percentual(qtd, total) {
    return !isNaN(qtd / total) ? ((qtd / total) * 100).toFixed(2) : 0;
}

function colorizar() {
    let cardNums = document.querySelectorAll('[id^="cardNum"]');
    /*
    Todo 'cardNum'  tem um 'num' e um totalNum
    */
    let cardLin = document.querySelectorAll('[id^="cardLin"]');
    /*
    Todo 'cardLin'  tem um 'totalLin'
    */


    // Colore os indicadores de linha
    let vet = [];

    cardLin.forEach(function (el) {
        vet.push(el.querySelector('#totalLin').innerHTML)
    });
    console.log(vet);


    var indColor = corGradiente(vet);
    console.log(indColor);

    cardLin.forEach(function (el,idx) {
        vet.push(el.querySelector('#totalLin').innerHTML)
        el.style.background = indColor[idx]['background'];
        el.style.textColor = indColor[idx]['blue'];
    });
    // for (let i = 0; i < 5; i++) {
    //         vet.push($('#cardLin'+i).css('background-color', indColor[i]));
    // }
}

// Função que recebe vetor calcula cor e retorna vetor de cores
function corGradiente(valores, tema = null) {
    if (tema == null) {
        var tema = [
            { // 1
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
    }

    var total = Math.max(...valores);
    // console.log(total);

    var coresVal = [];

    valores.forEach(function (e) {
        // console.log((e / total) * 100);
        if (total == 0) coresVal.push(tema[0]);
        else if ((e / total) * 100 >= 85.80) coresVal.push(tema[6]);
        else if ((e / total) * 100 >= 71.50 && (e / total) * 100 < 85.80) coresVal.push(tema[
            5]);
        else if ((e / total) * 100 >= 57.20 && (e / total) * 100 < 71.50) coresVal.push(tema[
            4]);
        else if ((e / total) * 100 >= 42.90 && (e / total) * 100 < 57.20) coresVal.push(tema[
            3]);
        else if ((e / total) * 100 >= 28.60 && (e / total) * 100 < 42.90) coresVal.push(tema[
            2]);
        else if ((e / total) * 100 >= 14.30 && (e / total) * 100 < 28.60) coresVal.push(tema[
            1]);
        else if ((e / total) * 100 >= 0 && (e / total) * 100 < 14.30) coresVal.push(tema[0]);

    });
    // console.log(coresVal);
    return coresVal;
}

watchEffect(() => {
    colorizar()
});

onMounted(() => colorizar());
</script>

<template>
    {{ corGradiente([1, 2, 10, 15, 20]) }}
    <!-- Card Geral -->
    <div class="flex-col w-max border-gray-500 border rounded p-2">
        <!-- <div class="flex justify-center pb-4 pt-2">
        <span class="font-medium">A N A L I S A D O R</span>
    </div> -->
        <!-- Linha -->
        <div :id="'cardLin' + idx_lin" v-for="idx_lin in 5" :key="idx_lin"
            class="flex items-center border border-gray-500 py-1 gap-1">
            <!-- Indicador 1 de Linha -->
            <div class="flex p-1">
                <span class="flex text-xs writing-mode-vertical-left">{{ percentual(total(idx_lin), total()) }} %</span>
            </div>
            <!-- Grupo de Numero -->
            <div :id="'cardNum' + numero(idx_lin, idx_col)" v-for="idx_col in 5" :key="idx_col"
                class="flex-col border border-gray-500 p-1 rounded-md">
                <span class="flex text-xs justify-center
             ">{{ percentual(numeros[numero(idx_lin, idx_col)], total()) }} %</span>
                <span id="num" class="flex justify-center border border-gray-500 rounded-full w-10 h-10 items-center">{{
                    numero(idx_lin, idx_col) }}</span>
                <span id="totalNum" class="flex text-xs justify-center">{{ numeros[numero(idx_lin, idx_col)] }}</span>
            </div>
            <!-- Indicardor 2 de Linha -->
            <div class="flex p-1">
                <span id="totalLin" class="flex text-xs writing-mode-vertical-right"> {{ total(idx_lin) }}</span>
            </div>
        </div>
    </div>
</template>
