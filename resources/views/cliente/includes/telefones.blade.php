@isset($cliente)
<div class="row pt-2 ml-2 mr-2" id="div-telefone">

    <div class="row" id="conteudo_telefone" name="conteudo_telefone" number=0>

        <div class="col-md-4 col-sm-12">

            <label for="telefone">Telefone com DDD</label>
            <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <button type="button" class="input-group-text">
                        Telefone residencial
                    </button>
                </div>

                <input type="text" name="residencial" class="form-control telefone"
                    value="{{ !empty($residencial) ? $residencial->telefone : "" }}" >
            </div>

        </div>

        <div class="col-md-4 col-sm-12">

            <label for="telefone">Telefone com DDD</label>
            <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <button type="button" class="input-group-text">
                        Telefone comercial
                    </button>
                </div>

                <input type="text" name="comercial" class="form-control telefone"
                    value="{{ !empty($comercial) ? $comercial->telefone : ""}}">
            </div>

        </div>

        <div class="col-md-4 col-sm-12">

            <label for="telefone">Telefone com DDD</label>
            <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <button type="button" class="input-group-text">
                        Celular
                    </button>
                </div>

                <input type="text" name="celular" class="form-control telefone"7
                    value="{{ !empty($celular) ? $celular->telefone : ""}}">
            </div>

        </div>



    </div>


</div>
@else
<div class="row pt-2 ml-2 mr-2" id="div-telefone">

    <div class="row" id="conteudo_telefone" name="conteudo_telefone" number=0>

        <div class="col-md-4 col-sm-12">

            <label for="telefone">Telefone com DDD</label>
            <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <button type="button" class="input-group-text">
                        Telefone residencial
                    </button>
                </div>

                <input type="text" name="residencial" class="form-control telefone" 
                    >
            </div>

        </div>

        <div class="col-md-4 col-sm-12">

            <label for="telefone">Telefone com DDD</label>
            <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <button type="button" class="input-group-text">
                        Telefone comercial
                    </button>
                </div>

                <input type="text" name="comercial" class="form-control telefone"
                    >
            </div>

        </div>

        <div class="col-md-4 col-sm-12">

            <label for="telefone">Telefone com DDD</label>
            <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <button type="button" class="input-group-text">
                        Celular
                    </button>
                </div>

                <input type="text" name="celular" class="form-control telefone"
                    >
            </div>

        </div>

{{-- Preencher os telefones aqui --}}

    </div>


</div>
@endisset