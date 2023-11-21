<x-app>
    <x-header></x-header>
    <x-notification></x-notification>

    {{-- div equivalente ao meu body --}}
    <div class="flex justify-center items-center h-screen bg-gradient-to-l from-gray-900 to-roxo-escuro">

        <main class="flex px-6 drop-shadow-2xl lg:W-3/4 select-none">
            <section class="w-1/2 hidden lg:block rounded-full bg-roxo-claro rounded-r-none ">

                <img class="m-auto animate-balanco pointer-events-none" src="{{ asset('images/logo-loto/logo-loto-0.png') }}" alt="">

            </section>

            <section class="text-center justify-center p-10 flex gap-6 rounded-lg bg-white lg:w-1/2 lg:rounded-l-none">
                <form class="w-full" action="{{ route('logar') }}" method="POST">
                    @csrf <!-- Token CSRF para segurança -->
                    <h2 class="text-4xl mb-6 font-barcade text-roxo-claro">{{ $loto74 }}</h2>
                    <div class="mb-2">
                        <label class="form-label" for="email">E-mail:</label>
                        <input class="form-input" type="email" id="email" placeholder="Digite seu e-mail" name="email" required>
                    </div>
                    <div class="mb-5">
                        <label class="form-label" for="password">Senha:</label>
                        <input class="form-input" type="password" id="password" placeholder="Digite sua senha" name="password" required>
                    </div>
                    <div class="text-sm font-bold ">
                        <button class="w-1/2 bg-roxo-claro text-white py-2 rounded-lg shadow-2xl hover:bg-roxo-light duration-150 " type="submit">Entrar</button>
                    </div>
                </form>
            </section>

        </main>

        <x-footer></x-footer>

    </div>

</x-app>
