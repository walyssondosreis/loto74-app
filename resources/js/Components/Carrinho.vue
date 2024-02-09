<script lang="ts" setup>
import { XCircleIcon, RectangleGroupIcon, CheckCircleIcon, CurrencyDollarIcon, XMarkIcon } from '@heroicons/vue/24/outline';
import { ref } from 'vue';

const jogos = ref({

    'jogo teste1': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    'jogo teste2': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
}
);
function calcSeq(jogo: Array<Number>){
    let seq = [0,0,0,0,0];

}
</script>

<template>
    <div class="flex-col">
        <!-- Área de Inclusão -->
        <div
            class="flex-col border-4 border-roxo-light border-b-0 p-4 space-y-3 overflow-y-auto custom-scrollbar h-bilhete bg-roxo-escuro">
            <!-- Área de Item Jogo -->
            <div v-for="(val, idx) in jogos" :key="idx"
                class="flex border-2 border-yellow-300 rounded-md bg-roxo-escuro text-white">
                <!-- Indicador de Quantidade de Números -->
                <div class="flex items-end">
                    <span
                        class="flex  border-2 border-yellow-300 border-l-0 border-b-0 p-1 rounded-tr-lg text-xs italic">15</span>
                </div>
                <!-- Área central de Nome|Jogo|Sequencia -->
                <div class="flex-col w-full">
                    <!-- Nome do Jogo -->
                    <div class="flex justify-center text-xs uppercase">
                        <span class="bg-yellow-300 text-roxo-escuro px-4 rounded-b-full mb-2 font-semibold">{{ idx }}</span>
                    </div>
                    <!-- Numeros do Jogo -->
                    <div class="flex px-6 pb-2 justify-center text-md">

                        <span class="font-semibold">{{ val.toString() }}</span>
                    </div>
                    <!-- Sequencia do Jogo -->
                    <div class="flex justify-center ">
                        <span class="px-4 text-xs border border-yellow-300 border-b-0 bg-yellow-300 text-roxo-escuro font-semibold rounded-t-full">33333</span>
                    </div>


                </div>
                <!-- Icone de Remoção do  Jogo -->
                <div class="flex p-2">
                    <span class=" w-4 h-4 text-yellow-300">
                        <XMarkIcon />
                    </span>
                </div>
            </div>
        </div>
        <!-- Área de Totais -->
        <div class="flex-col space-y-2 border border-gray-500 bg-roxo-light p-2 text-sm">
            <!-- Área de Informações do Carrinho -->
            <div class="flex w-full text-xs px-2 justify-center">

                <!-- Quantidade Jogos -->
                <div class="flex gap-x-2 px-1 justify-end">
                    <span>Total: </span>
                    <span>45 Jogos</span>
                    <span>( R$ 344,99 )</span>

                </div>
            </div>
            <!-- Área de Ações do Carrinho -->
            <div class="flex justify-center text-center gap-2 text-xs px-2">
                <div class="flex border border-gray-500 p-1 rounded-md items-center gap-1 px-2">
                    <span class="w-5">
                        <XCircleIcon />
                    </span>
                    <span>Limpar</span>
                </div>
                <div class="flex border border-gray-500 p-1 rounded-md items-center gap-1 px-2">
                    <span class="w-5">
                        <RectangleGroupIcon />
                    </span>
                    <span>Grupo</span>
                </div>
                <div class="flex border border-gray-500 p-1 rounded-md items-center gap-1 px-2">
                    <span class="w-5">
                        <CheckCircleIcon />
                    </span>
                    <span>Salvar</span>
                </div>
                <div class="flex border border-gray-500 p-1 rounded-md items-center gap-1 px-2">
                    <span class="w-5">
                        <CurrencyDollarIcon />
                    </span>
                    <span>Apostar</span>
            </div>
        </div>
    </div>
</div></template>

<style scoped>.custom-scrollbar::-webkit-scrollbar {
    width: 0;
    /* Oculta a barra de rolagem lateral */
}</style>
