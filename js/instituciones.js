vbi_currentPage = 1;
idBienElegido = 0;

function irInstitucionBienes(tipo, u, tipodisplay) {
    var url = new URL(u);
    var idi = url.searchParams.get("idinstitucion");
    var idc = url.searchParams.get("idciudad");
    var idp = url.searchParams.get("idpais");
    window.location.assign('verbienesinstitucion.php?tipo=' + tipo + '&idinstitucion=' + idi + "&idpais=" + idp + "&idciudad=" + idc + "&tipodisplay=" + tipodisplay);
}

function gridBienes() {
    var url = new URL(window.location.href);
    var tipoFicha = url.searchParams.get("tipo");
    var idInstitucion = url.searchParams.get("idinstitucion");
    $.ajax({url: "php/obtenerBienesInstitucion.php", async: false, type: "POST", data: { idInstitucion: idInstitucion, tipoFicha: tipoFicha, currentPage: vbi_currentPage }, success: function(res) {
        $('#divBienes').html(res);
    }});
}

function gridBienesAlbum() {
    var url = new URL(window.location.href);
    var tipoFicha = url.searchParams.get("tipo");
    var idInstitucion = url.searchParams.get("idinstitucion");
    var idAlbum = url.searchParams.get("idalbum");
    $.ajax({url: "php/obtenerBienesAlbum.php", async: false, type: "POST", data: { idInstitucion: idInstitucion, tipoFicha: tipoFicha, currentPage: vbi_currentPage, idAlbum: idAlbum }, success: function(res) {
        $('#divBienes').html(res);
    }});
}

function irPagina(pagina) {
    vbi_currentPage = pagina;
    gridBienes();
}

function irPaginaAlbum(pagina) {
    vbi_currentPage = pagina;
    gridBienesAlbum();
}

function verBienesAlbum(idalbum, tipo) {
    var url = new URL(window.location.href);
    var idi = url.searchParams.get("idinstitucion");
    var idc = url.searchParams.get("idciudad");
    var idp = url.searchParams.get("idpais");
    var tipodisplay = url.searchParams.get("tipodisplay");
    window.location.assign('verbienesalbum.php?tipo=' + tipo + '&idinstitucion=' + idi + "&idpais=" + idp + "&idciudad=" + idc + "&tipodisplay=" + tipodisplay + "&idalbum=" + idalbum);
}

function verDetallesBien(id, rutaimagen) {
    var url = new URL(window.location.href);
    var tipoFicha = url.searchParams.get("tipo");
    idBienElegido = id;
    if (tipoFicha == 'fotografia') {
        $.ajax({url: "php/obtenerFichaFotografiaXML.php", async: false, type: "POST", data: { idFichaFotografia: id }, success: function(res) {
            $('resultado', res).each(function(index, element) {
                $("#divFotografiaTitulo").html($(this).find("titulo").text());
                $("#divFotografiaImagen").html("<img src='" + rutaimagen + "' />");            
                $("#divFotografiaInstitucion").html($(this).find("nombreInstitucion").text());
                $("#divFotografiaFechaToma").html($(this).find("fechatoma").text());
                $("#divFotografiaPais").html($(this).find("pais").text());
            });
        }});
    } else if (tipoFicha == 'libro') {

    }
}

function verFichaBien() {
    if (idBienElegido == 0) {
        return;
    }

    var url = new URL(window.location.href);
    var idi = url.searchParams.get("idinstitucion");
    var idc = url.searchParams.get("idciudad");
    var idp = url.searchParams.get("idpais");
    var tipo = url.searchParams.get("tipo");
    var tipodisplay = url.searchParams.get("tipodisplay");
    var idalbum = url.searchParams.get("idalbum");
    window.location.assign('ficha.php?idficha=' + idBienElegido + '&tipo=' + tipo + '&idinstitucion=' + idi + "&idpais=" + idp + "&idciudad=" + idc + "&tipodisplay=" + tipodisplay + "&idalbum=" + idalbum);
    
}

function obtenerInstitucion() {
    var url = new URL(window.location.href);
    var idi = url.searchParams.get("idinstitucion");
    idInstitucion = idi;
    $.ajax({url: "php/obtenerInstitucionXML.php", async: false, type: "POST", data: { idInstitucion: idInstitucion }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            $("#divImagenInstitucion").html("<img src='imgs/instituciones/" + $(this).find("imagen").text() + "' />");
            $("#divNombreInstitucion").html($(this).find("nombreInstitucion").text());
            $("#divPais").html($(this).find("pais").text());
            $("#divCiudad").html($(this).find("ciudad").text());
            $("#divDireccion").html($(this).find("domicilio").text() + " " + $(this).find("colonia").text());
        });
    }});
}