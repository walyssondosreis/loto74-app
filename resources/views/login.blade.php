<x-page>
    <x-header></x-header>
    <x-notification></x-notification>

    {{-- div equivalente ao meu body --}}
    <div class="
    flex justify-center items-center h-screen
    bg-gradient-to-r from-gray-900 to-roxo-escuro
    {{-- font-inter --}}
    ">

        <main class="flex px-6 drop-shadow-2xl lg:W-3/4 select-none">
            <section class="w-1/2 hidden lg:block rounded-full bg-roxo-claro rounded-r-none ">

                {{-- <img class="motion-reduce:animate-bounce m-auto" src="{{ asset('images/logo-loto/logo-loto-0.png') }}" alt=""> --}}
                <img class="logo-animation m-auto" src="{{ asset('images/logo-loto/logo-loto-0.png') }}" alt="">


            </section>

            <section class="text-center justify-center p-10 flex gap-6 rounded-lg bg-white lg:w-1/2 lg:rounded-l-none">
                <form class="w-full" action="{{ route('logar') }}" method="POST">
                    @csrf <!-- Token CSRF para segurança -->
                    <h2 class="text-4xl mb-6 logo-titulo">{{ $loto74 }}</h2>
                    <div class="mb-2">
                        <label class="text-sm text-gray-700 font-bold mb-1 justify-left flex" for="email">E-mail:</label>
                        <input class="w-full border rounded pl-3 py-2 shadow focus:outline-none hover:border-roxo-claro hover:ring-1 hover:ring-roxo-escuro focus:border-roxo-escuro focus:ring-1 focus:ring-roxo-escuro duration-200" type="email" id="email" placeholder="Digite seu e-mail" name="email"
                            required>
                    </div>
                    <div class="mb-5">
                        <label class="text-sm text-gray-700 font-bold mb-1 justify-left flex" for="password">Senha:</label>
                        <input class="w-full border rounded pl-3 py-2 shadow focus:outline-none hover:border-roxo-claro hover:ring-1 hover:ring-roxo-escuro focus:border-roxo-escuro focus:ring-1 focus:ring-roxo-escuro duration-200" type="password" id="password" placeholder="Digite sua senha"
                            name="password" required>
                    </div>
                    <div class="text-sm font-bold ">
                        <button class="w-1/2 bg-roxo-claro text-white py-2 rounded-lg shadow-2xl hover:bg-roxo-light duration-150 " type="submit" class="">Entrar</button>
                    </div>
                </form>
            </section>

        </main>

        <x-footer></x-footer>

    </div>

</x-page>
