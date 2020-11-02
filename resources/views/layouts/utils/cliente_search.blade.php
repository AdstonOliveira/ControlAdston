<div class="col-md-3 col-sm-12">
    <label for="cliente" class="pb-2">Cliente:</label>
    <select name="cliente" id="cliente" class="form-control" required></select>
</div>

<div class="col-md-3 col-sm-12">
    <label for="cliente">Nome Exibicao:</label>
    <input type="text" name="nome_exibicao" id="nome_exibicao" class="form-control">
</div>

<div class="col-md-2 col-sm-12" style="display:flex; flex-direction: column">
    <label for="novo_cliente">Novo Cliente:</label>
    <a href="{{ route('cliente.novo') }}" target="_blank" class="btn btn-sm btn-primary">+</a>
</div>