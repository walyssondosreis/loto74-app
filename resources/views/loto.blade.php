{{-- Componente de pagina --}}
<x-page>
    <x-navbar :usuario='$usuario'></x-navbar>

    <x-notification :errors='$errors'></x-notification>

    <div class="bg-red-600 flex flex-wrap">
        <div class="bg-yellow-200 w-full">
            {{-- Componente de formulário --}}
            <x-loto.formulario :filtros='$filtros'></x-loto.formulario>
        </div>
        <div class="bg-red-200 flex flex-wrap lg:flex-nowrap md:flex-nowrap justify-center">
            <div class="">

                {{-- Componente analisador de concursos --}}
                <x-loto.analisador :numeros='$numeros'></x-loto.analisador>

            </div>

            <div class="">

                {{-- Cards de Jogos --}}

                <div class="">
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

                    <div class="bg-purple-300 flex justify-center">
                        {{ $concursos->links() }}
                    </div>

                </div>

            </div>

        </div>
        <div class="bg-blue-300 flex">
            {{-- Ranking de Sequencias --}}
            <x-loto.sequencia :sequencias='$sequencias'></x-loto.sequencia>
        </div>
    </div>
</x-page>
