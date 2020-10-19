<div class="modal fade" id="equipamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Credor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="store_equip" action="{{ route('equip.store') }}">
                    {{ csrf_field() }}
                    <div class="flex flex-column">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-sm-12">
                                <label for="credor">Nome Credor:</label>
                                <input type="text" name="credor" id="credor" class="form-control w-100">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="pt-2 col-md-6 col-sm-12">
                                <button type="submit" class="btn btn-success w-100">Salvar</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
