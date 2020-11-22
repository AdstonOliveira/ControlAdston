@extends('layouts.app')
@section('options_btn')@endsection
@section('card_title', 'Cadastro Produto')
@section('content')
    <style>
        #upload {
            opacity: 0;
        }

        #upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }

        .image-area {
            border: 2px dashed rgba(255, 255, 255, 0.7);
            padding: 1rem;
            position: relative;
        }

        .image-area::before {
            content: 'Uploaded image result';
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
        }
    </style>
    <div class="row col-md-12 col-sm-12 ml-auto">

        <form action="#" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row justify-content-around">
                <div class="col-md-3 col-sm-12 border rounded">
                    <!-- Uploaded image area-->
                    <div class="image-area">
                        <img id="imageResult" src="{{ url('storage/images/default.svg') }}" alt=""
                            class="img-fluid rounded shadow-sm mx-auto d-block" width="80%" height="60px">
                    </div>
                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                        <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                        <label id="upload-label" for="upload" class="font-weight-light text-muted">Selecione</label>

                        <div class="input-group-append">
                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                    class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                    class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                        </div>
                    </div>

                </div>
                {{-- Fim da foto --}}
                <div class="col-md-9 col-sm-12">

                    <div class="row justify-content-around">
                        <div class="col-md-4 col-sm-12">
                            <label for="id">Id</label>
                            <input type="text" name="id" id="id" class="form-control" disabled>
                        </div>

                        <div class="col-md-8 col-sm-12">
                            <label for="produto">Produto</label>
                            <input type="text" class="form-control" name="produto" id="produto" placeholder="Nome produto">
                        </div>
                    </div>

                    <div class="row pt-4 justify-content-around">
                        <div class="col-md-6 col-sm-12">
                            <label for="marca">Marca</label>

                            <div class="input-group mb-3">
                                <select name="marca" id="marca" class="form-control">
                                    <option value="-1" disabled selected>-- Marca --</option>
                                </select>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-success">+</button>
                                    {{-- <span class="input-group-text" id="basic-addon2">+</span> --}}
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <label for="categoria">Categoria</label>
                            <div class="input-group mb-3">
                                <select name="categoria" id="categoria" class="form-control">
                                    <option value="-1" disabled selected>-- Categoria --</option>
                                </select>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-success">+</button>
                                </div>
                            </div>

                            
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-md-6 col-sm-12">
                            <label for="modelo">Modelo</label>
                            <input type="text" class="form-control" name="modelo" id="modelo">
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" name="descricao" id="descricao">
                        </div>

                    </div>



                </div>
            </div>

            <div class="row pt-3 justify-content-around">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <label for="codigo_interno">Codigo Interno</label>
                        <input type="text" class="form-control" name="codigo_interno" id="codigo_interno">
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <label for="codigo_barras">Codigo Barras</label>
                        <input type="text" class="form-control" name="codigo_barras" id="codigo_barras">
                    </div>

                    <div class="col-md-2 col-sm-12">
                        <label for="preco_venda_atual">Preço Venda Atual</label>
                        <input type="number" class="form-control" name="preco_venda_atual" id="preco_venda_atual">
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <label for="margem_lucro">Margem Lucro</label>
                        <input type="number" class="form-control" name="margem_lucro" id="margem_lucro">
                    </div>

                </div>

                <div class="row pt-2">

                    <div class="col-md-4 col-sm-12">
                        <label for="un_venda">UN Venda</label>
                        <div class="input-group mb-3">
                            <select name="un_venda" id="un_venda" class="form-control">
                                <option value="-1" disabled selected>-- UN VENDA --</option>
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-success">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="un_compra">UN Compra</label>
                        <div class="input-group mb-3">
                            <select name="un_compra" id="un_compra" class="form-control">
                                <option value="-1" disabled selected>-- UN COMPRA --</option>
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-success">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="un_estoque">UN Estoque</label>
                        <div class="input-group mb-3">
                            <select name="un_estoque" id="un_estoque" class="form-control">
                                <option value="-1" disabled selected>-- UN ESTOQUE --</option>
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-success">+</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

@endsection
@section('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imageResult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function() {
            $('#upload').on('change', function() {
                readURL(input);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME
        * ========================================== */
        var input = document.getElementById('upload');
        var infoArea = document.getElementById('upload-label');

        input.addEventListener('change', showFileName);

        function showFileName(event) {
            var input = event.srcElement;
            var fileName = input.files[0].name;
            infoArea.textContent = 'File name: ' + fileName;
        }

    </script>
@endsection
