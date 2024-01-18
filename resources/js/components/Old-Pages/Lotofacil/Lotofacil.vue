<template>
    <Layout>
        <FormularioBusca />
        <div class="flex flex-wrap">
            <div class="flex flex-wrap lg:flex-nowrap md:flex-nowrap justify-center p-4">
                <div class="flex-col lg:p-4 md:p-4">
                    <!-- Componente analisador de concursos -->
                    <Analisador/>
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

    </Layout>
    <!-- <span class="bg-red-400" v-if="$page.props.mensagem" >{{ $page.props.mensagem }}</span> -->
</template>



<script setup lang="ts">

import { ref, defineProps, onMounted } from 'vue';
import Layout from './Layout.vue';
import FormularioBusca from '@/components/FormularioBusca.vue';
import Analisador from '../components/Analisador.vue';
import Bilhete from '../components/Bilhete.vue';


const { concursos } = defineProps(['concursos']);
console.log(concursos)


</script>
