<div>
    {{-- Filtros de Jogos --}}
    <form action="{{ route('loto') }}" method="POST" class="">
        @csrf
        <div class="m-2 text-center justify-center p-4 border-2 border-gray-300 rounded-lg">
            <div class="flex justify-between mb-3">
                <div class="w-full m-2">
                    <label class="text-sm text-gray-700 mb-1 justify-left flex" for="concursos">Concurso:</label>
                    <input type="text" class="w-full border rounded pl-3 py-2 shadow focus:outline-none hover:border-roxo-claro hover:ring-1 hover:ring-roxo-escuro focus:border-roxo-escuro focus:ring-1 focus:ring-roxo-escuro duration-200" id="concursos" name="concursos"
                        placeholder="Ex.: 2204 ou 2204,2207,2306,n ou 2204-2209"
                        @if (!empty($filtros) && $filtros['concursos']) value="{{ $filtros['concursos'] }}"; @endif>
                </div>
                <div class="w-full m-2">
                    <label class="text-sm text-gray-700 mb-1 justify-left flex" for="sequencias">Sequência:</label>
                    <input type="text" class="w-full border rounded pl-3 py-2 shadow focus:outline-none hover:border-roxo-claro hover:ring-1 hover:ring-roxo-escuro focus:border-roxo-escuro focus:ring-1 focus:ring-roxo-escuro duration-200" id="sequencias" name="sequencias"
                        placeholder="Ex.: 33423 ou 33423,33324,33333,n"
                        @if (!empty($filtros) && $filtros['sequencias']) value="{{ $filtros['sequencias'] }}"; @endif>

                </div>
                <div class="w-1/5 m-2">
                    <label class="text-sm text-gray-700 mb-1 justify-left flex" for="data_ini">Data de Início:</label>
                    <input type="date" class="w-full border rounded pl-3 py-2 shadow focus:outline-none hover:border-roxo-claro hover:ring-1 hover:ring-roxo-escuro focus:border-roxo-escuro focus:ring-1 focus:ring-roxo-escuro duration-200" id="data_ini" name="data_ini"
                        @if (!empty($filtros) && $filtros['data_ini']) value="{{ $filtros['data_ini'] }}"; @endif>
                </div>
                <div class="w-1/5 m-2">
                    <label class="text-sm text-gray-700 mb-1 justify-left flex" for="data_fim">Data de Fim:</label>
                    <input type="date" class="w-full border rounded pl-3 py-2 shadow focus:outline-none hover:border-roxo-claro hover:ring-1 hover:ring-roxo-escuro focus:border-roxo-escuro focus:ring-1 focus:ring-roxo-escuro duration-200" id="data_fim" name="data_fim"
                        @if (!empty($filtros) && $filtros['data_fim']) value="{{ $filtros['data_fim'] }}"; @endif>

                </div>
            </div>
            <div class="flex justify-center text-sm font-bold">
                <button type="reset" class="w-1/12 m-1 bg-roxo-claro text-white py-2 rounded-lg shadow-2xl hover:bg-roxo-light duration-150">Cancelar</button>
                <button type="submit" class="w-1/12 m-1 bg-roxo-claro text-white py-2 rounded-lg shadow-2xl hover:bg-roxo-light duration-150">Buscar</button>
            </div>
            <div class="flex justify-center p-2">

                <a class="p-1 rounded-md text-sm  hover:text-roxo-claro" href="{{ route('limparFiltros') }}">Limpar Filtros</a>
            </div>

        </div>
    </form>

</div>
