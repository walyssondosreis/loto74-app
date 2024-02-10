<script lang="ts" setup>
import { Head } from '@inertiajs/vue3';
import Layout from '../../Components/Layout.vue';
import Bilhete from '../../Components/Bilhete.vue';
import Carrinho from '../../Components/Carrinho.vue';

defineOptions({
    layout: Layout
});

</script>

<template>
    <Head title="Jogar" />
    <div class="flex justify-center">
        <div class="flex flex-wrap justify-center py-4 gap-4">
            <div class="flex">
                <Bilhete modo="edit" />
            </div>
            <div class="flex">
                <Carrinho />
            </div>
        </div>
    </div>
</template>
