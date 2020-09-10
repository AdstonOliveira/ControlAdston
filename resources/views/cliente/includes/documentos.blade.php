<div class="row" style="display: none" id="documentos">

    <div class="col-md-4 col-sm-12" id="col-data">
        <label for="dt_nascimento" id="dt_nac">Data Nascimento</label>
        <input type="date" min="1920-01-01" max="{{ date('Y-m-d') }}" class="form-control" name="dt_nascimento" id="dt_nascimento" aria-describedby="helpId" placeholder="">
        <small id="h_cpf" class="form-text text-muted">Documento Identificação</small>
    </div>

    <div class="col-md-4 col-sm-12">
        <label for="tipo_documento" id="label_doc"></label>
        <input type="text" class="form-control" name="cpf" id="cpf" aria-describedby="helpId" placeholder="">
        <small id="h_cpf" class="form-text text-muted">Documento Identificação</small>
    </div>

    <div class="col-md-4 col-sm-12 pb-2">
        <label for="rg" id="label_rg"></label>
        <input type="text" class="form-control" name="rg" id="rg" aria-describedby="helpId" placeholder="">
        <small id="h_rg" class="form-text text-muted">Documento Identificação</small>
    </div>
</div>
