<template>
    <div class="container mx-auto flex justify-center p-4 pt-10 pb-10 border-t-2 border-t-black mt-10 text-center w-4/5">
        <p>&copy; {{ ano }} INOV4DEV.<br>Todos os direitos reservados.</p>
    </div>
</template>


<script lang="ts">
import { defineComponent } from 'vue';

interface datatype {
    ano: string
}

export default defineComponent({
    data(): datatype {
        const data = new Date();
        return {
            ano: data.getFullYear().toString()
        }
    }
});

</script>
