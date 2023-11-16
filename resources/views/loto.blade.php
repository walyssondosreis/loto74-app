{{-- Componente de pagina --}}
<x-page>
    <x-navbar :usuario='$usuario'></x-navbar>

    <x-notification :errors='$errors'></x-notification>

    <div class="flex flex-wrap">
        <div class="w-full p-4">
            {{-- Componente de formulário --}}
            <x-loto.formulario :filtros='$filtros'></x-loto.formulario>
        </div>
        <div class="flex flex-wrap lg:flex-nowrap md:flex-nowrap justify-center p-4">
            <div class="lg:p-4 md:p-4">
                {{-- Componente analisador de concursos --}}
                <x-loto.analisador :numeros='$numeros'></x-loto.analisador>

            </div>
            <div class="border-2 border-roxo-light rounded-lg p-4 ">
                <div class="flex flex-wrap justify-evenly">
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

                <div class="flex justify-center pt-4 ">
                    {{ $concursos->links() }}
                </div>

            </div>
        </div>
            {{-- <div class="flex w-full text-lg font-bold tracking-tight p-4 mt-4 text-gray-900 text-center">

                SEQUÊNCIAS
            </div> --}}
        </div>

        <div class="flex w-full justify-center p-4 pt-4 pb-4">
            {{-- Ranking de Sequencias --}}

                <x-loto.sequencia :sequencias='$sequencias'></x-loto.sequencia>
        </div>
    </div>
</x-page>
