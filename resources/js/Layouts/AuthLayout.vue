<script setup>
import { computed } from "vue";

const props = defineProps({
    imageCover: {
        type: String,
        default: '',
    }
})

const backgroundStyle = computed(() => {
    return {
        backgroundImage: `url("${props.imageCover}")`
    }
});
</script>
<template>
    <div class="grid grid-cols-2 h-screen flex justify-center">
        <div class="grid">
            <div class="flex items-center justify-center">
                <div class="max-w-[60%] w-full">
                    <slot name="form"/>
                </div>
            </div>
        </div>

        <div class="bg-cover h-screen bg-center" :style="backgroundStyle">
            <div class="h-screen bg-primary bg-opacity-50">
                <div class="flex flex-col justify-center h-screen items-center px-10">
                    <h1 class="text-[48px] text-white font-bold">Kanbam App</h1>
                    <p class="text-red font-semibold">By Christopher Gerardy</p>
                </div>
            </div>
        </div>
    </div>
</template>
