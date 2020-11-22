<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    .my-card {
        position: absolute;
        left: 40%;
        top: -20px;
        border-radius: 50%;
    }

</style>

<div class="card w-100">
    <div class="card-header">
        <div class="row justify-content-end pr-2">
            <a class="btn btn-success shadow" data-toggle="collapse" href="#collapseExample" role="button"
                aria-expanded="false" aria-controls="collapseExample" onclick="mudaNome($(this))">
                Exibir Informações
            </a>
        </div>
    </div>
    <div class="row collapse" id="collapseExample">
        <div class="col-md-3">
            <div class="card border-info mx-sm-1 p-3">
                <div class="card border-info shadow text-info p-3 my-card"><span class="fa fa-car"
                        aria-hidden="true"></span></div>
                <div class="text-info text-center mt-3">
                    <h4>{{isset($card1) ? $card1 : "Total"}}</h4>
                </div>
                <div class="text-info text-center mt-2">
                    <h1>{{isset($total) ? $total : 0}}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-success mx-sm-1 p-3">
                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye"
                        aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3 text-truncate">
                    <h4>Clientes atrasados</h4>
                </div>
                <div class="text-success text-center mt-2">
                    <h1>9332</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-danger mx-sm-1 p-3">
                <div class="card border-danger shadow text-danger p-3 my-card"><span class="fa fa-heart"
                        aria-hidden="true"></span></div>
                <div class="text-danger text-center mt-3">
                    <h4>Hearts</h4>
                </div>
                <div class="text-danger text-center mt-2">
                    <h1>346</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-warning mx-sm-1 p-3">
                <div class="card border-warning shadow text-warning p-3 my-card"><span class="fa fa-inbox"
                        aria-hidden="true"></span></div>
                <div class="text-warning text-center mt-3">
                    <h4>Inbox</h4>
                </div>
                <div class="text-warning text-center mt-2">
                    <h1>346</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function mudaNome(element){
        let text = element.text();
        if(text == "Ocultar Informações"){
            element.text("Exibir Informações")
        }else{
            element.text("Ocultar Informações")
        }
    }

</script>