<div>
    {{-- Filtros de Jogos --}}
    <form action="{{ route('loto') }}" method="POST" class="">
        @csrf
        <div class="m-2 text-center justify-center p-4 border-2 border-gray-300 rounded-lg">
            <div class="justify-center mb-3 flex flex-wrap">
                <div class="w-full m-2">
                    <label class="form-label" for="concursos">Concurso:</label>
                    <input type="text" class="form-input" id="concursos" name="concursos"
                        placeholder="Ex.: 2204 ou 2204,2207,2306,n ou 2204-2209"
                        @if (!empty($filtros) && $filtros['concursos']) value="{{ $filtros['concursos'] }}"; @endif>
                </div>
                <div class="w-full m-2">
                    <label class="form-label" for="sequencias">Sequência:</label>
                    <input type="text" class="form-input" id="sequencias" name="sequencias"
                        placeholder="Ex.: 33423 ou 33423,33324,33333,n"
                        @if (!empty($filtros) && $filtros['sequencias']) value="{{ $filtros['sequencias'] }}"; @endif>

                </div>
                <div class="lg:w-1/5 m-1">
                    <label class="form-label" for="data_ini">Data de Início:</label>
                    <input type="date" class="form-input" id="data_ini" name="data_ini"
                        @if (!empty($filtros) && $filtros['data_ini']) value="{{ $filtros['data_ini'] }}"; @endif>
                </div>
                <div class="lg:w-1/5 m-1">
                    <label class="form-label" for="data_fim">Data de Fim:</label>
                    <input type="date" class="form-input" id="data_fim" name="data_fim"
                        @if (!empty($filtros) && $filtros['data_fim']) value="{{ $filtros['data_fim'] }}"; @endif>

                </div>
            </div>
            <div class="flex justify-center text-sm font-bold ">
                <button type="reset"
                    class="p-6 m-1 bg-roxo-claro text-white py-2 rounded-lg shadow-2xl hover:bg-roxo-light duration-150">Cancelar</button>
                <button type="submit"
                    class="p-6 m-1 bg-roxo-claro text-white py-2 rounded-lg shadow-2xl hover:bg-roxo-light duration-150">Buscar</button>
            </div>
            <div class="flex justify-center p-2">

                <a class="p-1 rounded-md text-sm  hover:text-roxo-claro" href="{{ route('limparFiltros') }}">Limpar
                    Filtros</a>
            </div>

        </div>
    </form>

</div>
