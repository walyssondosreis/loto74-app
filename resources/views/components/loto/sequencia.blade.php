@php
    $contx = 1;
@endphp

<div class="">
@foreach ($sequencias as $sq)
    {{-- Elemento Geral --}}
    <div class="inline-flex items-center text-xs">
        {{-- Contador --}}
        <div class="bg-yellow-300 p-1">
            {{ $contx++ }}
        </div>
        {{-- Sequencia  --}}
        <div class="bg-orange-400 flex border border-black p-1">
            @foreach (explode(',', $sq['sequencia']) as $ns)
                {{-- Digito --}}
                <div class=" flex m-1 font-semibold">

                    {{ $ns }}
                </div>
            @endforeach
        </div>
        {{-- Quantidade --}}
        <div class="bg-blue-400 p-1">
            {{ $sq['qtd'] }}
        </div>
    </div>
@endforeach
</div>
