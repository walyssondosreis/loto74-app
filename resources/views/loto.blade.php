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
            <div class="float-left sm:w-1/5 w-full">

                {{-- Componente analisador de concursos --}}
                <x-loto.analisador :numeros='$numeros'></x-loto.analisador>


            </div>

            <div class="float-right sm:w-4/5 w-full">

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
            <div class="clear-both"></div>

                    <div class="">
                        {{ $concursos->links() }}
                    </div>

                </div>

            </div>
            <div class="clear-both"></div>
            <div class="">
                {{-- Ranking de Sequencias --}}
                <x-loto.sequencia :sequencias='$sequencias'></x-loto.sequencia>
            </div>
        </div>
    </div>
</x-page>
