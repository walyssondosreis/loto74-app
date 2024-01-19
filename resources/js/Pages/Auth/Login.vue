<template>
    <Head title="Login" />
    <div class="flex justify-center items-center bg-gradient-to-l from-gray-900 to-roxo-escuro h-screen">
        <div class="flex px-6 drop-shadow-2xl lg:W-3/4 select-none">
            <section class="w-1/2 hidden lg:block rounded-full bg-roxo-claro rounded-r-none ">

                <img class="m-auto animate-balanco pointer-events-none"
                    src="../../../../public/images/logo-loto/logo-loto-0.png" alt="">

            </section>
            <section class="text-center justify-center p-10 flex gap-6 rounded-lg bg-white lg:w-1/2 lg:rounded-l-none">
                <form class="w-full" @submit.prevent="login">
                    <!-- @csrf Token CSRF para segurança -->
                    <!-- <h2 class="text-4xl mb-6 font-barcade text-roxo-claro">(loto74)</h2> -->
                    <Logo />
                    <text-input v-model="form.email" :error="form.errors.email" class="mt-10" label="Email" type="email" autofocus autocapitalize="off" />
                    <text-input v-model="form.password" :error="form.errors.password" class="mt-6" label="Password" type="password" />
                    <!-- <div class="mb-2">
                        <label class="text-sm text-gray-700 font-bold mb-1 flex" for="email">E-mail:</label>
                        <input v-model="form.email"
                            class="w-full border rounded pl-3 py-2 shadow focus:outline-none hover:border-roxo-claro hover:ring-1 hover:ring-roxo-escuro focus:border-roxo-escuro focus:ring-1 focus:ring-roxo-escuro duration-200"
                            type="text" id="email" placeholder="Digite seu e-mail" name="email">
                        <span class="flex text-red-500 p-4" v-if="form.errors.email">{{ form.errors.email }}</span>

                    </div>
                    <div class="mb-5">
                        <label class="text-sm text-gray-700 font-bold mb-1 flex" for="password">Senha:</label>
                        <input v-model="form.password"
                            class="w-full border rounded pl-3 py-2 shadow focus:outline-none hover:border-roxo-claro hover:ring-1 hover:ring-roxo-escuro focus:border-roxo-escuro focus:ring-1 focus:ring-roxo-escuro duration-200"
                            type="text" id="password" placeholder="Digite sua senha" name="password">
                        <span class="flex text-red-500 p-4" v-if="form.errors.password">{{ form.errors.password }}</span>
                    </div> -->
                    <div class="mb-5">
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


<script lang="ts">

import { Head } from '@inertiajs/vue3'
import Logo from '../../Shared/Logo.vue';
import TextInput from '../../Shared/TextInput.vue';
// import LoadingButton from '../../Shared/LoadingButton.vue';

import { defineComponent } from 'vue';
export default defineComponent({
    components: {
        Head,
        Logo,
         TextInput,
        //  LoadingButton
    },
    data() {
        return {
            form: this.$inertia.form({
                email: 'johndoe@example.com',
                password: 'secret2',
                remember: false,
            })
        }
    },
    methods: {
        login() {
            this.form.post('/login')
        }
    }
});


</script>
