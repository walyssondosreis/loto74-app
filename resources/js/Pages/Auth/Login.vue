<script lang="ts" setup>

import Logo from '../../Shared/Logo.vue';
import TextInput from '../../Shared/TextInput.vue';
import { router, Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = ref(
        router.form({
        email: 'johndoe@example.com',
        password: 'secret',
        remember: false,
    })
);

function login() {
    form.value.post('/login')
}

</script>


<template>
    <Head title="Login" />
    <div class="flex justify-center items-center bg-gradient-to-l from-gray-900 to-roxo-escuro h-screen">
        <div class="flex flex-wrap justify-center px-6 drop-shadow-2xl select-none">
            <section class="text-center justify-center p-4 flex gap-6 rounded-md bg-white">
                <form class="w-full" @submit.prevent="login">
                    <!-- @csrf Token CSRF para segurança -->
                    <div class="mb-4">

                        <Logo/>
                    </div>
                    <text-input v-model="form.email" :error="form.errors.email" class="p-2" label="Email" type="email"
                        autofocus autocapitalize="off" />
                    <text-input v-model="form.password" :error="form.errors.password" class="p-2" label="Senha"
                        type="password" />

                    <div class="flex p-2 mb-5">
                        <label class="flex items-center mt-6 select-none" for="remember">
                            <input id="remember" v-model="form.remember" class="mr-1" type="checkbox" />
                            <span class="text-sm">Lembrar senha</span>
                        </label>
                    </div>
                    <div class="text-sm font-bold ">
                        <button
                            class="w-1/2 bg-roxo-claro text-white py-2 rounded-lg shadow-2xl hover:bg-roxo-light duration-150 "
                            type="submit">Entrar</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</template>

