<div>
    {{-- Filtros de Jogos --}}
    <form action="/loto" method="POST" class="container" style="width:90%">
        @csrf
        <div class="row mb-2">
            <div class="row">
                <div class="col-4 form-group">
                    <label for="concursos">Concurso:</label>
                    <input type="text" class="form-control" id="concursos" name="concursos"
                        placeholder="Ex.: 2204 ou 2204,2207,2306,n ou 2204-2209"
                        @if (!empty($filtros) && $filtros['concursos']) value="{{ $filtros['concursos'] }}"; @endif>
                </div>
                <div class="col-4 form-group">
                    <label for="sequencias">Sequência:</label>
                    <input type="text" class="form-control" id="sequencias" name="sequencias"
                        placeholder="Ex.: 33423 ou 33423,33324,33333,n"
                        @if (!empty($filtros) && $filtros['sequencias']) value="{{ $filtros['sequencias'] }}"; @endif>

                </div>
                <div class="col-2 form-group">
                    <label for="data_ini">Data de Início:</label>
                    <input type="date" class="form-control" id="data_ini" name="data_ini"
                        @if (!empty($filtros) && $filtros['data_ini']) value="{{ $filtros['data_ini'] }}"; @endif>
                </div>
                <div class="col-2 form-group">
                    <label for="data_fim">Data de Fim:</label>
                    <input type="date" class="form-control" id="data_fim" name="data_fim"
                        @if (!empty($filtros) && $filtros['data_fim']) value="{{ $filtros['data_fim'] }}"; @endif>

                </div>
            </div>
            <div class="text-center m-2">
                <button type="reset" class="btn btn-secondary btn-sm " style="width: 100px">Cancelar</button>
                <button type="submit" class="btn btn-primary btn-sm" style="width: 100px">Buscar</button>
            </div>
            <a href="{{ route('limparFiltros') }}" style="text-align: center">Limpar Filtros</a>

        </div>
    </form>

</div>
