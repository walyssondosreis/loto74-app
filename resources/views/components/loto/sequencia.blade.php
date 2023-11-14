@php
    $contx = 1;
@endphp

<div class="flex flex-wrap items-center w-full bg-blue-600">
@foreach ($sequencias as $sq)
    {{-- Elemento Geral --}}
    <div class="flex items-center text-xs justify-center bg-red-500 flex-wrap">
        {{-- Contador --}}
        <div class="flex">
        <div class="bg-yellow-300 p-1 w-6">
            {{ $contx++ }}
        </div>
        {{-- Sequencia  --}}
        <div class="bg-orange-400 flex border border-black p-1 w-20">
            @foreach (explode(',', $sq['sequencia']) as $ns)
                {{-- Digito --}}
                <div class=" flex m-1 font-semibold">

                    {{ $ns }}
                </div>
            @endforeach
        </div>
        {{-- Quantidade --}}
        <div class="bg-blue-400 p-1 w-6">
            {{ $sq['qtd'] }}
        </div>
    </div>
    </div>
@endforeach
</div>
