@extends('layouts.central')

@section('card_title', 'Central de Produtos')

@section('adicionais')
    <div class="col-md-12 col-sm-12">
        <div class="col-md-12 col-m-12">
            <a href="{{ route('os.novo') }}" class="btn btn-primary">Nova OS</a>
        </div>
    </div>
@endsection

@section('table')

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
        @forelse($produtos as $produto)
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
                                title="Excluir os" name="btn_excluir">
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

@endsection

@section('scripts')

<script>
    function editar(id) {
        window.location.href = `/cliente/editar/${id}`
    }

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
