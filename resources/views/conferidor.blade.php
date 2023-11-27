{{-- Componente de pagina --}}
<x-app>
    <x-navbar></x-navbar>

    <x-notification :errors='$errors'></x-notification>
<div class="flex flex-wrap lg:flex-nowrap text-center border-2 border-black rounded-lg m-4 lg:w-2/5 p-4">
    <div class="flex-col">
        <div class="p-4">
            <span class="p-1 border-2 border-roxo-light rounded">3</span>
            <span class="p-1 border-2 border-roxo-light rounded">3</span>
            <span class="p-1 border-2 border-roxo-light rounded">3</span>
            <span class="p-1 border-2 border-roxo-light rounded">3</span>
            <span class="p-1 border-2 border-roxo-light rounded">3</span>
        </div>
        <div class="w-72">
            <x-loto.analisador :numeros=[]></x-loto.analisador>
        </div>
    </div>
    <div class="flex-col w-full p-4" >
        <div class="p-4 border-2 border-black">(345) @walyssondosreis</div>
        <div class="flex">
            <div class="flex-col w-1/2 p-2">
                <span class="flex border-2 m-1 border-black rounded-md p-2 justify-center">Premiado</span>
                <div class="flex">
                    <span class="border-2 border-black p-2 w-1/2 m-1">15 pts</span>
                    <span class="border-t-2 border-b-2 border-black p-2 w-1/2 m-1">1</span>
                </div>
                <div class="flex">
                    <span class="border-2 border-black p-2 w-1/2 m-1">14 pts</span>
                    <span class="border-t-2 border-b-2 border-black p-2 w-1/2 m-1">1</span>
                </div>
                <div class="flex">
                    <span class="border-2 border-black p-2 w-1/2 m-1">13 pts</span>
                    <span class="border-t-2 border-b-2 border-black p-2 w-1/2 m-1">1</span>
                </div>
                <div class="flex">
                    <span class="border-2 border-black p-2 w-1/2 m-1">12 pts</span>
                    <span class="border-t-2 border-b-2 border-black p-2 w-1/2 m-1">1</span>
                </div>
                <div class="flex">
                    <span class="border-2 border-black p-2 w-1/2 m-1">11 pts</span>
                    <span class="border-t-2 border-b-2 border-black p-2 w-1/2 m-1">1</span>
                </div>
            </div>
            <div class="flex-col w-1/2 p-2">
                <span class="flex border-2 m-1 border-black rounded-md p-2 justify-center">Não Premiado</span>
                <div class="flex">
                    <span class="border-2 border-black p-2 w-1/2 m-1">10 pts</span>
                    <span class="border-t-2 border-b-2 border-black p-2 w-1/2 m-1">1</span>
                </div>
                <div class="flex">
                    <span class="border-2 border-black p-2 w-1/2 m-1">9 pts</span>
                    <span class="border-t-2 border-b-2 border-black p-2 w-1/2 m-1">1</span>
                </div>
                <div class="flex">
                    <span class="border-2 border-black p-2 w-1/2 m-1">8 pts</span>
                    <span class="border-t-2 border-b-2 border-black p-2 w-1/2 m-1">1</span>
                </div>
                <div class="flex">
                    <span class="border-2 border-black p-2 w-1/2 m-1">7 pts</span>
                    <span class="border-t-2 border-b-2 border-black p-2 w-1/2 m-1">1</span>
                </div>
                <div class="flex">
                    <span class="border-2 border-black p-2 w-1/2 m-1">6 pts</span>
                    <span class="border-t-2 border-b-2 border-black p-2 w-1/2 m-1">1</span>
                </div>
                <div class="flex">
                    <span class="border-2 border-black p-2 w-1/2 m-1">5 pts</span>
                    <span class="border-t-2 border-b-2 border-black p-2 w-1/2 m-1">1</span>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app>
