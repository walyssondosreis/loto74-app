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
                        <Bilhete v-for="(idx,cc) in concursos"  data="15/01/2024" titulo="Concurso 2577" :sequencia="[3,3,3,3,3]" :numeros="[2,5,20,15,16,18,10,24,25]"/>
                    </div>

                    <div class="flex justify-center pt-4 ">
                        <!-- {{ $concursos->links() }} -->
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


<script lang="ts">

import { defineComponent } from 'vue';
import Layout from './Layout.vue';
import FormularioBusca from '@/components/FormularioBusca.vue';
import Analisador from '../components/Analisador.vue'
import Bilhete from '../components/Bilhete.vue';

export default defineComponent({
    name: 'Home',
    components: { Layout, FormularioBusca, Analisador, Bilhete },
    props: {
        concursos: {type: Array}
    },
    mounted(){
        console.log(this.concursos);
    }
});

</script>
