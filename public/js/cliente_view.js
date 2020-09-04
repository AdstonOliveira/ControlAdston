// const { default: swal } = require("sweetalert");

$(document).ready(function () {

    $("#cep").mask('99.999-999', {
        reverse: true
    })

    $("#tipo_cliente ").change(function () {

        let selecionado = $("#tipo_cliente option:selected").val();

        if ($("#razao").is(':visible')) {
            $("#razao").hide();
        }

        if (selecionado == 1) {
            $("#label_nome").empty();
            $("#label_nome").append("Nome");
            $("#nome").attr("placeholder", "Nome do cliente");
            $("#h_nome").empty();
            $("#h_nome").append("Insira o nome do cliente");

            $("#label_sobrenome").empty();
            $("#label_sobrenome").append("Sobrenome");

            if (!$("#col_sobrenome").is(":visible")) {
                $("#sobrenome").prop('disabled', false)
                $("#col_sobrenome").fadeIn()
            }

            $("#label_doc").empty();
            $("#label_doc").append("CPF")
            $("#cpf").mask('000.000.000-00', {
                reverse: true
            })

            $("#label_rg").empty();
            $("#label_rg").append("RG")
        } else if (selecionado == 2 || selecionado == 3) {

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
        }

        if (selecionado != -1) {
            $("#row_cliente").fadeIn("slow")
            $("#documentos").fadeIn("slow")
        }

    })
})

$("#estado").change(function () {
    let a = Promise.resolve(preencheCidade())
})

async function preencheCidade() {
    let id = $("#estado option:selected").val()
    let route = "{{ url('cidades') }}"
    route += "/" + id

    $.get(route, {})
        .done(function (data) {
            $("#cidade").empty();
            $("#cidade").append(data)
        })

    console.log("Preencheu")
}


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
