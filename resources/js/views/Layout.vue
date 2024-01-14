<template>
<div>

    <Navbar/>
    <slot>

    </slot>
    <Footer/>
</div>

</template>


<script lang="ts">

import { defineComponent } from 'vue';
import Navbar from '../components/Navbar.vue';
import Footer from '../components/Footer.vue';

export default defineComponent({
    components:{
        Navbar,
        Footer
    }
})

</script>
