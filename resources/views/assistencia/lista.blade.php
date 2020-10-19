@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

@section('options_btn')
    <div class="row">
        <div class="col-md-12 col-sm-12">
                <div class="col-md-12 col-m-12">
                    <a href="{{ route('os.novo') }}" class="btn btn-primary">Nova OS</a>
                </div>
        </div>
    </div>
@endsection
@section('card_title', 'Central de OS')
@section('content')
    <div class="container table-responsive">

            <table class="table table-striped text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>OS</th>
                        <th max-width="50%" class="text text-truncate">Cliente</th>
                        <th width="20%">Data Entrada</th>
                        <th>Status</th>
                        <th>Responsável</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ordens as $os)
                        <tr>
                            <td>{{ $os->id }}</td>
                            <td class="text text-capitalize text-truncate w-25">{{ $os->equipamento->cliente->nome }}</td>
                            <td>{{ date('d-m-Y', strtotime($os->dt_abertura)) }}</td>
                            <td>{{ $os->status->status }}</td>
                            <td>{{ $os->abertoPor->name }}</td>
                            <td>
                                <div class="row justify-content-around">

                                    <a href="{{ route('os.edit', [$os->id]) }}" class="btn btn-sm botao" data-toggle="tooltip"
                                        data-placement="top" title="Editar Ordem Serviço">
                                        <i class="fa fa-edit editar"></i>
                                    </a>

                                    <form action="{{ route('os.delete') }}" method="post" name="form_delete">
                                        @method("DELETE")
                                        {{ csrf_field() }}
                                        <input type="hidden" name="os_id_delete" value="{{$os->id}}">
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
                            <td colspan="6">Nenhuma OS cadastrada</td>
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
        $(".table").DataTable();

        $('[data-toggle="tooltip"]').tooltip({
            boundary: 'window'
        })
    })

    $("[name='form_delete']").on("submit", function(e) {
        e.preventDefault();
        var form = this;
        Swal.fire({
            title: 'Excluir OS!',
            text: 'Atenção! \nDeseja mesmo excluir esta OS?',
            icon: 'warning',
            showDenyButton: true,
            showCancelButton: true,
            cancelButtonText: `Não, não excluir!`,
            cancelButtonColor: '#3085d6',
            confirmButtonText: `Sim, excluir!`,
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
