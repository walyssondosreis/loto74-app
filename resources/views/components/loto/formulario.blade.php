
    {{-- class="fixed top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2" --}}

    <div class="p-4">
    {{-- Filtros de Jogos --}}
    <form action="{{ route($submit) }}" method="POST">
        @csrf
        <div class="flex-col justify-center p-4 border border-black rounded-md">
            {{-- Campos do formulario --}}
            <div class="flex justify-center w-full gap-2 flex-wrap lg:flex-nowrap">
                @if (in_array('jogos',$campos))
                <div class="flex-col w-full">
                    <label class="flex form-label " for="jogos">Numeros | Jogos:</label>
                    <input type="text" class="flex form-input border-black" id="jogos" name="jogos"
                        placeholder='Ex.: "1,2,3,4,5,6,7,8,9,10,11,12,13,14,15" ou 245'
                        @if (!empty($filtros) && $filtros['jogos']) value="{{ $filtros['jogos'] }}"; @endif>
                </div>
                @endif
                @if (in_array('concursos',$campos))
                <div class="flex-col w-full">
                    <label class="flex form-label " for="concursos">Concurso:</label>
                    <input type="text" class="flex form-input border-black" id="concursos" name="concursos"
                        placeholder="Ex.: 2204 ou 2204,2207,2306,n ou 2204-2209"
                        @if (!empty($filtros) && $filtros['concursos']) value="{{ $filtros['concursos'] }}"; @endif>
                </div>
                @endif

                @if (in_array('sequencias',$campos))
                <div class="flex-col w-full">
                    <label class="flex form-label" for="sequencias">Sequência:</label>
                    <input type="text" class="flex form-input border-black" id="sequencias" name="sequencias"
                        placeholder="Ex.: 33423 ou 33423,33324,33333,n"
                        @if (!empty($filtros) && $filtros['sequencias']) value="{{ $filtros['sequencias'] }}"; @endif>

                </div>
                @endif
                @if (in_array('datas',$campos))
                <div class="flex-col">
                    <label class="flex form-label" for="data_ini">Data de Início:</label>
                    <input type="date" class="flex form-input border-black" id="data_ini" name="data_ini"
                        @if (!empty($filtros) && $filtros['data_ini']) value="{{ $filtros['data_ini'] }}"; @endif>
                </div>
                <div class="flex-col">
                    <label class="flex form-label" for="data_fim">Data de Fim:</label>
                    <input type="date" class="flex form-input border-black" id="data_fim" name="data_fim"
                        @if (!empty($filtros) && $filtros['data_fim']) value="{{ $filtros['data_fim'] }}"; @endif>
                </div>
                @endif
            </div>
            {{-- Botões --}}
            <div class="flex justify-center text-sm font-bold p-2 gap-2">
                <button type="reset"
                    class="flex px-6 py-1 border border-black rounded-md">Cancelar</button>
                <button type="submit"
                    class="flex px-6 py-1 border border-black rounded-md">Buscar</button>
            </div>
            {{-- Em baixo botões --}}
            <div class="flex justify-center">

                <a class="flex text-xs" href="{{ route('limparFiltros',['redirect'=>$submit, 'nomeFiltro'=>$nomeFiltro ]) }}">Limpar
                    Filtros</a>
            </div>

        </div>
    </form>

</div>
