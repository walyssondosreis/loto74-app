@php
    // var_dump($nome);
@endphp
<div class="flex text-center border-2 border-black rounded-lg p-4 mb-4">
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
    <div class="flex-col w-full p-4">
    <div class="p-4 border-2 border-black">{{ $nome }}</div>
        <div class="flex">
            <div class="flex-col w-1/2 p-2">
                <span class="flex border-2 m-1 border-black rounded-md p-2 justify-center">Premiado</span>
                @foreach (array_reverse($card['stats'], true) as $idx => $cs)
                    @if ($idx > 10)
                        <div class="flex">
                            <span class="border-2 border-black p-2 w-1/2 m-1">{{ $idx }} pts</span>
                            <span class="border-t-2 border-b-2 border-black p-2 w-1/2 m-1">{{ $cs }}</span>
                        </div>
                    @endif
                @endforeach

            </div>
            <div class="flex-col w-1/2 p-2">
                <span class="flex border-2 m-1 border-black rounded-md p-2 justify-center">Não Premiado</span>
                @foreach (array_reverse($card['stats'], true) as $idx => $cs)
                    @if ($idx < 11)
                        <div class="flex">
                            <span class="border-2 border-black p-2 w-1/2 m-1">{{ $idx }} pts</span>
                            <span class="border-t-2 border-b-2 border-black p-2 w-1/2 m-1">{{ $cs }}</span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
