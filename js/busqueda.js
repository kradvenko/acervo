

function limpiarCamposBusqueda() {
    $("#selOpciones").val("ELIJA");
    $("#tbBuscar").val("");
}

function buscar() {
    var tipoBusqueda = $("#selOpciones").val();

    if (tipoBusqueda == "ELIJA") {
        alert("Elija un tipo de búsqueda");
        return;
    }

    if (tipoBusqueda == "TITULO") {
        var busqueda = $("#tbBuscar").val();
        $.ajax({url: "php/buscarBien.php", async: false, type: "POST", data: { busqueda: busqueda }, success: function(res) {
            $('#divResultados').html(res);
        }});
    }
}

function irFicha(idBienElegido, tipo, idi, idp, idc, tipodisplay, idalbum ) {
    window.location.assign('ficha.php?idficha=' + idBienElegido + '&tipo=' + tipo + '&idinstitucion=' + idi + "&idpais=" + idp + "&idciudad=" + idc + "&tipodisplay=" + tipodisplay + "&idalbum=" + idalbum);
}