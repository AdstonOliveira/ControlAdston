async function preencheCidade() {
    let id = $("#estado option:selected").val()
    let route = "/cidades"
    route += "/" + id

    $.get(route, {})
        .done(function (data) {
            $("#cidade").empty();
            $("#cidade").append(data)
        })

}

function mostra_linhas(){
    $("#row_cliente").fadeIn("slow")
    $("#documentos").fadeIn("slow")
    exibeEndereco()
}

function campos_pf(){

    if ($("#razao").is(':visible')) {
        $("#razao").hide();
    }

    $("#label_nome").empty();
        $("#label_nome").append("Nome");
        $("#nome").attr("placeholder", "Nome do cliente");
        $("#h_nome").empty();
        $("#h_nome").append("Insira o nome do cliente");

        $("#label_sobrenome").empty();
        $("#label_sobrenome").append("Sobrenome");

        if (!$("#col_sobrenome").is(":visible")) {
            $("#razao_social").prop("disabled", "disabled")
            $("#sobrenome").prop('disabled', false)
            $("#col_sobrenome").fadeIn()
        }

        if(!$("#col-data").is(":visible") ){
            $("#col-data").fadeIn("slow")
        }

        $("#label_doc").empty();
        $("#label_doc").append("CPF")
        $("#cpf").mask('000.000.000-00', {
            reverse: true
        })

        $("#label_rg").empty();
        $("#label_rg").append("RG")
}

function campos_pj(){
    $("#label_nome").empty();
        $("#label_nome").append("Nome fantasia");
        $("#nome").attr("placeholder", "Nome fantasia");
        $("#h_nome").empty();
        $("#h_nome").append("Insira o nome fantasia da empresa");

        $("#sobrenome").attr('disabled', 'disabled')
        $("#col_sobrenome").hide()

        $("#label_doc").empty();
        $("#label_doc").append("CNPJ")

        $("#cpf").mask('00.000.000/0000-00', {
            reverse: true
        })

        $("#razao_social").prop('disabled', false);
        $("#razao").fadeIn("fast");

        $("#label_rg").empty();
        $("#label_rg").append("IE")

        if($("#col-data").is(":visible") ){
            $("#col-data").fadeOut("slow")
        }
        $("#col-data").fadeOut("slow")
}




$(document).ready(function () {

    $("#cep").mask('99.999-999', {
        reverse: true
    })

    $(".telefone").mask(SPMaskBehavior,spOptions)

    $("#tipo_cliente ").change(function () {

        let selecionado = $("#tipo_cliente option:selected").val();

        if (selecionado == 1) {
            campos_pf();

        } else if (selecionado == 2 || selecionado == 3) {

            campos_pj();
        }

        if (selecionado != -1) {
            mostra_linhas();            
        }

    })
})


$("#estado").change(function () {
    let a = Promise.resolve( preencheCidade() )
})




$("#btn-cep").click(async function () {

    let cep = $("#cep").val().replace(/[^0-9]/, '');

    try {
        const response = await
            $.ajax({
                url: 'https://viacep.com.br/ws/' + cep + "/json",
                dataType: 'jsonp',
                crossDomain: true,
                contentType: "application/json",
                statusCode: {
                    200: function (data) {
                        console.log(data)
                    } // Ok
                    ,
                    400: function (msg) {
                        console.log(msg);
                    } // Bad Request
                    ,
                    404: function (msg) {
                        Swal.fire({
                            title: 'Erro!',
                            text: "Cep não localizado!",
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })

                        enableInput($("#estado option"))
                        enableInput($("#cidade option"))
                        $("#rua").attr("readonly", false)
                    } // Not Found
                }

            })

        if (response.erro) {
            Swal.fire({
                title: 'Erro!',
                text: "Cep não localizado!",
                icon: 'error',
                confirmButtonText: 'OK'
              })

              enableInput($("#estado option"))
              enableInput($("#cidade option"))
              $("#rua").attr("readonly", false)

            return
        }

        if ($("#estado option:selected").text().trim() != response.uf) {
            let estados = $("#estado option")
            console.log("diferente tem que preencher")

            $(estados).each(function (i, e) {
                if ($(this).text().trim() == response.uf) {
                    $("#estado").val($(this).val())
                    $(this).attr("selected", "selected")

                } else {
                    $(e).attr('disabled', "disabled")
                }
            })

            let a = await Promise.resolve(preencheCidade()).then(() => console.log(
                "Ja preencheu aqui"))

            Promise.all([a])
                .then(
                    function () {
                        setTimeout(function () { preencheCampo(response) }, 1000)
                    })
        } else {
            let estados = $("#estado option")
            $(estados).each(function (i, e) {
                if ($(this).text().trim() == response.uf) {
                    $("#estado").val($(this).val())
                    $(this).attr("selected", "selected")
                    // return true;
                } else {
                    $(e).attr('disabled', "disabled")
                }
            })
            preencheCampo(response)
        }

    } catch (error) {
        console.log(error)
    }

    exibeEndereco()

})

async function preencheCampo(data) {
    $("#rua").val(data.logradouro)
    $("#rua").attr("readonly", true)
    $("#bairro").val(data.bairro)
    $("#bairro").attr("readonly", true)

    let options = $("#cidade option")

    $(options).each(function (i, e) {

        if ($(this).text().trim() == data.localidade) {
            $("#cidade").val($(e).val())
            $(e).attr("selected", "selected")
        } else {
            $(e).attr('disabled', true)
        }

    })

}

$("#tipo_endereco").change(function () {
    exibeEndereco()
})

function exibeEndereco() {
    if (!$("#endereco").is("visible")) {
        $("#endereco").fadeIn("slow")
    }

    $("#cep").attr("disabled", false)
}

function enableInput(input){

    input.each( (i, e)=>{
        $(e).prop('disabled', false)
    })
}

$("#tipo_telefone").change(function(){
    $("#btn-telefone").attr("disabled", false)
    $("#pre_telefone").text( $("#tipo_telefone option:selected").text() )
})

var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
  spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
  };



