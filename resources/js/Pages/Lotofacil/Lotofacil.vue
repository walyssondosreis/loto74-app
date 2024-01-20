<template>
    <Head title="Lotofacil" />


    <!-- <FormularioBusca /> -->
    <div class="flex flex-wrap">
        <div class="flex flex-wrap lg:flex-nowrap md:flex-nowrap justify-center p-4">
            <div class="flex-col lg:p-4 md:p-4">
                <!-- Componente analisador de concursos -->
                <Analisador />
            </div>
            <!-- Are de Bilhetes -->
            <div class="flex-col w-full border border-roxo-light rounded p-4 mt-4">
                <div class="flex flex-wrap justify-center gap-2">
                    <!-- Componente de bilhetes  -->
                    <!-- <div v-for="(cc,idx) in concursos" :key="idx">
                    <Bilhete   :data="cc.data_apuracao" :titulo="'Concurso '+cc.id" :sequencia="cc.resultado.numero.sequencia.split(',')" :numeros="cc.resultado.numero.numeros.split(',')"/>

                </div> -->
                </div>

                <div class="flex justify-center pt-4 ">
                    <!-- Componente de paginação aqui -->

                </div>

            </div>
        </div>
        <div class="flex w-full justify-center p-4 pt-4 pb-4">
            <!--  Componente ranking de Sequencias -->
        </div>
    </div>

    <!-- <span class="bg-red-400" v-if="$page.props.mensagem" >{{ $page.props.mensagem }}</span> -->
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { Head } from '@inertiajs/vue3';
import Layout from '../../Shared/Layout.vue';
import FormularioBusca from '../../Components/FormularioBusca.vue';
import Analisador from '../../Components/Analisador.vue';


export default defineComponent({
    name: 'Lotofacil',
    layout: Layout,
    components: {
        Layout,
        Head,
        FormularioBusca,
        Analisador
    },
    data() {
        return {

        };
    },
    methods: {

    },
});
</script>

<style scoped></style>
