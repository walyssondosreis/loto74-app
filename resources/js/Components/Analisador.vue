<script lang="ts" setup>

const props = defineProps({
    numeros: { type: Object }
})

function numero(idx_lin: number, idx_col: number): number {
    return (idx_lin - 1) * 5 + idx_col;
}

function total(linha:null | number = null) {

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
</script>

<template>
    <!-- Card Geral -->
    <div class="flex-col w-max border-gray-500 border rounded p-2">
        <!-- <div class="flex justify-center pb-4 pt-2">
        <span class="font-medium">A N A L I S A D O R</span>
    </div> -->
        <!-- Linha -->
        <div v-for="idx_lin in 5" :key="idx_lin" class="flex items-center border border-gray-500 py-1 gap-1">
            <!-- Indicador 1 de Linha -->
            <div class="flex p-1">
                <span class="flex text-xs writing-mode-vertical-left">{{ percentual(total(idx_lin),total()) }} %</span>
            </div>
            <!-- Grupo de Numero -->
            <div v-for="idx_col in 5" :key="idx_col" class="flex-col border border-gray-500 p-1 rounded-md">
                <span class="flex text-xs justify-center
             ">{{ percentual(numeros[numero(idx_lin, idx_col)], total()) }} %</span>
                <span class="flex justify-center border border-gray-500 rounded-full w-10 h-10 items-center">{{
                    numero(idx_lin, idx_col) }}</span>
                <span class="flex text-xs justify-center">{{ numeros[numero(idx_lin, idx_col)] }}</span>
            </div>
            <!-- Indicardor 2 de Linha -->
            <div class="flex p-1">
                <span class="flex text-xs writing-mode-vertical-right"> {{ total(idx_lin) }}</span>
            </div>
        </div>
    </div>
</template>
