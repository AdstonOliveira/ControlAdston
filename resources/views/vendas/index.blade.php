@extends('layouts.app')
@section('options_btn')@endsection
@section('card_title', "Orçamento")
@section('content')

    <div class="col-12">
        <form action="#" method="POST">
            {{ csrf_field() }} 
            <div class="row w-100" id="row_cliente">

                <div class="col-md-2 col-sm-12">
                    <label for="data">Data:</label>
                    <input type="datetime" name="data" id="data_orc" class="form-control" value="{{ date('d-m-Y H:i:s') }}"
                        readonly title="{{isset($os) ? $os->dt_abertura : date('d-m-Y H:i:s')}}">
                </div>

                <div class="{{isset($os) ? "col-md-3" : "col-md-2 "}}  col-sm-12">
                    <label for="numero">Numero:</label>
                    <input type="text" name="numero" id="numero_orc" class="form-control text-center" readonly value="{{isset($os) ? $os->id : ''}}">
                </div>

                @if( !isset($orcamento) )

                    @include('layouts.utils.cliente_search')

                @else

                    <div class="col-md-3 col-sm-12">
                        <label for="cliente">Cliente:</label>
                        <input type="hidden" name="cliente" value="{{ $orcamento->cliente->id }}">
                        <input type="text" name="nome_cliente" id="nome_cliente" class="form-control text-center text-capitalize" readonly disabled value="{{$orcamento->cliente->nome}}">
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label for="nome_exibicao">Nome Exibicao:</label>
                        @php
                            $exibir = isset($orcamento->nome_exibicao) ? $orcamento->nome_exibicao : $orcamento->cliente->nome;
                        @endphp
                        <input type="text" name="nome_cliente" id="nome_cliente" class="form-control text-center text-capitalize" readonly disabled value="{{$exibir}}">
                    </div>

                @endif
            </div>
            <hr>

            <div class="row" id="row_produtos">
                <div class="row">
                    
                </div>
            </div>

            {{-- Exibir no final --}}
            {{-- <div class="row" id="row_condicoes_pagto">
                <div class="col-md-4 col-sm-12 col-lg-4" id="col_tipo">
                    <label for="condicao">Condição Pagto</label>
                    <select name="condicao" id="condicao" class="form-control">
                        <option value="-1" disabled selected>Selecione uma opção</option>
                        @forelse($condicoes as $condicao)
                            <option value="{{$condicao->id}}">{{$condicao->tipo}}</option>
                        @empty
                            <option value="0" disabled>Nenhuma condicao cadastrada</option>
                        @endforelse
                    </select>
                </div>

                <div class="col-md-4 col-sm-12 col-lg-4" id="col_forma" style="display:none">
                    <label for="forma_pagto">Forma de Pagto:</label>
                    <select name="forma_pagto" id="forma_pagto" class="form-control">

                    </select>
                </div>

                <div class="col-md-4 col-sm-12 col-lg-4">

                </div>
            </div> --}}
            <hr />
        </form>
    </div>


@endsection
@section('scripts')
<script src="{{asset('js/cliente_select.js')}}"></script>

    <script>
        $("#condicao").change(function(){
            
            let url = "{{ route('formas_pagto', [''] ) }}"+`/${$(this).val()}`;
            $.getJSON(url,{})
            .done(function(data){
                if(data.length > 0){
                    let options = ``;
                    $(data).each(function(i,e){
                        options += `<option value="${e.id}">${e.forma}</option>`
                    })

                    let select = $("#forma_pagto");
                    select.empty();
                    select.append(options);
                    $("#col_forma").fadeIn("slow")

                }else{
                    console.log("Vazio")
                }
            })


        });

    </script>

@endsection