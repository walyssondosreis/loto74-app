<script lang="ts" setup>
import { XCircleIcon, RectangleGroupIcon, CheckCircleIcon, CurrencyDollarIcon, XMarkIcon, ShoppingCartIcon } from '@heroicons/vue/24/outline';
import { cloneVNode, ref } from 'vue';

const jogos = ref({

    'jogo teste1': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    'jogo teste2': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    'jogo teste3': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    'jogo teste4': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    'jogo teste5': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    'jogo teste6': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    'jogo teste7': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    'jogo teste8': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    'jogo teste9': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    'jogo teste12': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    'jogo teste13': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    'jogo teste14': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    'jogo teste16': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    'jogo teste17': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
}
);
function calcSeq(jogo: Array<Number>) {
    let seq = [0, 0, 0, 0, 0];

}
</script>

<template>
    <div class="flex-col">
        <!-- Área de Inclusão -->
        <div
            class="flex-col border-2 rounded-t-lg border-roxo-escuro border-b-0 p-2 space-y-1 overflow-y-auto custom-scrollbar h-bilhete bg-white">
            <!-- Área de Item Jogo -->
            <div
                v-show="Object.keys(jogos).length!==0"
                 v-for="(val, idx) in jogos" :key="idx"
                class="flex border-2 border-roxo-escuro rounded-md bg-gradient-to-tr from-black to-roxo-escuro  text-white">
                <!-- Indicador de Quantidade de Números -->
                <div class="flex items-end">
                    <span
                        class="flex bg-yellow-300 text-roxo-escuro border-2 rounded-bl-md border-yellow-300 border-l-0 border-b-0 p-1 rounded-tr-lg text-xs font-semibold">15</span>
                </div>
                <!-- Área central de Nome|Jogo|Sequencia -->
                <div class="flex-col w-full">
                    <!-- Nome do Jogo -->
                    <div class="flex justify-center text-xs uppercase">
                        <span class="bg-yellow-300 text-roxo-escuro px-4 rounded-b-full mb-2 font-semibold tracking-wide">{{ idx }}</span>
                    </div>
                    <!-- Numeros do Jogo -->
                    <div class="flex px-6 pb-2 justify-center text-sm">

                        <span class="font-medium tracking-widest">{{ val.toString() }}</span>
                    </div>
                    <!-- Sequencia do Jogo -->
                    <div class="flex justify-center ">
                        <span
                            class="px-4 text-xs border border-yellow-300 border-b-0 bg-yellow-300 text-roxo-escuro font-semibold rounded-t-full">33333</span>
                    </div>


                </div>
                <!-- Icone de Remoção do  Jogo -->
                <div class="flex p-2">
                    <span class=" w-4 h-4 text-yellow-300 cursor-pointer">
                        <XMarkIcon />
                    </span>
                </div>
            </div>
            <!-- Caso Carrinho Vazio -->
            <div
            v-show="Object.keys(jogos).length === 0"
            class="flex justify-center w-full h-full items-center">
                <!-- Icone de Carrinho -->
                <div class="text-gray-200 w-40 animate-balanco">

                    <ShoppingCartIcon/>
                </div>
            </div>
        </div>
        <!-- Área de Totais -->
        <div class="flex-col space-y-2 border-2 border-roxo-escuro bg-roxo-escuro text-white p-2 text-sm font-semibold border-t-white">
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
                <div class="flex border bg-gradient-to-tl from-roxo-escuro to-black hover:border-roxo-light hover:text-white transition-all text-roxo-light border-roxo-claro p-1 rounded-md items-center gap-1 px-2 cursor-pointer">
                    <span class="w-5">
                        <XCircleIcon />
                    </span>
                    <span>Limpar</span>
                </div>
                <div class="flex border bg-gradient-to-tl from-roxo-escuro to-black hover:border-roxo-light hover:text-white transition-all text-roxo-light border-roxo-claro p-1 rounded-md items-center gap-1 px-2 cursor-pointer">
                    <span class="w-5">
                        <RectangleGroupIcon />
                    </span>
                    <span>Grupo</span>
                </div>
                <div class="flex border bg-gradient-to-tl from-roxo-escuro to-black hover:border-roxo-light hover:text-white transition-all text-roxo-light border-roxo-claro p-1 rounded-md items-center gap-1 px-2 cursor-pointer">
                    <span class="w-5">
                        <CheckCircleIcon />
                    </span>
                    <span>Salvar</span>
                </div>
                <div class="flex border bg-gradient-to-tl from-roxo-escuro to-black hover:border-roxo-light hover:text-white transition-all text-roxo-light border-roxo-claro p-1 rounded-md items-center gap-1 px-2 cursor-pointer">
                    <span class="w-5">
                        <CurrencyDollarIcon />
                    </span>
                    <span>Apostar</span>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.custom-scrollbar::-webkit-scrollbar {
    width: 0;
    /* Oculta a barra de rolagem lateral */
}</style>
