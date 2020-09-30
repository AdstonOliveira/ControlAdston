@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row pb-2">
        <div class="col-md-12 col-sm-12">
            <div class="card card-body">
                <div class="col-md-12 col-m-12">
                    <a href="{{route("os.novo")}}" class="btn btn-primary">Nova OS</a>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-around">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Ordens de Serviço
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>OS</th>
                                <th max-width = "50%" class="text text-truncate">Cliente</th>
                                <th>Data Entrada</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @while ($i < 15)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td class="text text-truncate w-50">Clientebvbvvbvbvbvbvbvbvbvbvbhjhjhjhjhjhhj{{$i}}</td>
                                    <td>{{ date('d-m-Y', strtotime("-$i days"))}}</td>
                                    <td>{{ $i % 2 == 0 ? "Aberta" : "Fechada"}}</td>
                                </tr>
                                <?php $i++ ?>
                            @endwhile
                            <tr>

                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".table").DataTable()
</script>

@endsection
