<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import AuthLayout from "@/Layouts/AuthLayout.vue";
import TextInput from "@/Components/Form/TextInput.vue";
import Btn from "@/Components/Shared/Btn.vue";
import { LoginUser } from "@/App/Login/App/LoginUser";
import { ref } from "vue";

const props = defineProps({
    imageCover: {
        type: String,
        default: '',
    }
})

const credentials = ref({
    email: '',
    password: '',
});

const loginUser = () => LoginUser(credentials);
</script>

<template>
    <Head title="Login"/>

    <auth-layout :image-cover="props.imageCover">
        <template #form>
            <div class="mb-10">
                <h1 class="text-[36px] font-bold">
                    Welcome back! 👋
                </h1>

                <p class="text-[16px] text-primary">
                    Enter your credentials to access your account
                </p>
            </div>

            <form @submit.prevent="loginUser">
                <text-input label="Email" v-model="credentials.email "/>
                <text-input label="Password" type="password" v-model="credentials.password" />

                <p class="text-red my-6">
                    Forgot your password?
                </p>

                <btn type="submit">
                    Log In
                </btn>
            </form>

            <p class="text-center mt-6">
                Don't have and account? <a href="" class="text-red">Sign Up</a>
            </p>
        </template>
    </auth-layout>
</template>
