<div>
    {{-- Mensagens de Error --}}
    @if (isset($errors) && $errors->any())
        <div class="">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Mensagem de Alerta --}}
    @if (session('mensagem'))
        <div x-data="{ showAlert: true }" x-show="showAlert" x-init="setTimeout(() => showAlert = false, 5000)"
            x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed top:4 top-4 right-1/2 translate-x-1/2 lg:top-4 lg:right-4 lg:translate-x-0 w-4/5 lg:w-2/6">
            <div class="flex bg-yellow-100 rounded-lg p-4 mb-4 text-sm text-yellow-700 shadow-md border border-yellow-500"
                role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">Aviso!</span> {{ session('mensagem') }}.
                </div>
            </div>
        </div>
    @endif
</div>
