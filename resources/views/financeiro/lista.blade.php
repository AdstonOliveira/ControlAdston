@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@section('options_btn')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="col-md-12 col-m-12">
                <a href="{{ route('admin.divida.novo') }}" class="btn btn-primary">Lançar Conta a Pagar</a>
            </div>
        </div>
    </div>
@endsection

@section('card_title', 'Central Financeiro')
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
                <tr>
                    <td class="text-capitalize" colspan="6">Nenhum lancamento financeiro</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".table").DataTable();
            $('[data-toggle="tooltip"]').tooltip({
                boundary: 'window'
            })
        })

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
