{{-- Componente de pagina --}}
<x-app>

    <x-navbar></x-navbar>

    <x-loto.formulario :filtros=[]></x-loto.formulario>

    <x-notification :errors='$errors'></x-notification>
    <div class="flex justify-center flex-wrap">
        <div class="flex-col lg:w-4/6 p-4 w-full order-2 lg:order-1">
            {{-- Card de conferência --}}
            @foreach ($cards as $idx=>$card)
                @component('components.conferidor.card')
                    @slot('card', $card)
                    @slot('nome',$idx)
                    @slot('premiado', $premiado[$idx])
                    @slot('npremiado', $npremiado[$idx])
                    @slot('analisador', $analisador[$idx])

                @endcomponent
            @endforeach

        </div>
        <div class="flex-col lg:w-2/6 p-4 w-full order-1 lg:order-1">
            {{-- Ranking Melhores Apostas --}}
            @component('components.conferidor.ranking')
                @slot('ranking', $ranking)
            @endcomponent

        </div>

    </div>

</x-app>
