<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        @include('layouts.menu.includes.logo')

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
                @include('layouts.menu.includes.clientes_options')

                @include('layouts.menu.includes.financeiro_opt')

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
                        <a class="dropdown-item" href="{{route('orcamento.novo')}}">Vender</a>
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