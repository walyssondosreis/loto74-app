{{-- Componente de pagina --}}
<x-page>
    <x-navbar :usuario='$usuario'></x-navbar>

    <x-notification :errors='$errors'></x-notification>

    <div class="container-fluid">
        <div class="row">
            {{-- Componente de formulário --}}
            <x-loto.formulario :filtros='$filtros'></x-loto.formulario>
        </div>
        <div class="">
            <div class="">

                {{-- Componente analisador de concursos --}}
                <x-loto.analisador :numeros='$numeros'></x-loto.analisador>

                {{-- Ranking de Sequencias --}}
                {{-- <x-loto.sequencia :sequencias='$sequencias'></x-loto.sequencia> --}}
            </div>

            <div class="">

                {{-- Cards de Jogos --}}

                <div class="">
                    <div class="">
                        <?php foreach ($concursos as $cc) : ?>
                        {{-- Componente de bilhete --}}
                        @component('components.loto.bilhete')
                            @slot('concurso', $cc->id)
                            @slot('numeros', $cc->resultado->numero->numeros)
                            @slot('sequencia', $cc->resultado->numero->sequencia)
                            @slot('data', $cc->data_apuracao)
                        @endcomponent
                        <?php endforeach; ?>
                    </div>
                    <div class="">
                        {{ $concursos->links() }}
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-page>
