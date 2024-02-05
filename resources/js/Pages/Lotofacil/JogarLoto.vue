<script lang="ts" setup>
import { InertiaHead } from '@inertiajs/vue3/types/head';
import Layout from '../../Components/Layout.vue';
import Bilhete from '../../Components/Bilhete.vue';

defineOptions({
    layout: Layout
});

</script>

<template>

<div>
    <Head title="Jogar"/>
    <div class="flex container mx-auto p-4">

        <Bilhete modo="edit"/>
    </div>
</div>

</template>
