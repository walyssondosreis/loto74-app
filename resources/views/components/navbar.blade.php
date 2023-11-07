<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            {{ $titulo }}
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Início</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Atualizar
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('atualizar', ['modo' => 'api']) }}">Via
                                API</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('atualizar', ['modo' => 'csv']) }}">Via
                                Arquivo
                                CSV</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Painel
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Conferidor</a></li>
                        <li><a class="dropdown-item" href="">Analisador</a></li>
                        <li><a class="dropdown-item" href="">Comparador</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Apostar
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Configurar
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Usuários</a></li>
                    </ul>
                </li>
            </ul>
            @auth

                <div class="d-flex align-items-center">
                    <span class="nome-usuario">{{ $usuario }}</span>
                    <li class="nav-item dropdown ">

                        <a class="nav-link " role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="icone-usuario" src="{{ asset('images/pika.jpg') }}">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('deslogar') }}">Sair</a></li>
                        </ul>
                    </li>

                </div>
            @endauth
        </div>
    </div>
</nav>
