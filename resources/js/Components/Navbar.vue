<script lang="ts" setup>

import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import { Bars3Icon, BellIcon, XMarkIcon, ChevronDownIcon, MagnifyingGlassIcon } from '@heroicons/vue/24/outline';
import { Link } from '@inertiajs/vue3';
import { INavigationItem } from '../Interfaces/INavigationItem';
import Logo from '../Shared/Logo.vue';
import { useModalStore } from '../Store/ModalStore';

const modalStore = useModalStore();

const props = defineProps({
        navigation: { type: Array<INavigationItem>, default: navigationItens },
        auth: { type: Object }
    });


</script>

<script lang="ts">

const navigationItens: INavigationItem[] = [
    { name: 'Inicio', href: '/', current: false},


    {
        name: 'Lotofácil',
        href: '#',
        current: false,
        subitems: [
            { name: 'Registrar Jogos e Apostas', href: '/lotofacil/jogar', current: false },
            { name: 'Conferir Apostas', href: '#', current: false },
            { name: 'Conferir Números e Jogos', href: '/lotofacil/conferir', current: false },
            { name: 'Acessar base de Jogos', href: '#', current: false },
        ]
    },
    {
        name: 'Atualizar',
        href: '#',
        current: false,
        subitems: [
            { name: 'Atualizar Online (API)', href: '/atualizar?modo=api', current: false },
            { name: 'Atualizar Offline (CSV)', href: '/atualizar?modo=csv', current: false },
        ]
    },
    { name: 'Configurar', href: '#', current: false },
];

export default {}

</script>

<template>
    <Disclosure as="nav" class="bg-gray-800" v-slot="{ open }">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <DisclosureButton
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="absolute -inset-0.5" />
                        <span class="sr-only">Open main menu</span>
                        <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
                        <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
                    </DisclosureButton>
                </div>

                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <!-- Logo do sistema -->
                    <div class="flex flex-shrink-0 items-center">
                        <Link href="/">
                        <Logo class="text-white"></Logo>
                        </Link>
                    </div>

                    <!-- Items do menu -->
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4 justify-center items-center">
                            <div v-for="(item, idx) in navigation" :key="idx" class="flex">
                                <!-- Itens SEM Dropdown -->
                                <Link v-if="!item.subitems" :href="item.href"
                                    :method="item.method ?? 'get' "
                                    :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'rounded-md px-3 py-2 text-md font-medium flex']">
                                    {{ item.name }}
                                </Link>

                                <!-- Itens COM Dropdown -->
                                <Menu as="div" class="relative" v-if="item.subitems">
                                    <MenuButton>
                                        <div :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'rounded-md px-3 py-2 text-md font-medium flex']">

                                            <span>
                                                {{ item.name }}
                                            </span>
                                            <ChevronDownIcon class="ml-2 w-4"/>
                                        </div>
                                    </MenuButton>

                                    <transition enter-active-class="transition ease-out duration-100"
                                        enter-from-class="transform opacity-0 scale-95"
                                        enter-to-class="transform opacity-100 scale-100"
                                        leave-active-class="transition ease-in duration-75"
                                        leave-from-class="transform opacity-100 scale-100"
                                        leave-to-class="transform opacity-0 scale-95">
                                        <MenuItems
                                            class="absolute left-0 top-8 z-10 mt-2 w-48 origin-top-right rounded-md bg-gray-900 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                            <MenuItem v-for="(subitem, idxsi) in item.subitems" :key="idxsi"
                                                v-slot="{ active }">
                                            <Link :href="subitem.href"
                                            :method="subitem.method ?? 'get' "
                                                :class="[active ? 'bg-gray-700 text-white' : 'text-gray-400', 'rounded-md px-3 py-2 block text-sm']">
                                            {{ subitem.name }}
                                            </Link>
                                            </MenuItem>

                                        </MenuItems>
                                    </transition>
                                </Menu>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <!-- Busca Icone -->
                    <button type="button" @click="modalStore.abrirModal"
                        class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none ">
                        <span class="absolute -inset-1.5" />
                        <span class="sr-only">Modal de busca</span>
                        <MagnifyingGlassIcon class="h-6 w-6 sm:h-8 sm:w-8" aria-hidden="true" />
                    </button>
                    <!-- Notificações Icone -->
                    <button type="button"
                        class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none">
                        <span class="absolute -inset-1.5" />
                        <span class="sr-only">Visualizar Notificações</span>
                        <BellIcon class="h-6 w-6 sm:h-8 sm:w-8" aria-hidden="true" />
                    </button>
                    <div class="sm:flex text-white p-2 hidden">
                        {{ auth.user.first_name + ' ' + auth.user.last_name }}
                    </div>
                    <!-- Profile dropdown -->
                    <Menu as="div" class="relative ml-3">
                        <div>
                            <MenuButton
                                class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                <span class="absolute -inset-1.5" />
                                <span class="sr-only">Abrir menu do usuário</span>
                                <img class="h-10 w-10 rounded-full" src="../../../public/images/pika.jpg" alt="" />
                            </MenuButton>
                        </div>
                        <transition enter-active-class="transition ease-out duration-100"
                            enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
                            leave-active-class="transition ease-in duration-75"
                            leave-from-class="transform opacity-100 scale-100"
                            leave-to-class="transform opacity-0 scale-95">
                            <MenuItems
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <MenuItem v-slot="{ active }">
                                <Link :href="`/users/${auth.user.id}/edit`"
                                    :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
                                Meu perfil
                                </Link>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                <Link href="/logout" method="delete"
                                    :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Sair
                                </Link>
                                </MenuItem>
                            </MenuItems>
                        </transition>
                    </Menu>
                </div>
            </div>
        </div>

        <DisclosurePanel class="sm:hidden">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <DisclosureButton v-for="item in navigation" :key="item.name" as="a" :href="item.href"
                    :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'block rounded-md px-3 py-2 text-base font-medium']">
                    {{ item.name }}</DisclosureButton>
            </div>
        </DisclosurePanel>
    </Disclosure>
</template>

