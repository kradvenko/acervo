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
                if ($(this).find("titulo").text().length > 0) {
                    $("#divLibroTitulo").html($(this).find("titulo").text());
                } else {
                    $("#divLibroTituloContainer").hide();
                }
                //$("#divLibroInstitucion").html($(this).find("nombreInstitucion").text());
                /*if ($(this).find("titulo").text().length > 0) {
                    $("#divLibroAutor").html($(this).find("").text());
                } else {
                    $("#divLibroAutorContainer").hide();
                }*/
                if ($(this).find("pais").text().length > 0) {
                    $("#divLibroPais").html($(this).find("pais").text());
                } else {
                    $("#divLibroPaisContainer").hide();
                }
                if ($(this).find("imprenta").text().length > 0) {
                    $("#divLibroImprenta").html($(this).find("imprenta").text());
                } else {
                    $("#divLibroImprentaContainer").hide();
                }
                if ($(this).find("prologo").text().length > 0) {
                    $("#divLibroPrologo").html($(this).find("prologo").text());
                } else {
                    $("#divLibroPrologoContainer").hide();
                }
                if ($(this).find("editorial").text().length > 0) {
                    $("#divLibroEditorial").html($(this).find("editorial").text());
                } else {
                    $("#divLibroEditorialContainer").hide();
                }
                if ($(this).find("lugaredicion").text().length > 0) {
                    $("#divLibroLugarEdicion").html($(this).find("lugaredicion").text());
                } else {
                    $("#divLibroLugarEdicionContainer").hide();
                }
                if ($(this).find("fechaedicion").text().length > 0) {
                    $("#divLibroFechaEdicion").html($(this).find("fechaedicion").text());
                } else {
                    $("#divLibroFechaEdicionContainer").hide();
                }
                if ($(this).find("fechaimpresion").text().length > 0) {
                    $("#divLibroFechaImpresion").html($(this).find("fechaimpresion").text());
                } else {
                    $("#divLibroFechaImpresionContainer").hide();
                }
                if ($(this).find("fechareimpresion").text().length > 0) {
                    $("#divLibroFechaReimpresion").html($(this).find("fechareimpresion").text());
                } else {
                    $("#divLibroFechaReimpresionContainer").hide();
                }
                if ($(this).find("idioma").text().length > 0) {
                    $("#divLibroIdioma").html($(this).find("idioma").text());
                } else {
                    $("#divLibroIdiomaContainer").hide();
                }
                if ($(this).find("contextohistorico").text().length > 0) {
                    $("#divLibroContextoHistorico").html($(this).find("contextohistorico").text());
                } else {
                    $("#divLibroContextoHistoricoContainer").hide();
                }
            });
        }});
    }

}

function verFotoBien(tipo, rutaimagen) {
    $("#divImagen").html("<img src='" + rutaimagen + "' />");
}

function verPdfBien(tipo, rutapdf) {
    $("#divPdf").html("<object data='" + rutapdf + "' type='application/pdf' width='700' height='600' id='oPdf'><a href='" + rutapdf + "'></a></object>");
}

function obtenerAutoresFicha() {
    var url = new URL(window.location.href);
    var tipoFicha = url.searchParams.get("tipo");
    var id = url.searchParams.get("idficha");
    var autores = "";
    $.ajax({url: "php/obtenerAutoresFichaXML.php", async: false, type: "POST", data: { idFicha: id, tipo: tipoFicha }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            if (autores.length == 0) {
                autores = $(this).find("autor").text();
            } else {
                autores = autores + "/" + $(this).find("autor").text();
            }
        });
    }});
    $("#divAutores").html(autores);
}