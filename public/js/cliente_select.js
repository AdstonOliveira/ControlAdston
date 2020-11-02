$(document).ready(function() {
    var preenchido = [];

    $("#cliente").select2({
        minimumInputLength: 3,

        ajax: {
            url: function(params) {
                return "/clientes_json/" + params.term
            },
            dataType: "json",
            processResults: function(data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                params.page = params.page || 1;

                return {
                    results: data.data,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        placeholder: 'Insira o nome',
        minimumInputLength: 3,
        templateResult: formatRepo,
        templateSelection: formatRepoSelection
    });

    function formatRepo(data) {
        if (data.loading) {
            return data.id;
        }

        var $container = $(
            "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__meta'>" +
            "<div class='select2-result-repository__title'></div>" +
            "</div>" +
            "</div>" +
            "</div>"
        );

        $container.find(".select2-result-repository__title").text("CPF: " + data.identificacao + " Nome: " +
            data.nome);

        return $container;
    }

    function formatRepoSelection(data) {

        return data.nome;
    }

});

$("#cliente_os").on("select2:select", function() {
    $("#btn_cadequip").attr("disabled", false)
    let cliente_id = $(this).val();
    $("[name='cliente_equip']").val(cliente_id);


    $.getJSON("{{ route('equip.lista', []) }}", {
            cliente_id
        }, function() {})
        .done(function(data) {
            let equips = data;
            let option = "";
            let equipamentos = $("#equipamentos");
            equipamentos.empty();

            $(equips).each(function(i, e) {
                option += `<option value='${e.id}'>${e.marca} - ${e.num_serie}</option>`;
            })

            equipamentos.html(option);

        })

        .fail(function() {
            console.log("Erro")
        })

});

var _token = $('meta[name="_token"]').attr('content');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': _token
    }
});