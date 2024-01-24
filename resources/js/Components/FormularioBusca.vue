<template>
    <div class="">
        <!-- Filtros de Jogos -->
        <form method="post" @submit.prevent="buscarComFiltro">
            <div class="flex-col justify-center rounded-sm">
                <!-- Campos do formulario -->
                <div class="flex justify-center w-full gap-2 flex-wrap lg:flex-nowrap">
                    <!-- <div class="flex-col w-full">
                <TextInput label="Números | Jogos" placeholder="Ex.: 1-2-3-4-5-6-7-8-9-10-11-12-13-14-15 ou 245,456" />
            </div> -->
                    <div class="flex-col w-full">
                        <TextInput label="Concurso" v-model="form.concursos"
                            placeholder="Ex.: 2204 ou 2204,2207,2306,n ou 2204-2209" />
                    </div>

                    <div class="flex-col w-full">
                        <TextInput label="Sequência" v-model="form.sequencias"
                            placeholder="Ex.: 33423 ou 33423,33324,33333,n" />
                    </div>
                    <div class="flex-col">
                        <TextInput label="Data de Início" v-model="form.data_ini" type="date" />
                    </div>
                    <div class="flex-col">
                        <TextInput label="Data de Fim" v-model="form.data_fim" type="date" />
                    </div>
                </div>
                <!-- Botões -->
                <div class="flex justify-center text-sm font-bold p-2 gap-2 mt-4">
                    <button type="reset"
                        class="inline-flex justify-center rounded-md border border-transparent bg-gray-200 px-4 py-2 text-sm font-medium text-roxo-escuro hover:bg-gray-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-roxo-escuro focus-visible:ring-offset-2">Cancelar</button>
                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-gray-200 px-4 py-2 text-sm font-medium text-roxo-escuro hover:bg-purple-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-roxo-escuro focus-visible:ring-offset-2">Buscar</button>
                </div>
                <!-- Em baixo botões -->
                <div class="flex justify-center">

                    <Link class="flex text-xs" href="/">Limpar Filtros</Link>
                </div>

            </div>
        </form>

    </div>
</template>


<script lang="ts">
import { defineComponent } from 'vue';
import TextInput from '../Shared/TextInput.vue';
import pickBy from 'lodash/pickBy';
import { Link } from '@inertiajs/vue3';

export default defineComponent({
    name: 'FormularioBusca',
    components: {
        TextInput,
        Link
    },
    data() {
        return {
            form: {
                concursos: '',
                sequencias: '',
                data_ini: '',
                data_fim: ''
            }
        }
    },

    methods: {
        buscarComFiltro() {

            console.log(this.form);
            this.$inertia.get('/', pickBy(this.form), { preserveState: true })
        }
    },
});

</script>
