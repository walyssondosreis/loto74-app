{{-- Componente de pagina --}}
<x-app>

    @php
        var_dump($ranking);
    @endphp
    <x-navbar></x-navbar>

    <x-notification :errors='$errors'></x-notification>
    <div class="flex justify-center">
        <div class="flex-col w-4/6 p-4">
            {{-- Card de conferência --}}
            @for ($i = 0; $i < 2; $i++)
                <x-conferidor.card></x-conferidor.card>
            @endfor


        </div>
        <div class="flex-col w-2/6 p-4">
            {{-- Ranking Melhores Apostas --}}
            @component('components.conferidor.ranking')
                @slot('ranking',$ranking)
            @endcomponent

        </div>

    </div>

</x-app>
