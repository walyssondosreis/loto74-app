<template>

<div class="p-4">
<!-- Filtros de Jogos -->
<form action="" method="POST">
    <div class="flex-col justify-center p-4 border border-black rounded-md">
        <!-- Campos do formulario -->
        <div class="flex justify-center w-full gap-2 flex-wrap lg:flex-nowrap">
            <div class="flex-col w-full">
                <label class="flex form-label " for="jogos">Numeros | Jogos:</label>
                <input type="text" class="flex form-input border-black" id="jogos" name="jogos"
                    placeholder='Ex.: 1-2-3-4-5-6-7-8-9-10-11-12-13-14-15 ou 245,456'>
            </div>
            <div class="flex-col w-full">
                <label class="flex form-label " for="concursos">Concurso:</label>
                <input type="text" class="flex form-input border-black" id="concursos" name="concursos"
                    placeholder="Ex.: 2204 ou 2204,2207,2306,n ou 2204-2209">
            </div>

            <div class="flex-col w-full">
                <label class="flex form-label" for="sequencias">Sequência:</label>
                <input type="text" class="flex form-input border-black" id="sequencias" name="sequencias"
                    placeholder="Ex.: 33423 ou 33423,33324,33333,n">
            </div>
            <div class="flex-col">
                <label class="flex form-label" for="data_ini">Data de Início:</label>
                <input type="date" class="flex form-input border-black" id="data_ini" name="data_ini">
            </div>
            <div class="flex-col">
                <label class="flex form-label" for="data_fim">Data de Fim:</label>
                <input type="date" class="flex form-input border-black" id="data_fim" name="data_fim">
            </div>
        </div>
        <!-- Botões -->
        <div class="flex justify-center text-sm font-bold p-2 gap-2">
            <button type="reset"
                class="flex px-6 py-1 border border-black rounded-md">Cancelar</button>
            <button type="submit"
                class="flex px-6 py-1 border border-black rounded-md">Buscar</button>
        </div>
        <!-- Em baixo botões -->
        <div class="flex justify-center">

            <a class="flex text-xs" href="">Limpar
                Filtros</a>
        </div>

    </div>
</form>

</div>

</template>


<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({

});

</script>
