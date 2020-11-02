@extends('layouts.app')
@section('options_btn')@endsection
@section('card_title', 'Conta a pagar')
@section('content')

    <div class="col-12">
        @include('financeiro.include.modal_credor')

        <form action="#" method="POST">
            {{ csrf_field() }} 
            <div class="row w-100">
                <div class="col-md-6 col-sm-12">
                    <label for="cliente">Credor:</label>
                    {{-- Add autocomplete --}}
                    <select name="cliente" id="cliente_os" class="form-control" required>
                        @forelse($credores as $credor)
                            <option value="{{$credor->id}}" class="text text-capitalize">{{$credor->nome}}</option>
                        @empty
                            <option value="-1">Nenhum Credor encontrado</option>
                        @endforelse
                    </select>
                </div>

                <div class="col-md-6 col-sm-12" style="display:flex; flex-direction: column">
                    <label for="novo_cliente">Novo Credor:</label>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#equipamento"
                            id="btn_cadequip">+</button>
                </div>
                
            </div>
            <hr />

            <div class="row">
                <div class="row col-md-4 col-sm-12">
                    <div class="col-md-8 col-sm-12">
                        <label for="tipo">Tipo:</label>
                        <select class="form-control" name="tipo_pagto" id="tipo_pagto">
                            @forelse($tipo_divida as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-12 pt-2">
                        <button type="button" class="btn btn-success mt-4 pt-1">+</button>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12">
                    <label for="dt_vct">Data Vencimento:</label>
                    <input type="date" name="dt_vct" id="dt_vct" class="form-control" required>
                </div>

                <div class="col-md-3 col-sm-12">
                    <label for="dt_pagto">Data Pagamento:</label>
                    <input type="date" name="dt_pgto" id="dt_pagto" class="form-control">
                </div>


                <div class="col-md-2 col-sm-12">
                    <label for="valor">Valor:</label>
                    <input type="text" class="form-control money" name="valor" id="valor" required>
                </div>
            </div>
        </form>
    </div>
    @endsection

    @section('scripts')
        
    @endsection
