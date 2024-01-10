<template>
    <div class="fixed flex w-full z-10">
        <nav class="flex flex-wrap sm:flex-nowrap w-full relative">
            <!-- Icone do Logo -->
            <div class="flex w-full bg-gray-800 border-b-2 border-white items-center">

                <div @click="toggleMenuSM"
                    class="sm:hidden p-2 flex justify-center items-end h-fit active:scale-90 duration-75">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        class="w-7 h-7 stroke-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                    </svg>

                </div>
                <div class="flex py-4 lg:px-8 justify-center lg:justify-start text-center w-full">

                    <!-- Minha Logo -->
                    <span class="text-white text-3xl select-none font-barcade">
                        ( loto74 )
                    </span>
                </div>
            </div>
            <!-- Itens da Navbar -->
            <div id="menuNav" :class="{ 'hidden': menuSM == false }" class="absolute sm:relative sm:top-0 left-0 top-full sm:block justify-start p-4 sm:p-0 w-40 sm:w-full items-center bg-gray-800 text-gray-300 border-white shadow-lg sm:shadow-none sm:border-b-2 rounded-br-md sm:rounded-none
            ">
                <ul class="flex flex-wrap sm:flex-nowrap w-full text-md py-4 sm:justify-evenly items-center">
                    <li v-for="(item, idx ) in itemsMenu" :key="idx"
                        class="hover:scale-105 hover:bg-gray-600 rounded-lg hover:text-white hover:font-semibold duration-300 px-2 cursor-pointer p-1">
                        <div class="flex">
                            <a :href="item.href" @click="esconderMenuSM"> {{ item.name }}</a>
                        </div>
                    </li>

                    <!-- Pesquisa -->
            <div class="flex">
                <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Modal de busca</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                      </svg>
                </button>


            </div>
                    <!-- Notificações -->
                <button type="button"
                    class="flex relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Visualizar Notificações</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </button>

                    <!-- Perfil do usuário -->
                    <div class="relative flex w-10 h-10 self-end mr-5">

                        <button
                            class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Abrir menu do usuário</span>
                            <img class=" rounded-full" src="../../../public/images/pika.jpg">
                        </button>

                        <div class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            tabindex="-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:rounded-md"
                                tabindex="-1">Sair</a>
                        </div>
                    </div>
                </ul>
            </div>

        </nav>
    </div>
</template>


<script lang="ts">

import { defineComponent } from 'vue';

export default defineComponent({
    name: 'Navbar',
    data() {
        return {
            menuSM: false,
            itemsMenu: [
                {
                    name: 'Inicio',
                    href: '/',
                    current: true,
                },
                {
                    name: 'Atualizar',
                    href: '#',
                    current: false,
                },
                {
                    name: 'Apostar',
                    href: '#',
                    current: false,
                },
                {
                    name: 'Jogar',
                    href: '#',
                    current: false,
                },
                {
                    name: 'Configurar',
                    href: '#',
                    current: false,
                },
            ]
        }
    },
    methods: {
        toggleMenuSM() {
            this.menuSM = !this.menuSM;
        },
        esconderMenuSM() {
            setTimeout(() => {
                this.menuSM = false;
            }, 600)
        },
    }
});


</script>
