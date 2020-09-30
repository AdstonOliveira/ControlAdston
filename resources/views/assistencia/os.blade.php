@extends('layouts.app')
@section('options_btn')@endsection
@section('card_title', 'Nova Ordem de Serviço')
@section('content')

    <div class="col-12 border">
        <form method="post" action="{{ route('os.novo') }}">
            {{ csrf_field() }}
            <div class="row justify-content-between p-2" id="div_cliente">
                <div class="col-md-3 col-sm-12">
                    <label for="data">Data Entrada</label>
                    <input type="datetime" name="data" id="data_os" class="form-control" value="{{ date('d-m-Y H:i:s') }}"
                        readonly>
                </div>

                <div class="col-md-2 col-sm-12">
                    <label for="numero">Numero OS</label>
                    <input type="text" name="numero" id="numero_os" class="form-control" readonly>
                </div>

                <div class="col-md-3 col-sm-12">
                    <label for="cliente">Cliente:</label>
                    <select name="cliente" id="cliente_os" class="form-control" required></select>
                </div>

                <div class="col-md-3 col-sm-12" style="display:flex; flex-direction: column">
                    <label for="novo_cliente">Novo Cliente</label>
                    <a href="{{ route('cliente.novo') }}" target="_blank" class="btn btn-sm btn-primary">+</a>
                </div>
                
            </div>
            <hr />

            <div class="row p-2" id="div_equipamento">

                <div class="row col-md-5 col-sm-12">

                    <div class="col-md-8 col-sm-12" style="display: flex; flex-direction:column">
                        <label for="equipamentos">Equipamento</label>
                        <select name="equipamentos" id="equipamentos" class="form-control"></select>
                    </div>
                    <div class="col-md-4 col-sm-12" style="display: flex; flex-direction:column">
                        <label for="novo_equip">Cadastrar</label>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#equipamento">+</button>
                    </div>

                </div>


            </div>
            
            @include("assistencia.include.modal_equipamento")

            <button type="submit" id="oculto" style="display: none">Teste</button>




        </form>
    </div>



@endsection
@section('scripts')

    <script>
        
        $(document).ready(function() {
            var preenchido = [];

            $("#cliente_os").select2({
                minimumInputLength: 3,

                ajax: {
                    url: function(params) {
                        return "{{ route('option_cliente', ['']) }}/" + params.term
                    },
                    dataType: "json",
                    processResults: function(data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        console.log(data)
                        return {
                            results: data.data,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                placeholder: 'Insira o nome',
                minimumInputLength: 3,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection
            });

            function formatRepo(data) {
                if (data.loading) {
                    return data.id;
                }

                var $container = $(
                    "<div class='select2-result-repository clearfix'>" +
                    "<div class='select2-result-repository__meta'>" +
                    "<div class='select2-result-repository__title'></div>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
                );

                $container.find(".select2-result-repository__title").text("CPF: " + data.identificacao + " Nome: " +
                    data.nome);

                return $container;
            }

            function formatRepoSelection(data) {

                return data.nome;
            }

        });

        $("#cliente_os").on("select2:select", function() {
            
        });

    </script>

@endsection
