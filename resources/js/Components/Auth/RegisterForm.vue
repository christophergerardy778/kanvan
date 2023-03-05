<script setup>
import TextInput from "@/Components/Form/TextInput.vue";
import Btn from "@/Components/Shared/Btn.vue";
import RegisterUser from "@/App/Register/App/RegisterUser";
import * as yup from "yup";
import { ref } from "vue";

const userData = ref({
    name: '',
    password: '',
    email: ''
});

const createUserForm = () => RegisterUser(userData);

const rules = {
    name: yup.string().required().min(4),
    email: yup.string().required().email(),
    password: yup.string().required().min(6).nonNullable()
}
</script>

<template>
    <form @submit.prevent="createUserForm">
        <text-input
            label="Full name"
            v-model="userData.name"
            :rules="rules.name"
        />

        <text-input
            label="Email"
            v-model="userData.email"
            :rules="rules.email"
        />

        <text-input
            label="Password"
            type="password"
            v-model="userData.password"
            :rules="rules.password"
        />

        <btn type="submit">
            Register
        </btn>
    </form>
</template>
