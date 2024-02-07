<script lang="ts" setup>
import { InertiaHead } from '@inertiajs/vue3/types/head';
import Layout from '../../Components/Layout.vue';
import Bilhete from '../../Components/Bilhete.vue';
import Carrinho from '../../Components/Carrinho.vue';

defineOptions({
    layout: Layout
});

</script>

<template>

<div class="flex justify-center">
    <Head title="Jogar"/>
    <div class="flex container mx-auto p-4 gap-4 max-h-fit">
        <div>
            <Bilhete modo="edit"/>
        </div>
        <div>
            <Carrinho/>
        </div>
    </div>
</div>

</template>
