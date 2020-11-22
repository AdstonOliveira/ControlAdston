@extends('layouts.app')
@section('options_btn')
<div class="row">
    <div class="col-md-12 col-sm-12">
            <div class="col-md-12 col-m-12">
                <a href="{{ route('cliente.novo') }}" class="btn btn-primary">Novo cliente</a>
            </div>
    </div>
</div>
@endsection

@section('card_title', 'Central de Clientes')
@section('content')

    <div class="container table-responsive">
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

                @forelse($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td class="text-capitalize">{{ $cliente->tipo_id == 1 ? $cliente->nome : $cliente->razao_social }}</td>
                        <td>{{ date('d-m-Y', strtotime($cliente->dt_nascimento)) }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td class="text-capitalize">{{ $cliente->tipo->tipo }}</td>
                        <td>
                            <div class="row justify-content-around">
                                <a href="{{ route('cliente.editar', [$cliente->id]) }}" class="btn btn-sm botao"
                                    data-toggle="tooltip" data-placement="top" title="Editar cliente">
                                    <i class="fa fa-edit editar"></i>
                                </a>
                                <form action="{{ route('cliente.delete', [$cliente->id]) }}" method="post" name="form_delete">
                                    @method("DELETE")
                                    {{ csrf_field() }}
                                    <button class="btn btn-sm botao" data-toggle="tooltip" data-placement="top"
                                        title="Excluir cliente" name="btn_excluir">
                                        <i class="fa fa-trash-o excluir" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-capitalize" colspan="6">nenhum cliente cadastrado</td>
                    </tr>
                @endforelse


            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $("#tabela_clientes").DataTable();
        $('[data-toggle="tooltip"]').tooltip({
            boundary: 'window'
        })
    })

    function editar(id) {
        window.location.href = `/cliente/editar/${id}`
    }

    $("[name='form_delete']").on("submit", function(e) {
        e.preventDefault();
        var form = this;
        Swal.fire({
            title: 'Excluir Cliente!',
            text: 'Atenção! \nDeseja mesmo excluir este cliente?',
            icon: 'warning',
            showDenyButton: true,
            showCancelButton: true,
            cancelButtonText: `Não, não excluir o cliente!`,
            cancelButtonColor: '#3085d6',
            confirmButtonText: `Sim, excluir este cliente!`,
            confirmButtonColor: 'red',
        }).then(function(result) {

            if (result.isConfirmed) {
                form.submit()
                // Swal.fire(
                //     'Cliente excluido!',
                //     'Exclusão enviada',
                //     'success',
                // )
            }
        })
    })

</script>
@endsection
