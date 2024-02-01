<script setup lang="ts">

import FlashMessages from '../Shared/FlashMessages.vue';
import ModalForm from '../Shared/ModalForm.vue';
import Navbar from '../Components/Navbar.vue';
import Footer from './Footer.vue';

const props = defineProps({
    auth: {type: Object }
});

</script>

<template>
    <Navbar :auth="auth" />

    <flash-messages />
    <ModalForm />

    <slot></slot>

    <Footer />
</template>

