@php
    $contx = 1;
@endphp

<div class="flex flex-wrap items-center justify-center border-2 border-roxo-claro rounded-lg">
    @foreach ($sequencias as $sq)
        {{-- Elemento Geral --}}
        <div class="flex items-center text-xs justify-center flex-wrap">
            {{-- Contador --}}
            <div class="flex p-1">
                <div class="left-0 p-1 w-8 flex align-middle text-center border border-gray-500 rounded-l-lg">
                    {{ $contx++ }}º
                </div>
                {{-- Sequencia  --}}
                <div class="flex border border-gray-500 p-1 w-20">

                    @foreach (explode(',', $sq['sequencia']) as $ns)
                        {{-- Digito --}}
                        <div class=" flex m-1 font-semibold">

                            {{ $ns }}
                        </div>
                    @endforeach
                </div>
                {{-- Quantidade --}}
                <div class="text-center  writing-mode-vertical-right border border-gray-500 rounded-r-lg">
                    {{ $sq['qtd'] }}
                </div>
            </div>
        </div>
    @endforeach
</div>

