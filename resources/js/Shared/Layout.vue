<template>
    <Navbar :auth="auth" />

    <flash-messages />
    <slot></slot>

    <Footer />
</template>

<script lang="ts">

import { defineComponent } from 'vue'
import FlashMessages from './FlashMessages.vue'
import Navbar from './Navbar.vue'
import Footer from './Footer.vue'

export default defineComponent({
    name: 'Layout',
    components: {
        FlashMessages,
        Navbar,
        Footer
    },
    props: {
        auth: Object,
    },
});
</script>
