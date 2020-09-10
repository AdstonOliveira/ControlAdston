<div class="row">
    <div class="col-md-2 col-sm-12">
        <label for="tipo_cliente">Tipo Cliente</label>
        <select name="tipo_cliente" id="tipo_cliente" class="form-control text-center" required>
            <option value="-1" disabled selected>Selecione</option>
            @foreach ($tipo_cliente as $tipo)
                <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
            @endforeach
        </select>
        <small id="helpTipoCliente" class="form-text text-muted">Selecione o tipo de cliente</small>
    </div>
</div>

<div class="row" id="row_cliente" style="display: none">

    <div class="col-md-4 col-sm-12">
        <label for="nome" id="label_nome"></label>
        <input type="text" class="form-control" name="nome" id="nome" aria-describedby="helpId"
            placeholder="Primeiro Nome Cliente" required>
        <small id="h_nome" class="form-text text-muted">Insira o primeiro nome do cliente</small>
    </div>

    <div class="col-md-4 col-sm-12" id="col_sobrenome">
        <label for="sobrenome" id="label_sobrenome"></label>
        <input type="text" class="form-control" name="sobrenome" id="sobrenome" aria-describedby="helpId"
            placeholder="Sobrenome do cliente" required>
        <small id="h_sobrenome" class="form-text text-muted">Insira o sobrenome do cliente</small>
    </div>

    <div class="col-md-4 col-sm-12" style="display: none" id="razao">
        <label for="razao_social" id="label_razao">Razão Social</label>
        <input type="text" class="form-control" name="razao_social" id="razao_social"
            aria-describedby="helpId" placeholder="Razão social" required disabled>

        <small id="h_razao" class="form-text text-muted">Insira a razão social</small>
    </div>

    <div class="col-md-4 col-sm-12" id="col_email">
        <label for="email" id="label_email">Email</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId"
            placeholder="cliente@cliente.com" required>
        <small id="h_email" class="form-text text-muted">Insira o email de contato</small>
    </div>

</div>
