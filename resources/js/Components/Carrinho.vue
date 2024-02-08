<script lang="ts" setup>
import { XCircleIcon, RectangleGroupIcon, CheckCircleIcon, CurrencyDollarIcon, XMarkIcon } from '@heroicons/vue/24/outline';
import { ref } from 'vue';

const numeros = ref([
    [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
]);
</script>

<template>
    <div class="flex-col">
        <!-- Área de Inclusão -->
        <div class="flex-col border border-gray-500 p-4 space-y-3 overflow-y-auto custom-scrollbar h-bilhete">
            <!-- Área de Item Jogo -->
            <div v-for="(item, idx) in 100" :key="idx" class="flex border border-gray-500 rounded-md">
                <!-- Indicador de Quantidade de Números -->
                <div class="flex items-center">
                    <span class="flex  border border-gray-500 border-l-0 px-1 text-xs">15</span>
                </div>
                <!-- Área central de Nome|Jogo|Sequencia -->
                <div class="flex-col w-full">
                    <!-- Nome do Jogo -->
                    <div class="flex justify-center p-1 text-sm">
                        <span>Nome do jogo</span>
                    </div>
                    <!-- Numeros do Jogo -->
                    <div v-for="(val,idx) in numeros" :key="idx" class="flex px-6 pb-2 justify-center text-sm">
                        <span>1-2-3-4-5-6-7-8-9-10-11-12-13-14-15</span>
                    </div>
                    <!-- Sequencia do Jogo -->
                    <div class="flex justify-center">
                        <span class=" border border-gray-500 border-b-0 px-4 text-xs">3 3 3 3</span>
                    </div>


                </div>
                <!-- Icone de Remoção do  Jogo -->
                <div class="flex p-2">
                    <span class=" w-4"><XMarkIcon/></span>
                </div>
            </div>
        </div>
        <!-- Área de Totais -->
        <div class="flex-col space-y-2 border border-gray-500 p-2 text-sm">
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
                    <span class="w-5"><XCircleIcon/></span>
                    <span>Limpar</span>
                </div>
                <div class="flex border border-gray-500 p-1 rounded-md items-center gap-1 px-2">
                    <span class="w-5"><RectangleGroupIcon/></span>
                    <span>Grupo</span>
                </div>
                <div class="flex border border-gray-500 p-1 rounded-md items-center gap-1 px-2">
                    <span class="w-5"><CheckCircleIcon/></span>
                    <span>Salvar</span>
                </div>
                <div class="flex border border-gray-500 p-1 rounded-md items-center gap-1 px-2">
                    <span class="w-5"><CurrencyDollarIcon/></span>
                    <span>Apostar</span>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.custom-scrollbar::-webkit-scrollbar {
  width: 0;  /* Oculta a barra de rolagem lateral */
}
</style>
