<script lang="ts" setup>

const data = new Date();

const ano = data.getFullYear().toString();

</script>


<template>
    <div class="container mx-auto flex justify-center p-4 pt-10 pb-10 border-t border-t-black mt-10 text-center w-4/5">
        <p>&copy; {{ ano }} INOV4DEV.<br>Todos os direitos reservados.</p>
    </div>
</template>


