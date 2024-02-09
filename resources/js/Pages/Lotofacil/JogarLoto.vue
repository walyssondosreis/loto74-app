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
        <div class="flex justify-center p-4 space-x-4">
            <div>
                <Bilhete modo="edit" />
            </div>
            <div>
                <Carrinho />
            </div>
        </div>
    </div>
</template>
