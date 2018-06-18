
function obtenerBienes() {
    var url = new URL(window.location.href);
    var tipoFicha = url.searchParams.get("tipo");
    var idPais = $("#selPais").val();
    $.ajax({url: "php/obtenerBienesFiltros.php", async: false, type: "POST", data: { idPais: idPais, tipoFicha: tipoFicha }, success: function(res) {
        $('#divBienes').html(res);
    }});
}

function verDetallesBien(id) {
    alert(id);
}