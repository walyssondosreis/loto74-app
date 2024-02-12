import { defineStore } from "pinia";
import { ref } from "vue";

export const useCarrinhoStore = defineStore("CarrinhoStore", () => {
    const itens = ref({
        "Jogo Teste Store": [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],

    });

    function removerItem(idx: String){
        // console.log('Clicou pra remover item '+idx)
        delete this.itens[idx];
    }

    return {
        itens,
        removerItem
    };
});
