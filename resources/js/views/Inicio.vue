<template>
    <Navbar/>
    <h1>Minha tela inicial</h1>

</template>


<script lang="ts">

import { defineComponent } from 'vue';
import Navbar from '../components/Navbar.vue';

export default defineComponent({
    name: 'Inicio',
    components: { Navbar }
});

</script>
