@extends('layouts.app')
@section('options_btn')@endsection
@section('card_title', 'Novo Cliente')
@section('content')
    {{-- <div class="row"> --}}

        <form action="{{ route('cliente.novo') }}" method="post">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-2 col-sm-12">
                    <label for="tipo_cliente">Tipo Cliente</label>
                    <select name="tipo_cliente" id="tipo_cliente" class="form-control text-center" required>
                        <option value="-1" disabled selected>Selecione</option>
                        @foreach ($tipo_cliente as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                        @endforeach
                    </select>
                    <small id="helpTipoCliente" class="form-text text-muted">Selecione o tipo de cliente</small>
                </div>
            </div>

            <div class="row" id="row_cliente" style="display: none">

                <div class="col-md-4 col-sm-12">
                    <label for="nome" id="label_nome"></label>
                    <input type="text" class="form-control" name="nome" id="nome" aria-describedby="helpId"
                        placeholder="Primeiro Nome Cliente" required>
                    <small id="h_nome" class="form-text text-muted">Insira o primeiro nome do cliente</small>
                </div>

                <div class="col-md-4 col-sm-12" id="col_sobrenome">
                    <label for="sobrenome" id="label_sobrenome"></label>
                    <input type="text" class="form-control" name="sobrenome" id="sobrenome" aria-describedby="helpId"
                        placeholder="Sobrenome do cliente" required>
                    <small id="h_sobrenome" class="form-text text-muted">Insira o sobrenome do cliente</small>
                </div>

                <div class="col-md-4 col-sm-12" style="display: none" id="razao">
                    <label for="razao_social" id="label_razao">Razão Social</label>
                    <input type="text" class="form-control" name="razao_social" id="razao_social" aria-describedby="helpId"
                        placeholder="Razão social" required disabled>

                    <small id="h_razao" class="form-text text-muted">Insira a razão social</small>
                </div>
            </div>

            <div class="row" style="display: none" id="documentos">
                <div class="col-md-4 col-sm-12">
                    <label for="tipo_documento" id="label_doc"></label>
                    <input type="text" class="form-control" name="cpf" id="cpf" aria-describedby="helpId" placeholder="">
                    <small id="h_cpf" class="form-text text-muted">Documento Identificação</small>
                </div>

                <div class="col-md-4 col-sm-12 pb-2">
                    <label for="rg" id="label_rg"></label>
                    <input type="text" class="form-control" name="rg" id="rg" aria-describedby="helpId" placeholder="">
                    <small id="h_rg" class="form-text text-muted">Documento Identificação</small>
                </div>
            </div>

            <div class="row pt-2 pb-2 ml-1" >

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
                </div>

                <div class="row pt-2" id="endereco" style="display:none">

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
                </div>


            </div>

            <div class="row pt-2 ml-2 mr-2" id="div-telefone">
                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <label for="tipo_telefone">Tipo Telefone</label>
                        <select name="tipo_telefone" id="tipo_telefone" class="form-control text-center" required>
                            <option value="-1" disabled selected>Selecione</option>
                            @foreach ($tipos_telefone as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                            @endforeach
                        </select>
                        <small id="helpTipoTelefone" class="form-text text-muted">Selecione o tipo de telefone para
                            adicionar</small>
                    </div>

                    <div class="col-md-2 col-sm-12">
                        <label for="">Clique para adicionar</label>
                        <button class="btn btn-outline-info" id="btn-telefone" type="button">+</button>
                    </div>
                </div>
                <div class="row" id="dados_telefone" style="display:none">

                </div>

            </div>


            <button type="submit" name="" id="" class="btn btn-primary btn-lg btn-block">Enviar</button>
        </form>

    @endsection

    @section('scripts')
        <script src="{{ asset('js/cliente_view.js') }}">
        </script>
    @endsection
