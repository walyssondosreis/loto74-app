<script lang="ts" setup>
import { onUpdated } from 'vue';


const props = defineProps({
    sequencias: {type: Object}
})


</script>

<template>

<div class="flex-col justify-center items-center max-h-ranking overflow-y-scroll custom-scrollbar bg-gradient-to-b from-roxo-claro to-transparent  w-full">
    <div v-for="(val, idx) in sequencias" :key="idx" class="flex gap-2 border border-white p-1 text-sm" >
        <span>{{ val.posicao }}º</span>
        <span class="w-full">{{ val.sequencia }}</span>
        <span>{{ val.qtd }}</span>
    </div>
</div>

</template>

<style scoped>
.custom-scrollbar::-webkit-scrollbar {
  width: 0;  /* Oculta a barra de rolagem lateral */
}
</style>
