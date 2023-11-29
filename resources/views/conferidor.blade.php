{{-- Componente de pagina --}}
<x-app>

    <x-navbar></x-navbar>

    <x-notification :errors='$errors'></x-notification>
    <div class="flex justify-center">
        <div class="flex-col w-4/6 p-4">
            {{-- Card de conferência --}}
            @foreach ($cards as $idx=>$card)
                @component('components.conferidor.card')
                    @slot('card', $card)
                    @slot('nome',$idx)
                    @slot('premiado', $premiado[$idx])
                    @slot('npremiado', $npremiado[$idx])
                    @slot('sequencia', $card['seq'])
                    @slot('analisador', $analisador[$idx])

                @endcomponent
            @endforeach

        </div>
        <div class="flex-col w-2/6 p-4">
            {{-- Ranking Melhores Apostas --}}
            @component('components.conferidor.ranking')
                @slot('ranking', $ranking)
            @endcomponent

        </div>

    </div>

</x-app>
