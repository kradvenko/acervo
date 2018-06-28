function verDetallesBien(id) {
    var url = new URL(window.location.href);
    var tipoFicha = url.searchParams.get("tipo");
    var id = url.searchParams.get("idficha");
    if (tipoFicha == 'fotografia') {
        $("#divFotografia").css("visibility", "visible");
        $.ajax({url: "php/obtenerFichaFotografiaXML.php", async: false, type: "POST", data: { idFichaFotografia: id }, success: function(res) {
            $('resultado', res).each(function(index, element) {
                $("#divFotografiaTitulo").html($(this).find("titulo").text());
                $("#divFotografiaInstitucion").html($(this).find("nombreInstitucion").text());
                $("#divFotografiaFechaToma").html($(this).find("fechatoma").text());
                $("#divFotografiaPais").html($(this).find("pais").text());
                $("#divFotografiaAlbum").html($(this).find("album").text());
                $("#divFotografiaContextoHistorico").html($(this).find("contextohistorico").text());
                $("#divFotografiaNumeroFotografia").html($(this).find("numerofotografia").text());
            });
        }});
    } else if (tipoFicha == 'libro') {
        $("#divLibro").css("visibility", "visible");
        $.ajax({url: "php/obtenerFichaLibroXML.php", async: false, type: "POST", data: { idFichaLibro: id }, success: function(res) {
            $('resultado', res).each(function(index, element) {
                $("#divLibroTitulo").html($(this).find("titulo").text());
                $("#divLibroInstitucion").html($(this).find("nombreInstitucion").text());
                $("#divLibroAutor").html($(this).find("").text());
                $("#divLibroPais").html($(this).find("pais").text());
                $("#divLibroContextoHistorico").html($(this).find("contextohistorico").text());
            });
        }});
    }
}

function verFotoBien(tipo, rutaimagen) {
    $("#divImagen").html("<img src='" + rutaimagen + "' />");   
}