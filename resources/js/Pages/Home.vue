<template>

<h1>PAGINA INICIAL VC ESTA LOGADO</h1>

<span class="bg-red-400" v-if="$page.props.mensagem" >{{ $page.props.mensagem }}</span>

</template>


<script lang="ts">

import { Link } from '@inertiajs/vue3';
import { defineComponent } from 'vue';
// import Navbar from '../components/Navbar.vue';

export default defineComponent({
    name: 'Home',
    components: {
    Link
},
    props: {
        // title: { type: String }
    }
});

</script>
