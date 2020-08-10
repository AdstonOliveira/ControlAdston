@extends('layouts.app')
@section('options_btn')@endsection
@section('card_title', 'Novo Cliente')
@section('content')
    {{-- <div class="row"> --}}

        <form action="">

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

                <div class="row col-md-8 col-sm-12">
                    <div class="col-md-6 col-sm-12">
                        <label for="nome" id="label_nome"></label>
                        <input type="text" class="form-control" name="nome" id="nome" aria-describedby="helpId"
                            placeholder="Primeiro Nome Cliente" required>
                        <small id="helpId" class="form-text text-muted">Insira o primeiro nome do cliente</small>
                    </div>

                    <div class="col-md-6 col-sm-12" id="col_sobrenome">
                        <label for="sobrenome" id="label_sobrenome"></label>
                        <input type="text" class="form-control" name="sobrenome" id="sobrenome" aria-describedby="helpId"
                            placeholder="Sobrenome do cliente" required>
                        <small id="helpSobrenome" class="form-text text-muted">Insira o sobrenome do cliente</small>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12" style="display: none" id="razao">
                    <label for="razao_social" id="label_razao">Razão Social</label>
                    <input type="text" class="form-control" name="razao_social" id="razao_social" aria-describedby="helpId"
                        placeholder="Razão social" required>
                    <small id="helpSobrenome" class="form-text text-muted">Insira a razão social</small>
                </div>

            </div>


            <div class="row" style="display: none" id="documentos">
                <div class="col-md-4 col-sm-12">
                    <label for="tipo_documento" id="label_doc"></label>
                    <input type="text" class="form-control" name="tipo_documento" id="tipo_documento"
                        aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Documento Identificação</small>
                </div>

                <div class="col-md-4 col-sm-12">
                    <label for="rg" id="label_rg"></label>
                    <input type="text" class="form-control" name="rg" id="rg" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Documento Identificação</small>
                </div>
            </div>

        </form>

    @endsection
    @section('scripts')

        <script>
            $(document).ready(function() {
                $("#tipo_cliente ").change(function() {
                    let selecionado = $("#tipo_cliente option:selected").val();

                    if( $("#razao").is(':visible')){
                        $("#razao").fadeOut("fast");
                    }

                    if (selecionado == 1) {
                        $("#label_nome").empty();
                        $("#label_nome").append("Nome");

                        $("#label_sobrenome").empty();
                        $("#label_sobrenome").append("Sobrenome");

                        $("#label_doc").empty();
                        $("#label_doc").append("CPF")
                        $("#tipo_documento").mask('000.000.000-00', {
                            reverse: true
                        })

                        $("#label_rg").empty();
                        $("#label_rg").append("RG")
                    } else if (selecionado == 2 || selecionado == 3) {
                        $("#label_nome").empty();
                        $("#label_nome").append("Nome fantasia");

                        $("#label_sobrenome").empty();
                        $("#label_sobrenome").append("Sobrenome");

                        if($("#col_sobrenome").is(":visible")){
                            $("#col_sobrenome").hide()
                        }

                        $("#label_doc").empty();
                        $("#label_doc").append("CNPJ")
                        $("#tipo_documento").mask('00.000.000/0000-00', {
                            reverse: true
                        })

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

        </script>
    @endsection
