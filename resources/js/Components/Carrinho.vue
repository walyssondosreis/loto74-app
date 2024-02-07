<script lang="ts" setup>
import { XCircleIcon, RectangleGroupIcon, CheckCircleIcon, CurrencyDollarIcon, XMarkIcon } from '@heroicons/vue/24/outline';

</script>

<template>
    <div class="flex-col">
        <!-- Área de Inclusão -->
        <div class="flex-col border border-gray-500 p-4 space-y-3 overflow-y-auto max-h-bilhete custom-scrollbar">
            <!-- Área de Item Jogo -->
            <div v-for="(item, idx) in 200" :key="idx" class="flex border border-gray-500 rounded-lg">
                <!-- Indicador de Quantidade de Números -->
                <div class="flex items-center">
                    <span class="flex  border border-gray-500 border-l-0 p-2">15</span>
                </div>
                <!-- Área central de Nome|Jogo|Sequencia -->
                <div class="flex-col w-full">
                    <!-- Nome do Jogo -->
                    <div class="flex justify-center p-2">
                        <span>Nome do jogo</span>
                    </div>
                    <!-- Numeros do Jogo -->
                    <div class="flex px-6 pb-2 justify-center">
                        <span>1-2-3-4-5-6-7-8-9-10-11-12-13-14-15</span>
                    </div>
                    <!-- Sequencia do Jogo -->
                    <div class="flex justify-center">
                        <span class=" border border-gray-500 border-b-0 px-6 py-1">3 3 3 3</span>
                    </div>


                </div>
                <!-- Icone de Remoção do  Jogo -->
                <div class="flex p-2 h-fit">
                    <span class=" w-6"><XMarkIcon/></span>
                </div>
            </div>
        </div>
        <!-- Área de Totais -->
        <div class="flex-col space-y-2 border border-gray-500 p-2 text-sm">
            <!-- Área de Informações do Carrinho -->
            <div class="flex-col w-full text-xs px-2">

                <!-- Quantidade Jogos -->
                <div class="flex gap-x-2 px-1 justify-end">
                    <span>Quantidade:</span>
                    <span>45 Jogos</span>
                </div>
                <!-- Valor Total -->
                <div class="flex gap-x-2 px-1 justify-end">
                    <span>Valor Estimado:</span>
                    <span>R$ 344,99</span>
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
