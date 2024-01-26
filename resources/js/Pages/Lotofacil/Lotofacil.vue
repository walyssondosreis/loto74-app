<script lang="ts" setup>

import { Head } from '@inertiajs/vue3';
import Layout from '../../Components/Layout.vue';
import Analisador from '../../Components/Analisador.vue';
import Bilhete from '../../Components/Bilhete.vue';
import Pagination from '../../Shared/Pagination.vue';
import ModalForm from '../../Shared/ModalForm.vue';
import { ref } from 'vue';

defineOptions({ layout: Layout });

defineProps({
    concursos: { type: Object },
    numeros: {type: Object}
});

const mostrarModal = ref(false);

</script>


<template>
    <Head title="Lotofacil" />

    <!-- <FormularioBusca /> -->

    <div class="inset-0 flex items-center justify-center">
        <button type="button" @click="mostrarModal = true"
            class="rounded-md bg-black/20 px-4 py-2 text-sm font-medium text-white hover:bg-black/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75">
            B U S C A R
        </button>
    </div>
    <ModalForm v-bind:show-modal="mostrarModal" @fechar-modal="mostrarModal = false" />


    <div class="flex flex-wrap">
        <div class="flex flex-wrap lg:flex-nowrap md:flex-nowrap justify-center p-4">
            <div class="flex-col lg:p-4 md:p-4">
                <!-- Componente analisador de concursos -->
                {{ numeros }}
                <Analisador :numeros="numeros" />
            </div>
            <!-- Are de Bilhetes -->
            <div class="flex-col w-full border border-roxo-light rounded p-4 mt-4">
                <div class="flex flex-wrap justify-center gap-2">
                    <!-- Componente de bilhetes  -->
                    <div v-for="(cc, idx) in concursos.data" :key="idx">

                        <Bilhete :data="cc.dataApuracao" :titulo="'Concurso ' + cc.id" :sequencia="cc.sequencia"
                            :numeros="cc.numeros" />

                    </div>
                </div>

                <div class="flex justify-center pt-4 ">
                    <!-- Componente de paginação aqui -->
                    <Pagination :links="concursos.links" class="mt-6" />

                </div>

            </div>
        </div>
        <div class="flex w-full justify-center p-4 pt-4 pb-4">
            <!--  Componente ranking de Sequencias -->
        </div>
    </div>

    <!-- <span class="bg-red-400" v-if="$page.props.mensagem" >{{ $page.props.mensagem }}</span> -->
</template>
