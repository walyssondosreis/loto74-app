<script lang="ts" setup>

import { Head } from '@inertiajs/vue3';
import Layout from '../../Components/Layout.vue';
import Analisador from '../../Components/Analisador.vue';
import Bilhete from '../../Components/Bilhete.vue';
import Pagination from '../../Shared/Pagination.vue';
import Ranking from '../../Components/Ranking.vue';
import { onMounted, onUpdated,watchEffect, ref, watch } from 'vue';

defineOptions({ layout: Layout });

const props = defineProps({
    concursos: { type: Object },
    numeros: { type: Object },
    sequencias: { type: Object }
});

const sequenciasList = ref(props.sequencias);
const buscaEmRankingInput = ref('');

function comparaParteDaString(stringOriginal, parteComparada) {
    const escapedPart = parteComparada.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    const regex = new RegExp(escapedPart, 'i');
    return regex.test(stringOriginal);
}

function buscaEmRanking() {
    let sequencias = props.sequencias
    if (buscaEmRankingInput.value != '') {
        sequenciasList.value = sequencias.filter(function (e) {
            let seq = e.sequencia.replace(/,/g,'');
            // return seq == buscaEmRankingInput.value;
            return comparaParteDaString(seq,buscaEmRankingInput.value.replace(/,/g,''));

        });
    } else {
        sequenciasList.value = props.sequencias;
    }

}

watch(props,()=>buscaEmRanking());


</script>


<template>
    <Head title="Lotofacil" />

    <!-- <FormularioBusca /> -->


    <div class="flex-col">
        <div class="flex gap-2 flex-wrap sm:border mx-auto lg:p-4 md:p-4 justify-center">
            <!-- Componente analisador de concursos -->
            <div class="flex-col">

                <Analisador :numeros="numeros" />
            </div>
            <!-- Card de Ranking -->
            <div class="flex-col p-4 bg-roxo-escuro text-white border border-gray-500 rounded-r-lg h-96 text-center">
                <div class="flex justify-center bg-red-500 h-full">
                    <Ranking :sequencias="sequenciasList" />
                </div>
                <!-- Campo de filtro de Sequencia -->
                <div class="flex justify-center p-2 bg-roxo-claro rounded-md ">

                    <input v-model="buscaEmRankingInput" @keyup="buscaEmRanking" placeholder="Encontrar sequência"
                        class="text-black p-2 rounded-md text-sm" type="text">
                </div>
            </div>
            <!-- Card de Informações -->
            <div class="flex-col p-4 bg-roxo-escuro text-white border border-gray-500 rounded-r-lg min-w-96">
                <div class="flex-col">
                    <span class="flex mb-4 text-xl ">Analisador</span>
                    <ul class="flex-col font-medium ">
                        <li>O número 10 é o que mais sai</li>
                        <li>O número 24 é o que menos sai</li>
                        <li>Existem 2456 concursos sendo analisados</li>
                        <li>Existem 35 sequências sendo analisadas</li>
                    </ul>
                </div>
                <div class="flex-col">
                    <span class="flex my-4 text-xl">Filtros Aplicados</span>
                    <ul>
                        <li>Data Inicio: 10/1/2004</li>
                        <li>Data Fim: 4/2/2004</li>
                        <li>Concursos: 3,60,42,56</li>
                        <li>Sequências: 33333,33243</li>
                    </ul>
                </div>
                <div class="flex-col">
                    <span class="flex my-4 text-xl ">Ranking de Sequências</span>
                    <ul>
                        <li>33333 é a sequência que mais sai</li>
                        <li>Foram sorteadas as novas sequências 14354,13566</li>
                        <li>Este periodo somou para as 10 primeiras sequências de todos os tempos 5 vezes</li>
                        <li>Este periodo alterou o ranking das 10 primeiras sequência de todos os tempos 2 vezes</li>
                        <li> A quantidade de sequências do ano é de 20</li>
                        <li>Foram 23 sequências repetidas em relação ao período</li>
                        <li>Foram 13 sequências inéditas em relação ao período</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap lg:flex-nowrap md:flex-nowrap justify-center p-4">
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
