<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    

    @yield('css')
    <style>
        body {
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
        .botao{
            font-size: 20px;
        }
        .botao > .editar{
            color: #0683AF;
        }

        .botao > .excluir{
            color: red;
        }
        
        #menus > .nav-item{
            font-weight: 800;
            text-shadow: 1px 1px 10px rgba(150, 150, 150, .6);
            padding-left: 10px;
        }

    </style>
    
</head>

<body>
    @include('sweet::alert')

    <div id="app">
        @include('layouts.menu.navbar')

        <main class="py-4">
            <div class="container justify-content-around">

                <div class="row pb-2" id="row_fade">
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-body">
                            <div class="col-md-12 col-m-12" id="opt_btn_div">
                                @yield('options_btn')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>@yield('card_title')</h4>
                            </div>
                            <div class="card-body">
                                <div class="row col-12 col-md-12 col-sm-12 justify-content-center">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('sweet::alert')
    <script src="{{asset('js/jmask/dist/jquery.mask.js')}}"></script>

    @if (Session::has('success'))
        <script>
            Swal
                .fire(
                    "Operação efetuada com sucesso",
                    `{!! Session::get('success') !!}`,
                    "success"
                );
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            Swal
                .fire(
                    "Operação efetuada com sucesso",
                    `{!! Session::get('error') !!}`,
                    "error"
                );
        </script>
    @endif

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>


    <script>

        $(document).ready(function(){

            if( $("#opt_btn_div").html().trim().length == 0){
                console.log("empty")
                $("#row_fade").fadeOut()
            }else{
                console.log( $("#opt_btn_div").html().trim().length )
            }

            if($("body").find(".table")){
                $(".table").DataTable();
            }

            if($("body").find("[data-toogle='tooltip']")){
                $('[data-toggle="tooltip"]').tooltip({
                    boundary: 'window'
                })
            }
        })


    </script>


    @yield('scripts')

</body>

</html>
