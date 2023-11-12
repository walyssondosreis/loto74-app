    <div class="w-64 bg-roxo-escuro border-2 border-roxo-light rounded-md shadow p-3 text-center">
        <div class="bg-black border-2 border-roxo-light rounded-lg text-white p-2">
            @isset($data)
                <div>{{ \Carbon\Carbon::parse($data)->format('d/m/Y') }}</div>
            @endisset

            @if (isset($nome))
                <h2 class="font-bold pb-2 text-xl">{{ $nome }}</h2>
            @elseif (isset($concurso))
                <h2 class="font-bold pb-2 text-xl">{{ 'Concurso ' . $concurso }}</h2>
            @endif

            @foreach (explode(',', $sequencia) as $sqp)
                <span class="p-1 border-2 border-roxo-light rounded"><?= $sqp ?></span>
            @endforeach

        </div>
        @php
            $numTotal = 0;
        @endphp
        @for ($i = 0; $i < 5; $i++)
            <div class="flex justify-between p-1.5">
                @for ($j = 0; $j < 5; $j++)
                    @php
                        $numTotal += 1;
                        $number = 'bg-gray-300 border-2 border-gray-400 text-gray-400 select-none';
                        $number_check = 'bg-gradient-to-b from-roxo-light via-roxo-claro to-roxo-escuro border-2 border-roxo-light text-white';
                    @endphp
                    <div class="w-10 h-10 leading-10 text-xl rounded-full {{ in_array($numTotal, explode(',', $numeros)) ? $number_check : $number }}">
                        {{ $numTotal }}
                    </div>
                @endfor
            </div>
        @endfor
    </div>
