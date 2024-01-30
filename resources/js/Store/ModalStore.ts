import { defineStore } from "pinia";
import { ref } from "vue";

export const useModalStore = defineStore("ModalStore", () => {
    const exibirModal = ref(false);

    function abrirModal() {
        exibirModal.value = true;
    }
    function fecharModal(){
        exibirModal.value = false;
    }

    return {
        exibirModal,
        abrirModal,
        fecharModal,
    };
});
