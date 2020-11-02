@extends('layouts.app')
@section('options_btn')@endsection
@section('card_title', 'Nova Ordem de Serviço')
@section('content')
    
    <div class="col-12 border">
        <form method="post" action="{{ !isset($os) ? route('os.novo') : route('os.edit',[$os->id])}}">
            {{ csrf_field() }}
            @isset($os)
                @method("PUT")
            @endisset

            <div class="row justify-content-between p-2" id="div_cliente">
                
                <div class="col-md-2 col-sm-12">
                    <label for="data">Data Entrada:</label>
                    <input type="datetime" name="data" id="data_os" class="form-control" value="{{ date('d-m-Y H:i:s') }}"
                        readonly title="{{isset($os) ? $os->dt_abertura : date('d-m-Y H:i:s')}}">
                </div>

                <div class="{{isset($os) ? "col-md-3" : "col-md-2 "}}  col-sm-12">
                    <label for="numero">Numero OS:</label>
                    <input type="text" name="numero" id="numero_os" class="form-control text-center" readonly value="{{isset($os) ? $os->id : ''}}">
                </div>

                @if( !isset($os) )

                    <div class="col-md-3 col-sm-12">
                        <label for="cliente" class="pb-2">Cliente:</label>
                        <select name="cliente" id="cliente_os" class="form-control" required></select>
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="cliente">Nome Exibicao:</label>
                        <input type="text" name="nome_exibicao" id="nome_exibicao" class="form-control">
                    </div>

                    <div class="col-md-2 col-sm-12" style="display:flex; flex-direction: column">
                        <label for="novo_cliente">Novo Cliente:</label>
                        <a href="{{ route('cliente.novo') }}" target="_blank" class="btn btn-sm btn-primary">+</a>
                    </div>

                @else

                    <div class="col-md-3 col-sm-12">
                        <label for="cliente">Cliente:</label>
                        <input type="hidden" name="cliente" value="{{ $os->equipamento->cliente->id }}">
                        <input type="text" name="nome_cliente" id="nome_cliente" class="form-control text-center text-capitalize" readonly disabled value="{{$os->equipamento->cliente->nome}}">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="nome_exibicao">Nome Exibicao:</label>
                        @php
                            $exibir = isset($os->nome_exibicao) ? $os->nome_exibicao : $os->equipamento->cliente->nome;
                        @endphp
                        <input type="text" name="nome_cliente" id="nome_cliente" class="form-control text-center text-capitalize" readonly disabled value="{{$exibir}}">
                    </div>

                    <div class="row justify-content-center mt-2" id="div_status">
                        <div class="col-md-12 col-sm-12 text-center">
                            <div class="row justify-content-center">
                                <span>Status OS:</span>
                            </div>

                            <div class="row justify-content-around pt-1">

                                @foreach($status as $stat)
                                    @php
                                        $definido = $stat->id == $os->status_id;
                                    @endphp
                                    <button onclick="mudaStatus({{$os->id}}, {{$stat->id}})" 
                                        title="{{$definido ? "Status atual" : "Clique para alterar"}}" type="button" 
                                            class="text-capitalize btn btn-sm {{ $stat->returnFormatClass($definido) ." shadow rounded " }}">
                                        {{$stat->status}}
                                    </button>

                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif



            </div>
            <hr />

            <div class="row justify-content-around" id="div_equipamento">
                <div class="row pt-3 col-md-5 col-sm-12">

                    <div class="{{isset($os) ? "col-md-12" : " col-md-8" }} col-sm-12" style="display: flex; flex-direction:column">
                        <label for="equipamentos">Equipamento:</label>
                        <select name="equipamentos" id="equipamentos" class="form-control" required>
                            @isset($os)
                                <option value="{{$os->equip_id}}" selected>{{$os->equipamento->marca }} - {{$os->equipamento->num_serie}}</option>
                            @endisset
                        </select>
                    </div>

                    @if(!isset($os))
                    <div class="col-md-4 col-sm-12" style="display: flex; flex-direction:column">
                        <label for="novo_equip">Cadastrar:</label>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#equipamento"
                            disabled id="btn_cadequip">+</button>
                    </div>
                    @endisset
                </div>

                <div class="col-md-7 col-sm-12">
                    <div class="d-flex">
                        <label for="defeito" class="pt-4">Defeito Indicado:</label>
                        <textarea name="defeito" id="defeito" class="form-control" cols="30" rows="5" required>{{isset($os) ? $os->defeito : ""}}</textarea>
                    </div>
                </div>
            </div>
            <hr />

            @isset($os)
            <div class="row justify-content-around" id="div_solucao">

                    <div class="col-md-5 col-sm-12">
                        <label for="tipo_defeito">Tipo do defeito:</label>
                        <select name="tipo_defeito" id="tipo_defeito" class="form-control" required>
                            @foreach($tipos_defeito as $tipo)
                                <option value="{{$tipo->id}}" {{ !empty($os->tipo_defeito) && $os->tipo_defeito == $tipo->id ? "selected" : ""}}>{{$tipo->descricao}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-7 col-sm-12">
                        <div class="d-flex">
                            <label for="solucao" class="pt-4">Solução Indicada:</label>
                            <textarea name="solucao" id="solucao" class="form-control" cols="30" rows="5">{{ !empty($os->solucao) ? $os->solucao : ""}}</textarea>
                        </div>
                    </div>
                
            </div>
            <hr />

            @endisset

            <div class="row justify-content-around" id="div_btn">
                <div class="d-flex col-md-4 col-sm-12">
                    <button id="btn_salvar" class="btn {{isset($os) ? "btn-warning" : "btn-success"}} w-100">{{isset($os) ? "Atualizar" : "Gerar"}}</button>
                </div>
                
                @isset($os)
                    <div class="d-flex col-md-4 col-sm-12">
                        <button type="button" id="btn_encerrar" class="btn btn-primary w-100">Finalizar</button>
                    </div>
                @endisset

            </div>
            <hr />
        </form>

        @include("assistencia.include.modal_equipamento")
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
            $("#btn_cadequip").attr("disabled", false)
            let cliente_id = $(this).val();
            $("[name='cliente_equip']").val(cliente_id);


            $.getJSON("{{ route('equip.lista', []) }}", {
                    cliente_id
                }, function() {})
                .done(function(data) {
                    let equips = data;
                    let option = "";
                    let equipamentos = $("#equipamentos");
                    equipamentos.empty();

                    $(equips).each(function(i, e) {
                        option += `<option value='${e.id}'>${e.marca} - ${e.num_serie}</option>`;
                    })

                    equipamentos.html(option);

                })

                .fail(function() {
                    console.log("Erro")
                })

        });

        var _token = $('meta[name="_token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': _token
            }
        });

        $("#store_equip").on("submit", function(e) {
            e.preventDefault();
            var data = $(this).serialize();

            $.ajax({
                url: "{{ route('equip.store') }}",
                type: "POST",
                data: data,

                success: function(data) {
                    Swal.fire("Equipamento Cadastrado", "Equipamento Cadastrado com sucesso",
                    "success");
                    let equip = data;
                    $("#equipamentos").append(
                        `<option value='${equip.id}'>${equip.marca} - ${equip.num_serie}</option>`);
                },

                error: function(data, xhr, textStatus, error) {
                    let erro = data.responseJSON;
                    Swal.fire("Atenção", erro.erro, "error")
                    return false;
                }
            })
        });

        @isset($os)
        function mudaStatus(os, status){

            Swal.fire(
                {
                    title: 'Tem certeza?',
                    text: `Deseja alterar o status da Ordem de Serviço ${os} ?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, alterar!',
                    cancelButtonText: 'Cancelar!'
                })
                .then( (result) => {
                    if (result.value) {
                        let url = `{{ route("ajax.os.status",["",""]) }}/${os}/${status}`;
                            
                        $.ajax({
                            url: url,
                            type: "GET",
                            dataType: "json",
                            
                                success: function(data){
                                    Swal.fire("Operação realizada","Status alterado. Aguarde um momento!", "success")
                                    setTimeout(function(){
                                        let challenge_return = `{{route('os.edit',[$os->id])}}`;
                                        window.location = challenge_return
                                    }, 2000)
                                },
                                error: function(data){
                                    console.log(url)
                                    console.log("erro ", data.responseText)
                                }
                        })
                    }
                });
        }
        @endisset

    </script>

@endsection
