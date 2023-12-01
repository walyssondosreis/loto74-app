@php
    // var_dump($card);
@endphp
<div class="flex text-center border-2 border-black rounded-lg p-4 mb-4 flex-wrap lg:flex-nowrap justify-center">
    <div class="flex-col">
        <div class="p-4">
            @foreach (explode(',', $card['seq']) as $sqp)
                <span class="p-1 border-2 font-bold border-black rounded"><?= $sqp ?></span>
            @endforeach
        </div>

        <div class="">
            @component('components.loto.analisador')
                @slot('numeros',$analisador)
                @slot('numDestaque',$card['nums'])
            @endcomponent
        </div>
    </div>
    <div class="flex-col w-full p-4">
        <div class="p-4 border-2 border-black">{{ $nome }}</div>
        <div
         class="flex flex-wrap">
            <div class="flex-col lg:w-1/2 p-2 w-full">
                <div class="flex m-1">
                    <span
                        class="flex border-2 border-black rounded-r-none rounded-md p-2 justify-center w-full">Premiado</span>
                    <span
                        class="flex w-10 border-2 p-3 border-black rounded-r-md justify-center border-l-0 text-xs">{{ $premiado }}%
                    </span>
                </div>
                {{-- Exibe pontons fixos --}}
                @foreach (array_reverse($card['stats'], true) as $idx => $cs)
                    @if ($idx > 10)
                        <div class="flex">
                            <span class="border-2 border-black p-2 w-1/2 m-1">{{ $idx }} pts</span>
                            <span class="border-t-2 border-b-2 border-black p-2 w-1/2 m-1">{{ $cs }}</span>
                        </div>
                    @endif
                @endforeach

            </div>
            <div class="flex-col lg:w-1/2 p-2 w-full">
             {{-- Botão Não Premiado --}}
                <div class="flex m-1">
                    <span class="flex border-2 border-black rounded-r-none rounded-md p-2 justify-center w-full">Não
                        Premiado</span>
                    <span
                        class="flex w-10 border-2 p-3 border-black rounded-r-md justify-center border-l-0 text-xs">{{ $npremiado }}%
                    </span>
                </div>
                {{-- Exibe quantidade de pontos feitos --}}
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
