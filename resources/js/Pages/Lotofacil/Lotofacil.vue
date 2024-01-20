<template>
    <Head title="Lotofacil" />
    <div class="">

        Meu componente de lotofacil pagina principal
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { Head } from '@inertiajs/vue3';
import Layout from '../../Shared/Layout.vue';


export default defineComponent({
    name: 'Lotofacil',
    layout: Layout,
    components: {
        Layout,
        Head
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
