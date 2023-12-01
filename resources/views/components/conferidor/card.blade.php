@php
    // var_dump($nome);
@endphp
<div class="flex text-center border-2 border-black rounded-lg p-4 mb-4">
    <div class="flex-col">
        <div class="p-4">
            @foreach (explode(',', $sequencia) as $sqp)
                <span class="p-1 border-2 border-roxo-light rounded"><?= $sqp ?></span>
            @endforeach
        </div>

        <div class="">
            @component('components.loto.analisador')
                @slot('numeros',$analisador)
                @slot('numDestaque','1,2,3,5,7,10,11,13,14,17,18,20,22,23,24')
            @endcomponent
        </div>
    </div>
    <div class="flex-col w-full p-4">
        <div class="p-4 border-2 border-black">{{ $nome }}</div>
        <div class="flex">
            <div class="flex-col w-1/2 p-2">
                <div class="flex m-1">
                    <span
                        class="flex border-2 border-black rounded-r-none rounded-md p-2 justify-center w-full">Premiado</span>
                    <span
                        class="flex w-10 border-2 p-3 border-black rounded-r-md justify-center border-l-0 text-xs">{{ $premiado }}%
                    </span>
                </div>
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
                <div class="flex m-1">
                    <span class="flex border-2 border-black rounded-r-none rounded-md p-2 justify-center w-full">Não
                        Premiado</span>
                    <span
                        class="flex w-10 border-2 p-3 border-black rounded-r-md justify-center border-l-0 text-xs">{{ $npremiado }}%
                    </span>
                </div>
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
