{{-- Componente de pagina --}}
<x-page>
    <x-navbar :usuario='$usuario'></x-navbar>

    <x-notification :errors='$errors'></x-notification>

    <div class="container-fluid">
        <div class="row">
            {{-- Componente de formulário --}}
            <x-loto.formulario :filtros='$filtros'></x-loto.formulario>
        </div>
        <div class="row">
            <div class="col-sm-3">

                {{-- Componente analisador de concursos --}}
                <x-loto.analisador :numeros='$numeros'></x-loto.analisador>

                {{-- Ranking de Sequencias --}}
                <x-loto.sequencia :sequencias='$sequencias'></x-loto.sequencia>
            </div>

            <div class="col-sm-9">

                {{-- Cards de Jogos --}}
                <x-loto.bilhete :concursos='$concursos'></x-loto.bilhete>
            </div>
        </div>
    </div>

    @vite(['resources/js/loto.js'])
</x-page>
