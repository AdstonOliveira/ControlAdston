<div class="row">
    <div class="col-md-3 col-sm-12">
        <label for="tipo_endereco">Tipo de endereço</label>
        <select name="tipo_endereco" id="tipo_endereco" class="form-control">
            <option value="-1" disabled selected>Tipo Endereço</option>
            @foreach ($tipos_endereco as $tipo)
                <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
            @endforeach
        </select>
        <small id="h_endereco" class="form-text text-muted">Tipo endereço</small>
    </div>


    <div class="col-md-2 col-sm-12">
        <label for="cep">CEP</label>
        <div class="input-group mb-3">

            <input name="cep" id="cep" type="text" class="form-control" placeholder="CEP" aria-label="cep"
                aria-describedby="btn-cep" disabled>

            <div class="input-group-append">
                <button type="button" class="input-group-text" id="btn-cep">
                    <i class="fa fa-search" aria-hidden="true"
                        title="Clique aqui para realizar a busca no site do correios"></i>
                </button>
            </div>
        </div>

    </div>
    <div class="col-md-2 col-sm-12">
        <label for="estado">Estado</label>
        <select name="estado" id="estado" class="form-control">
            <option value="-1">Estado</option>

            @foreach ($estados as $estado)
                <option value="{{ $estado->id }}" {{ $estado->id == 25 ? ' selected' : '' }}>
                    {{ $estado->abbreviation }}
                </option>
            @endforeach

        </select>
        <small id="h_estado" class="form-text text-muted">Selecione o estado</small>
    </div>

    <div class="col-md-2 col-sm-12">
        <label for="cidade">Cidade</label>
        <select name="cidade" id="cidade" class="form-control">

            @foreach ($cidade_default as $cidade)
                <option value="{{ $cidade->id }}">{{ $cidade->name }}</option>
            @endforeach

        </select>
        <small id="h_cidade" class="form-text text-muted">Selecione a cidade</small>
    </div>
</div>

<div class="row pt-2 mr-2" id="endereco" style="display:none">

    <div class="col-md-4 col-sm-12">
        <label for="rua">Logradouro</label>
        <input type="text" name="rua" id="rua" class="form-control">

        <small id="h_rua" class="form-text text-muted">Endereço. Ex:Rua, Av. ...</small>
    </div>

    <div class="col-md-2 col-sm-12">
        <label for="num">Num</label>
        <input type="text" name="num" id="num" class="form-control">

        <small id="h_num" class="form-text text-muted">Numero</small>
    </div>

    <div class="col-md-3 col-sm-12">
        <label for="bairro">Bairro</label>
        <input type="text" name="bairro" id="bairro" class="form-control">

        <small id="h_bairro" class="form-text text-muted">Bairro</small>
    </div>

    <div class="col-md-2 col-sm-12">
        <label for="complemento">Complemento</label>
        <input type="text" name="complemento" id="complemento" class="form-control">

        <small id="h_num" class="form-text text-muted">Complemento</small>
    </div>

    {{-- <div class="ml-auto col-md-2 col-sm-12" style="display:flex; flex-direction: column">
        <label for="">Outro endereco</label>
        <button class="btn btn-outline-info" id="btn-endereco" type="button">+</button>
    </div> --}}

</div>
