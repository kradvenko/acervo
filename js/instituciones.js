vbi_currentPage = 1;

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
    if (tipoFicha == 'fotografia') {
        $.ajax({url: "php/obtenerFichaFotografiaXML.php", async: false, type: "POST", data: { idFichaFotografia: id }, success: function(res) {
            $('resultado', res).each(function(index, element) {
                $("#divFotografiaTitulo").html($(this).find("titulo").text());
                $("#divFotografiaImagen").html("<img src='" + rutaimagen + "' />");            
                $("#divFotografiaInstitucion").html($(this).find("nombreInstitucion").text());
                $("#divFotografiaFechaToma").html($(this).find("fechatoma").text());
                $("#divFotografiaPais").html($(this).find("pais").text());
                
                /*
                ff_InstitucionElegida = $(this).find("idinstitucion").text();
                $("#tbNumeroInterno").val($(this).find("numeroregistrointerno").text());
                $("#tbNumeroInventario").val($(this).find("numeroinventario").text());
                $("#tbTituloSerie").val($(this).find("tituloserie").text());
                $("#tbLugarAsunto").val($(this).find("ciudadAsunto").text());
                ff_LugarAsunto = $(this).find("idciudadasunto").text();
                $("#tbLugarToma").val($(this).find("ciudadToma").text());
                ff_LugarToma = $(this).find("idciudadtoma").text();
                $("#tbFechaAsunto").val($(this).find("fechaasunto").text());
                
                $("#tbEstudio").val($(this).find("estudio").text());
                ff_Estudio = $(this).find("idestudio").text();
                $("#tbAlbum").val($(this).find("album").text());
                ff_Album = $(this).find("idalbum").text();
                $("#tbNumeroFotografia").val($(this).find("numerofotografia").text());
                $("#tbColeccion").val($(this).find("coleccion").text());
                $("#tbClaveTecnica").val($(this).find("clavetecnica").text());
                $("#taAnotaciones").val($(this).find("anotaciones").text());
                $("#taContextoHistorico").val($(this).find("contextohistorico").text());
                $("#sEstadoConservacion").val($(this).find("estadoconservacion").text());
                $("#sEstadoIntegridad").val($(this).find("estadointegridad").text());
                $(this).find("agrietamiento").text() == 'SI' ? $("#cbAgrietamiento").prop("checked", true) : $("#cbAgrietamiento").prop("checked", false);
                $(this).find("ataquebiologico").text() == 'SI' ? $("#cbAtaque").prop("checked", true) : $("#cbAtaque").prop("checked", false);
                $(this).find("burbujas").text() == 'SI' ? $("#cbBurbujas").prop("checked", true) : $("#cbBurbujas").prop("checked", false);
                $(this).find("cambioscolor").text() == 'SI' ? $("#cbCambios").prop("checked", true) : $("#cbCambios").prop("checked", false);
                $(this).find("craqueladuras").text() == 'SI' ? $("#cbCraqueladuras").prop("checked", true) : $("#cbCraqueladuras").prop("checked", false);
                $(this).find("cintasadhesivas").text() == 'SI' ? $("#cbCintas").prop("checked", true) : $("#cbCintas").prop("checked", false);
                $(this).find("deformaciones").text() == 'SI' ? $("#cbDeformaciones").prop("checked", true) : $("#cbDeformaciones").prop("checked", false);
                $(this).find("desprendimientos").text() == 'SI' ? $("#cbDesprendimientos").prop("checked", true) : $("#cbDesprendimientos").prop("checked", false);
                $(this).find("desvanecimientos").text() == 'SI' ? $("#cbDesvanecimiento").prop("checked", true) : $("#cbDesvanecimiento").prop("checked", false);
                $(this).find("huellasdigitales").text() == 'SI' ? $("#cbHuellas").prop("checked", true) : $("#cbHuellas").prop("checked", false);
                $(this).find("hongos").text() == 'SI' ? $("#cbHongos").prop("checked", true) : $("#cbHongos").prop("checked", false);
                $(this).find("manchas").text() == 'SI' ? $("#cbManchas").prop("checked", true) : $("#cbManchas").prop("checked", false);
                $(this).find("raspaduras").text() == 'SI' ? $("#cbRaspaduras").prop("checked", true) : $("#cbRaspaduras").prop("checked", false);
                $(this).find("ralladuras").text() == 'SI' ? $("#cbRalladuras").prop("checked", true) : $("#cbRalladuras").prop("checked", false);
                $(this).find("retocado").text() == 'SI' ? $("#cbRetocado").prop("checked", true) : $("#cbRetocado").prop("checked", false);
                $(this).find("roturas").text() == 'SI' ? $("#cbRoturas").prop("checked", true) : $("#cbRoturas").prop("checked", false);
                $(this).find("sellosotinta").text() == 'SI' ? $("#cbSellos").prop("checked", true) : $("#cbSellos").prop("checked", false);
                $(this).find("sulfuracion").text() == 'SI' ? $("#cbSulfuracion").prop("checked", true) : $("#cbSulfuracion").prop("checked", false);
                $("#tbAlto").val($(this).find("alto").text());
                $("#tbAncho").val($(this).find("ancho").text());
                $("#tbDiametro").val($(this).find("diametro").text());
                $("#taInspecciones").val($(this).find("inspeccionesomarcas").text());
                $("#taCaracteristicas").val($(this).find("caracteristicas").text());
                $("#divInformacionCaptura").html("Capturado por: " + $(this).find("nombre").text() + " - " + $(this).find("fechacaptura").text());
                $("#divEnlacesWeb").css("visibility", "visible");
                $("#divImagenesBien").css("visibility", "visible");
                $("#divPendientes").css("visibility", "visible");
                */
            });
        }});
    } else if (tipoFicha == 'libro') {

    }
}