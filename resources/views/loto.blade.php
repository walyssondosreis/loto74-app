{{-- Componente de pagina --}}
<x-page>
    <x-navbar :usuario='$usuario'></x-navbar>

    <x-notification :errors='$errors'></x-notification>

    <div class="flex flex-wrap">
        <div class="hidden w-full p-4">
            {{-- Componente de formulário --}}
            <x-loto.formulario :filtros='$filtros'></x-loto.formulario>
        </div>
        <div class="hidden flex flex-wrap lg:flex-nowrap md:flex-nowrap justify-center p-4">
            <div class="lg:p-4 md:p-4">
                {{-- Componente analisador de concursos --}}
                <x-loto.analisador :numeros='$numeros'></x-loto.analisador>

            </div>
            <div class="border-2 border-roxo-light rounded-lg p-4 ">
                <div class="flex flex-wrap justify-center">
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

                <div class="flex justify-center pt-4">
                    {{ $concursos->links() }}
                </div>

            </div>
        </div>
        <div class="flex w-full">
            {{-- Ranking de Sequencias --}}
            <x-loto.sequencia :sequencias='$sequencias'></x-loto.sequencia>
        </div>
    </div>
</x-page>
