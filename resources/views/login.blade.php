<x-page>
    <x-header></x-header>
    <x-notification></x-notification>

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh;">
            <div class="col-4">
                <div class="bg-red-500">
                    TESTE
                </div>
                <div class="card-body">
                    <form action="{{ route('logar') }}" method="POST">
                        @csrf <!-- Token CSRF para segurança -->
                        <h2 class="text-center">{{ $loto74 }}</h2>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail"
                                name="email" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control" id="password" placeholder="Digite sua senha"
                                name="password" required>
                        </div>
                        <div class="text-center form-group mt-2">
                            <button type="submit" class="btn btn-primary btn-block">Entrar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-footer></x-footer>
</x-page>
