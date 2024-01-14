
<template>
    <!-- Card Geral -->
    <div class= "flex-col w-max border-gray-500 border rounded p-2 bg-roxo-escuro">
        <!-- Informações do Bilhete -->
        <div class="flex-col justify-center text-white bg-black rounded-t-xl">
            <span class="flex font-medium justify-center text-xl p-2">LOTO 74</span>
            <div class="flex justify-center gap-2 pb-4">
                <span v-for="idx_seq in 5" :key="idx_seq" class="flex border boder-white p-1 rounded">3</span>
            </div>
        </div>
        <!-- Linha -->
        <div v-for="idx_col in 5" :key="idx_col" class="flex items-center p-2 gap-1" >

            <!-- Grupo de Numero -->
            <div v-for="idx_ln in 5" :key="idx_ln" class="flex-col border border-gray-500 p-1 rounded-md bg-green-500" >
                <span class="flex justify-center border border-gray-500 rounded-full w-10 h-10 items-center bg-roxo-escuro text-white" >{{ (idx_col - 1) * 5 + idx_ln }}</span>
            </div>

        </div>
    </div>
    </template>

    <script lang="ts">
    import { defineComponent } from 'vue';

    export default defineComponent({
      name: 'Bilhete',
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
