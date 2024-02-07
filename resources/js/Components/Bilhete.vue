<script lang="ts" setup>

const props = defineProps({
    modo: { type: String, default: 'show' }, // show | edit
    data: { type: String, require: false },
    titulo: { type: String, require: false },
    numeros: { type: Array<Number>, require: false },
    sequencia: { type: Array<Number>, require: false }
});

function verificaNumero(numero: String) {
    if (props.sequencia && props.numeros && props.numeros.includes(String(numero))) {
        return true;
    }
    return false;
}

</script>

<template>
    <!-- Card Geral Modo SHOW-->
    <div v-if="modo == 'show'" class="flex-col w-max border-gray-500 border rounded p-4 bg-roxo-escuro h-fit">
        <!-- Informações do Bilhete -->
        <div class="flex-col justify-center text-white bg-black rounded-xl border border-gray-300 mb-2">
            <span class="flex font-medium justify-center text-xl p-2 uppercase tracking-widest pb-0">{{ data }}</span>
            <span class="flex font-medium justify-center text-xl p-2 uppercase tracking-widest">{{ titulo }}</span>
            <div class="flex justify-center gap-2 pb-4">
                <span v-for="(nseq, idx_seq) in sequencia" :key="idx_seq"
                    class="flex border boder-white px-1 rounded-md text-xl justify-center">{{ nseq }}</span>
            </div>
        </div>
        <!-- Linha -->
        <div v-for="idx_col in 5" :key="idx_col" class="flex items-center p-2 gap-1">

            <!-- Grupo de Numero -->
            <div v-for="idx_ln in 5" :key="idx_ln"
                :class="[{ 'bg-roxo-claro border-roxo-light': verificaNumero((idx_col - 1) * 5 + idx_ln) }, 'flex-col border-2 border-gray-500 p-1 rounded-md text-gray-500']">
                <span
                    :class="[{ 'bg-gradient-to-b from-roxo-claro to-roxo-escuro text-white border-white': verificaNumero((idx_col - 1) * 5 + idx_ln) }, 'flex justify-center border border-gray-500 rounded-full w-10 h-10 items-center text-2xl']">{{
                        (idx_col - 1) * 5 + idx_ln }}</span>
            </div>

        </div>
    </div>

    <!-- Card Geral Modo EDIT -->
    <div v-if="modo == 'edit'" class="flex-col w-max border-gray-500 border rounded p-4 bg-roxo-escuro h-fit">
        <!-- Informações do Bilhete -->
        <div class="flex-col justify-center text-white bg-black rounded-xl border border-gray-300 mb-2">
            <span class="flex font-medium justify-center text-xl p-2 uppercase tracking-widest pb-0">{{ data }}</span>
            <span class="flex font-medium justify-center text-xl p-2 uppercase tracking-widest">{{ titulo }} BILHETAO</span>
            <div class="flex justify-center gap-2 pb-4">
                <span v-for="(nseq, idx_seq) in [0,0,0,0,0]" :key="idx_seq"
                    class="flex border boder-white px-1 rounded-md text-xl justify-center">{{ nseq }}</span>
            </div>
        </div>
        <!-- Linha -->
        <div v-for="idx_col in 5" :key="idx_col" class="flex items-center p-2 gap-1">

            <!-- Grupo de Numero -->
            <div v-for="idx_ln in 5" :key="idx_ln"
                :class="[{ 'bg-roxo-claro border-roxo-light': verificaNumero((idx_col - 1) * 5 + idx_ln) }, 'flex-col border-2 border-gray-500 p-1 rounded-md text-gray-500']">
                <span
                    :class="[{ 'bg-gradient-to-b from-roxo-claro to-roxo-escuro text-white border-white': verificaNumero((idx_col - 1) * 5 + idx_ln) }, 'flex justify-center border border-gray-500 rounded-full w-10 h-10 items-center text-2xl']">{{
                        (idx_col - 1) * 5 + idx_ln }}</span>
            </div>

        </div>
        <div class="flex justify-center">
            <input type="text" name="" id="">
        </div>
    </div>
</template>
