{{-- Componente de pagina --}}
<x-app>
    <x-navbar></x-navbar>

    <x-notification :errors='$errors'></x-notification>
    <div class="flex justify-center">
        {{-- Card de conferência --}}
        @for ($i=0; $i < 2; $i++)
        <x-aposta.card-confere></x-aposta.card-confere>

        @endfor

        {{-- Ranking Melhores Apostas --}}
        <x-aposta.ranking></x-aposta.ranking>
    </div>
</x-app>
