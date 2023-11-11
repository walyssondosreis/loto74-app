{{-- Componente de pagina --}}
<x-page>
    <x-navbar :usuario='$usuario'></x-navbar>

    <x-notification :errors='$errors'></x-notification>

    <div class="container-fluid">
        <div class="row">
            {{-- Componente de formulário --}}
            <x-loto.formulario :filtros='$filtros'></x-loto.formulario>
        </div>
        <div class="flex flex-row">
            <div class="w-3/12">

                {{-- Componente analisador de concursos --}}
                <x-loto.analisador :numeros='$numeros'></x-loto.analisador>

                {{-- Ranking de Sequencias --}}
                {{-- <x-loto.sequencia :sequencias='$sequencias'></x-loto.sequencia> --}}
            </div>

            <div class="w-9/12">

                {{-- Cards de Jogos --}}
                <x-loto.bilhete :concursos='$concursos'></x-loto.bilhete>
            </div>
        </div>
    </div>
</x-page>
