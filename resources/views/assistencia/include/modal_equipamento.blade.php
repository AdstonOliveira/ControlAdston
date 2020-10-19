<div class="modal fade" id="equipamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de novo equipamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="store_equip" action="{{route('equip.store')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="cliente_equip" value="">
                    
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <label for="tipo_equip">Tipo equipamento</label>
                            <select name="tipo_equip" class="form-control" id="tipo_equip">
                                @foreach($tipo_equipamento as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-12">
                            <label for="marca_equip">Marca equipamento</label>
                            <input type="text" name="marca_equip" id="marca_equip" class="form-control">
                        </div>

                        <div class="col-md-3 col-sm-12">
                            <label for="modelo_equip">Modelo equipamento</label>
                            <input type="text" class="form-control" name="modelo_equip" id="modelo_equip">
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <label for="num_serie">Num Serie</label>
                            <input type="text" class="form-control" name="num_serie" id="num_serie">
                        </div>


                    </div>
                    <div class="row p-2">
                        <div class="col-md-12 col-sm-12">
                            <label for="desc_equipamento">Descrição do equipamento</label>
                            <textarea name="desc_equipamento" id="desc_equipamento" class="form-control" cols="30"
                                rows="5"></textarea>
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-md-3 col-sm-12">
                            <button type="submit" class="btn btn-success w-100" >Gravar</button>
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
