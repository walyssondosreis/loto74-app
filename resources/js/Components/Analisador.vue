<template>
<!-- Card Geral -->
<div class= "flex-col w-max border-gray-500 border rounded p-2">
    <!-- <div class="flex justify-center pb-4 pt-2">
        <span class="font-medium">A N A L I S A D O R</span>
    </div> -->
    <!-- Linha -->
    <div v-for="idx_col in 5" :key="idx_col" class="flex items-center border border-gray-500 py-1 gap-1" >
        <!-- Indicador 1 de Linha -->
        <div class="flex p-1">
            <span class="flex text-xs writing-mode-vertical-left">100%</span>
        </div>
        <!-- Grupo de Numero -->
        <div v-for="idx_ln in 5" :key="idx_ln" class="flex-col border border-gray-500 p-1 rounded-md" >
            <span class="flex text-xs justify-center
             ">100%</span>
            <span class="flex justify-center border border-gray-500 rounded-full w-10 h-10 items-center" >{{ (idx_col - 1) * 5 + idx_ln }}</span>
            <span class="flex text-xs justify-center">1000</span>
        </div>
        <!-- Indicardor 2 de Linha -->
        <div class="flex p-1" >
            <span class="flex text-xs writing-mode-vertical-right" >1000</span>
        </div>
    </div>
</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'Analisador',
  data() {
    return {

    };
  },
  methods: {

  },
});
</script>

<style scoped>

</style>
