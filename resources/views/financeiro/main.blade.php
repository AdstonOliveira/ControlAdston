@extends('layouts.central')

@section('card_title', 'Central Financeiro')

@section('adicionais')
<div class="col-md-12 col-sm-12">
    <div class="col-md-4    col-sm-12">
        <a href="{{ route('admin.divida.novo') }}" class="btn btn-primary">Lançar Conta a Pagar</a>
    </div>
</div>
@endsection

@section('table')

<table class="table table-striped text-center" id="tabela_clientes" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data Nasc</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-capitalize" colspan="6">Nenhum lancamento financeiro</td>
        </tr>
    </tbody>
</table>

@endsection
