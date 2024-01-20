<template>
    <div class="flex text-center border-2 border-black rounded-lg p-4 mb-4 flex-wrap lg:flex-nowrap justify-center">
        <div class="flex-col">
            <div class="p-4">
                <!-- AQUI VAI O LOOP QUE EXIBE A SEQUENCIA -->
                <span class="p-1 border-2 font-bold border-black rounded"></span>

            </div>

            <div class="">
                <!-- AQUI VAI O COMPONENTE DO ANALISADOR -->
            </div>
        </div>
        <div class="flex-col w-full p-4">
            <div class="p-4 border-2 border-black">AQUI_VAI_O_NOME_DO_JOGO</div>
            <div class="flex flex-wrap">
                <div class="flex-col lg:w-1/2 p-2 w-full">
                    <div class="flex m-1">
                        <span
                            class="flex border-2 border-black rounded-r-none rounded-md p-2 justify-center w-full">Premiado</span>
                        <span
                            class="flex w-10 border-2 p-3 border-black rounded-r-md justify-center border-l-0 text-xs">100%
                        </span>
                    </div>
                    <!-- LOOP QUE EXIBE PONTOS FIXOS -->
                    <div class="flex">
                        <span class="border-2 border-black p-2 w-1/2 m-1">15 pts</span>
                        <span class="border-t-2 border-b-2 border-black p-2 w-1/2 m-1">STATUS_CARD</span>
                    </div>

                </div>
                <div class="flex-col lg:w-1/2 p-2 w-full">
                    <!-- Botão Não Premiado -->
                    <div class="flex m-1">
                        <span class="flex border-2 border-black rounded-r-none rounded-md p-2 justify-center w-full">Não
                            Premiado</span>
                        <span
                            class="flex w-10 border-2 p-3 border-black rounded-r-md justify-center border-l-0 text-xs">100%
                        </span>
                    </div>
                    <!-- Exibe quantidade de pontos feitos -->
                    <!-- Loop que exibe pontos fixos -->
                    <div class="flex">
                        <span class="border-2 border-black p-2 w-1/2 m-1">{{ $idx }} pts</span>
                        <span class="border-t-2 border-b-2 border-black p-2 w-1/2 m-1">{{ $cs }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'CardConferidor',
    data() {
        return {

        };
    },
    methods: {

    },
});
</script>

<style scoped></style>
