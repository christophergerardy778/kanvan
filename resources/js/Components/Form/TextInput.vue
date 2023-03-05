<script setup>
import { toRef } from "vue";
import { useField } from "vee-validate";

const props = defineProps({
    label: {
        type: String,
    },
    name: {
        type: String,
        default: '',
    },
    type: {
        type: String,
        default: 'text'
    },
    modelValue: {
        type: String,
        default: '',
    },
    rules: {
        required: false,
    }
});

const modelValueRef = toRef(props, 'modelValue');
const {errorMessage, value} = useField(modelValueRef, props.rules);

defineEmits(['update:modelValue'])
</script>

<template>
    <div class="flex flex-col mb-4">
        <label for="">{{ props.label }}</label>
        <input
            :type="props.type"
            :name="props.name"
            :value="props.modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
        />
        <div>
            {{ errorMessage }}
        </div>
    </div>
</template>
