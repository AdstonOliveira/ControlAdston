@extends('layouts.app')
@section('options_btn')@endsection
@section('card_title', 'Novo Cliente')
@section('content')
    {{-- <div class="row"> --}}


        <form action="{{ !isset($cliente) ? route('cliente.novo') : route('cliente.editar',[$cliente->id]) }}" method="POST">
            
            @isset($cliente)
                @method("PUT")
            @else
                @method("POST")
            @endisset
            {{ csrf_field() }}

            <div class="row ml-2 mr-2 pl-2 pr-2 border rounded">
                @include('cliente.includes.dados_pessoais')
                @include('cliente.includes.documentos')
            </div>

            <div class="row mt-2 pt-2 ml-2 mr-2 pl-2 pr-2 border rounded">
                @include('cliente.includes.endereco')
            </div>

            <div class="mt-2 pt-2 ml-2 mr-2 pl-2 pr-2 border rounded" id="div-telefone">
                @include('cliente.includes.telefones')
            </div>

            <div class="mt-2 pt-2 ml-2 mr-2 pl-2 pr-2 border rounded">
                <div class="col-md-4 col-sm-12 mb-2">
                    <button class="btn {{ isset($cliente) ? " btn-primary " : " btn-success "}} w-100" type="submit">{{ isset($cliente) ? "Editar" : "Salvar" }}</button>
                </div>
            </div>



            
        </form>

    @endsection

    @section('scripts')
        <script src="{{ asset('js/cliente_view.js') }}">
        
        </script>

        @php

        if( isset($cliente) ){
            $script =  
            "<script>
           
                    if($cliente->tipo_id == 1){
                        campos_pf();
                    }else{
                        campos_pj();
                    }

                    mostra_linhas();

            </script>";
            
                echo $script;
        }
        
    @endphp
    @endsection
