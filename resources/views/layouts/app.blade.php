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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @guest
                @else
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        {{-- Add itens aqui --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="display: none">Normal</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdowncliente" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Clientes
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdowncliente">
                                <a class="dropdown-item" href="{{route('cliente.novo')}}">Novo cliente</a>
                                <a class="dropdown-item" href="#">Lista Cliente</a>
                                <a class="dropdown-item" href="#">Gerencial</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownfinanceiro" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Financeiro
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownfinanceiro">
                                <a class="dropdown-item" href="#">Contas a Pagar</a>
                                <a class="dropdown-item" href="#">Contas a Receber</a>
                                <a class="dropdown-item" href="#">Gerencial</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarProdutos" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Produtos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarProdutos">
                                <a class="dropdown-item" href="#">Gerenciar Produtos</a>
                                <a class="dropdown-item" href="#">Gerenciar Estoque</a>
                                <a class="dropdown-item" href="#">Compras</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="NavbarVendas" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Vendas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="NavbarVendas">
                                <a class="dropdown-item" href="#">Vender</a>
                                <a class="dropdown-item" href="#">Histórico</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="NavbarAssistencia" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Assistência
                            </a>
                            <div class="dropdown-menu" aria-labelledby="NavbarAssistencia">
                                <a class="dropdown-item" href="{{ route('os') }}">Ordens Serviço</a>
                                <a class="dropdown-item" href="#">Equipamentos</a>
                            </div>
                        </li>

                    </ul>
                    @endguest
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container justify-content-around">
                <div class="row pb-2">
                    <div class="col-md-12 col-sm-12">
                        <div class="card card-body">
                            <div class="col-md-12 col-m-12">
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
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    {{-- @include('sweet::alert') --}}
    {{-- @include('sweetalert::alert') --}}
    {{-- @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"]) --}}

    <script src="{{asset('js/jmask/dist/jquery.mask.js')}}"></script>
    @yield('scripts')

</body>

</html>
