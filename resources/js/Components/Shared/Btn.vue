<script setup>
const props = defineProps({
    type: {
        type: String,
        default: 'button'
    },
    block: {
        type: Boolean,
        default: false,
    }
});

const emit = defineEmits(['click'])

const onClick = () => emit('click');
</script>
<template>
    <div>
        <button
            :type="props.type"
            class="bg-primary ripple-bg-primary py-4 px-6 block text-white rounded-full select-none w-full font-bold"
            @click="onClick"
        >
            <slot />
        </button>
    </div>
</template>
