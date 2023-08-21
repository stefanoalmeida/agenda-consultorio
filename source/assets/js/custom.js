$(function () {
    $('#busca').on('input', limpaCampos)

    $('#busca')
        .autocomplete({
            minLength: 2,
            source: function (request, response) {
                $.ajax({
                    url: '/agenda/autocomplete.php',
                    dataType: 'json',
                    data: { acao: 'autocomplete', parametro: $('#busca').val() },
                    success: function (data) {
                        response(data)
                    }
                })
            },
            focus: function (event, ui) {
                $('#busca').val(ui.item.nome)
                carregarDados()
                return false
            },
            select: function (event, ui) {
                $('#busca').val(ui.item.nome)
                return false
            }
        })
        .autocomplete('instance')._renderItem = function (ul, item) {
        return $('<li>')
            .append('<a><b>Cliente: </b>' + item.nome + '</a>')
            .appendTo(ul)
    }
    function carregarDados() {
        var busca = $('#busca').val()
        if (busca != '' && busca.length >= 2) {
            $.ajax({
                url: '/agenda/autocomplete.php',
                dataType: 'json',
                data: { acao: 'consulta', parametro: $('#busca').val() },
                success: function (data) {
                    $('#busca').val(data[0].nome)
                }
            })
        }
    }
    function limpaCampos() {
        var busca = $('#busca').val()
        if (busca == '') {
            $('#busca').val('')
        }
    }
})