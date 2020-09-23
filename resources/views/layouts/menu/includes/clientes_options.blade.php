<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="dropdowncliente" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Clientes
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdowncliente">
        <a class="dropdown-item" href="{{ route('cliente.novo') }}">Novo cliente</a>
        <a class="dropdown-item" href="{{ route('cliente.lista') }}">Lista Cliente</a>
        <a class="dropdown-item" href="#">Gerencial</a>
    </div>
</li>
