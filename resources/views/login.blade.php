<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Adicione o link para o CSS do Bootstrap -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

</head>

<body>
    @if (session('mensagem'))
        <div class="alert alert-success">
            {{ session('mensagem') }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh;">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('logar') }}" method="POST">
                            @csrf <!-- Token CSRF para segurança -->
                            <h2 class="text-center">LOTOv74</h2>
                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="email" class="form-control" id="email"
                                    placeholder="Digite seu e-mail" name="email" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="password">Senha:</label>
                                <input type="password" class="form-control" id="password"
                                    placeholder="Digite sua senha" name="password" required>
                            </div>
                            <div class="text-center form-group mt-2">
                                <button type="submit" class="btn btn-primary btn-block">Entrar</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
