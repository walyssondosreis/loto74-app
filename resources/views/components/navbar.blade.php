{{-- Navbar tailwind --}}
<nav x-data="{ open_mobile: false }" class="w-full z-10 bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button x-on:click="open_mobile = ! open_mobile" type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <span class="text-white font-barcade text-3xl select-none">
                        {{ $loto74 }}
                    </span>
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium">Início</a>
                        {{-- Dropdown 1 Atualizar --}}
                        <div x-data="{ open: false }" class="relative inline-block text-left">
                            <button x-on:click="open=!open"
                                class="text-gray-300 flex items-center hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Atualizar
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-3 h-3 m-1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>

                            </button>
                            <div x-show="open" x-on:click.outside="open=false" :class="{ 'hidden': !open }"
                                class="hidden origin-top-right absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                <a href="{{ route('atualizar', ['modo' => 'api']) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:rounded-md">Via API</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:rounded-md">Via Arquivo CSV</a>
                            </div>
                        </div>
                        {{-- Dropdown 2 Painel --}}
                        <div class="relative inline-block text-left">
                            <button
                                class="text-gray-300 flex items-center hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Painel
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-3 h-3 m-1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>

                            </button>
                            <div
                                class=" hidden origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700">Analisador</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700">Conferidor</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700">Comparador</a>
                            </div>
                        </div>

                        <a href="#"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Apostar</a>
                        <a href="#"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Configurar</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="text-white mr-2 relative hidden lg:block">
                    <span>{{ $usuario }}</span>
                </div>
                <button type="button"
                    class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Visualizar Notificações</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </button>

                <!-- Profile dropdown -->
                <div x-data="{ open: false}" class="relative ml-3">

                    <button x-ref="button" x-on:click="open = ! open" :aria-expanded="open"
                        :aria-controls="$id('dropdown-button')" id="btn-dropdown-profile" type="button"
                        class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        aria-haspopup="true">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">Abrir menu do usuário</span>
                        <img class="h-8 w-8 rounded-full" src="{{ asset('images/pika.jpg') }}" alt="">
                    </button>

                    <div x-show="open" x-on:click.outside="open=false" :class="{ 'hidden': !open }"
                        class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="{{ route('deslogar') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:rounded-md"
                            role="menuitem" tabindex="-1" id="user-menu-item-2">Sair</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="sm:hidden hidden" x-show="open_mobile" :class ="{ 'hidden' : !open}">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <a href="#"
                class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"> Início</a>
            <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Atualizar</a>
            <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Painel</a>
            <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Apostar</a>
            <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Configurar</a>
        </div>
    </div>

</nav>
