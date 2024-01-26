<script lang="ts" setup>
import { v4 as uuid } from 'uuid';

defineOptions({
    inheritAttrs: false
});

defineProps({
    id: {
        type: String,
        default() {
            return `text-input-${uuid()}`
        },
    },
    type: {
        type: String,
        default: 'text',
    },
    placeholder: {
        type: String,
    },
    error: String,
    label: String,
    modelValue: String,
});

defineEmits(['update:modelValue']);

function focus() {
    this.$refs.input.focus()
};

function select() {
    this.$refs.input.select()
};

function setSelectionRange(start, end) {
    this.$refs.input.setSelectionRange(start, end)
};

</script>


<template>
    <div :class="$attrs.class">
        <label v-if="label" class="text-sm text-gray-700 font-bold mb-1 flex" :for="id">{{ label }}:</label>
        <input :id="id" ref="input" v-bind="{ ...$attrs, class: null }"
            class="w-full border rounded pl-3 py-2 shadow focus:outline-none hover:border-roxo-claro hover:ring-1 hover:ring-roxo-escuro focus:border-roxo-escuro focus:ring-1 focus:ring-roxo-escuro duration-200"
            :placeholder="placeholder" :class="{ error: error }" :type="type" :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value )" />
        <div v-if="error" class="form-error text-xs text-red-500 mt-2">{{ error }}</div>
    </div>
</template>

