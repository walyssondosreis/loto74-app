<script lang="ts" setup>

import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from '@headlessui/vue';
import FormularioBusca from '../Components/FormularioBusca.vue';
import { XMarkIcon } from '@heroicons/vue/24/outline';

defineProps(['showModal']);
defineEmits(['fecharModal']);


</script>

<template>
    <TransitionRoot appear :show="showModal" as="template">
        <Dialog as="div" @close="$emit('fecharModal')" class="relative z-10">
            <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100"
                leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-black/25" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div class="flex min-h-full items-center justify-center p-4 text-center">
                    <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100" leave="duration-200 ease-in" leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95">
                        <DialogPanel
                            class="w-full max-w-fit transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all">
                            <div class="flex">
                                <div class="flex justify-start w-full">
                                    <DialogTitle as="h3" class="flex text-lg font-medium leading-6 text-gray-900">
                                        Filtro de busca
                                    </DialogTitle>
                                </div>
                                <div class="flex justify-end ">
                                    <button type="button" @click="$emit('fecharModal')">
                                        <XMarkIcon class="w-5 hover:text-red-500" />
                                    </button>
                                </div>
                            </div>
                            <div class="my-4">
                                <p class="text-sm text-gray-500">
                                    Filtro para concursos
                                </p>
                            </div>

                            <FormularioBusca />

                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>


