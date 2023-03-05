<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import AuthLayout from "@/Layouts/AuthLayout.vue";
import RegisterForm from "@/Components/Auth/RegisterForm.vue";

const props = defineProps({
    imageCover: {
        type: String,
        default: '',
    }
});
</script>

<template>
    <Head title="Register - Create and account 😁"/>

    <auth-layout :image-cover="props.imageCover">
        <template #form>
            <div class="mb-10">
                <p class="text-[16px] text-primary">
                    Start for free
                </p>

                <h1 class="text-[36px] font-bold">
                    Create your account!
                </h1>

                <p class="text-[16px] text-primary">
                    Already a member? <a href="" class="text-red">Log In</a>
                </p>
            </div>

            <register-form />


            <p class="text-center mt-6">
                Don't have and account? <a href="" class="text-red">Sign Up</a>
            </p>
        </template>
    </auth-layout>
</template>
