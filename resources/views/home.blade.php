@extends('layouts.app')
<style>
    body{
        background-color: #fff;
                background-image: url('{{ asset('img/background.jpg') }}');
                background-size: cover;
                background-repeat: no-repeat;

                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Painel de avisos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Seja Bem-vindo !!!
                    @if(isset($avisos))
                        Avisos
                    @else
                        <div class="row w-100 justify-content-center">
                            Nenhum aviso no momento
                        </div>
                    @endif




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
