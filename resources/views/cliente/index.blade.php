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

            <div class="row pt-2 pb-2" id="endereco">
                <div class="col-md-2 col-sm-12">
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
                            aria-describedby="btn-cep">

                        <div class="input-group-append">
                            <button type="button" class="input-group-text" id="btn-cep">
                                <i class="fa fa-search" aria-hidden="true" title="Clique aqui para realizar a busca no site do correios"></i>
                            </button>
                        </div>
                    </div>

                </div>

                <div class="col-md-2 col-sm-12">

                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control">
                        <option value="-1">Estado</option>

                        @foreach ($estados as $estado)
                            <option value="{{ $estado->id }}" {{ $estado->id == 25 ? ' selected' : '' }}>{{ $estado->name }}
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

                <div class="col-md-3 col-sm-12">
                    <label for="rua">Logradouro</label>
                    <input type="text" name="rua" id="rua" class="form-control" readonly>

                    <small id="h_estado" class="form-text text-muted">Endereço. Ex:Rua, Av. ...</small>
                </div>



            </div>


            <button type="submit" name="" id="" class="btn btn-primary btn-lg btn-block">Enviar</button>
        </form>

    @endsection
    @section('scripts')

        <script>
            $(document).ready(function() {

                $("#cep").mask('99.999-999', {
                    reverse: true
                })


                $("#tipo_cliente ").change(function() {

                    let selecionado = $("#tipo_cliente option:selected").val();

                    if ($("#razao").is(':visible')) {
                        $("#razao").hide();
                    }

                    if (selecionado == 1) {
                        $("#label_nome").empty();
                        $("#label_nome").append("Nome");
                        $("#nome").attr("placeholder", "Nome do cliente");
                        $("#h_nome").empty();
                        $("#h_nome").append("Insira o nome do cliente");

                        $("#label_sobrenome").empty();
                        $("#label_sobrenome").append("Sobrenome");

                        if (!$("#col_sobrenome").is(":visible")) {
                            $("#sobrenome").prop('disabled', false)
                            $("#col_sobrenome").fadeIn()
                        }

                        $("#label_doc").empty();
                        $("#label_doc").append("CPF")
                        $("#cpf").mask('000.000.000-00', {
                            reverse: true
                        })

                        $("#label_rg").empty();
                        $("#label_rg").append("RG")
                    } else if (selecionado == 2 || selecionado == 3) {

                        $("#label_nome").empty();
                        $("#label_nome").append("Nome fantasia");
                        $("#nome").attr("placeholder", "Nome fantasia");
                        $("#h_nome").empty();
                        $("#h_nome").append("Insira o nome fantasia da empresa");

                        $("#sobrenome").attr('disabled', 'disabled')
                        $("#col_sobrenome").hide()

                        $("#label_doc").empty();
                        $("#label_doc").append("CNPJ")

                        $("#cpf").mask('00.000.000/0000-00', {
                            reverse: true
                        })

                        $("#razao_social").prop('disabled', false);
                        $("#razao").fadeIn("fast");

                        $("#label_rg").empty();
                        $("#label_rg").append("IE")
                    }

                    if (selecionado != -1) {
                        $("#row_cliente").fadeIn("slow")
                        $("#documentos").fadeIn("slow")
                    }

                })
            })

            $("#estado").change(function() {
                let id = $("#estado option:selected").val()
                let route = "{{ url('cidades') }}"
                route += "/" + id

                $.get(route, {})

                    .done(function(data) {
                        $("#cidade").empty();
                        $("#cidade").append(data)
                    })
            })

            $("#btn-cep").click(function() {
                let cep = $("#cep").val().replace(/[^0-9]/, '');
                console.log(cep)
                $.ajax({
                    url: 'https://viacep.com.br/ws/' + cep+"/json",
                    dataType: 'jsonp',
                    crossDomain: true,
                    contentType: "application/json",
                    statusCode: {
                        200: function(data) {
                                $("#rua").val(data.logradouro)
                            } // Ok
                            ,
                        400: function(msg) {
                                console.log(msg);
                            } // Bad Request
                            ,
                        404: function(msg) {
                            console.log("CEP não encontrado!!");
                        } // Not Found
                    }
                });
            })

        </script>
    @endsection
