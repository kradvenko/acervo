<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/acervo.css" />
    <link rel="stylesheet" type="text/css" href="css/button.css" />
    <link href="https://fonts.googleapis.com/css?family=Marck+Script|Montserrat|Poiret+One" rel="stylesheet">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/ficha.js"></script>

    <title>Acervo artístico de Amado Nervo</title>
    <asp:ContentPlaceHolder ID="head" runat="server">
    </asp:ContentPlaceHolder>
</head>
<body>
    <div class="container mainContainer">
        <div class="row divBackgroundBlack">
            <div class="divLogo">

            </div>
        </div>
        <div class="">
            <div class="menuContainer">
                <?php
                    require_once('php/menu.php');
                    echo menu();
                    require_once('php/functions.php');
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12 divPageShortInfo">
                
            </div>
        </div>
        <div class="row navigation-bar">
            <div class="col-1">

            </div>
            <div class="col-10">
                <?php
                    $idpais = $_GET["idpais"];
                    $idinstitucion = $_GET["idinstitucion"];
                    $idciudad = $_GET["idciudad"];
                    $tipo = $_GET["tipo"];
                    $tipodisplay = $_GET["tipodisplay"];
                    $idficha = $_GET["idficha"];
                    if (isset($_GET["idalbum"]) && $_GET["idalbum"] != 'null') {
                        $idalbum = $_GET["idalbum"];
                    } else {
                        $idalbum = obtenerIdAlbumFicha($idficha, $tipo);
                    }
                    $nombrePais = obtenerNombrePais($idpais);
                    $nombreInstitucion = obtenerNombreInstitucion($idinstitucion);
                    $nombreCiudad = obtenerNombreCiudad($idciudad);
                    if ($idalbum > 0) {
                        $nombrealbum = obtenerNombreAlbum($idalbum);
                    }
                    echo "<a href='paises.php'>Paises</a> - ";
                    echo "<a href='paisbienes.php?idpais=$idpais'>$nombrePais</a> - ";
                    echo "<a href='ciudadbienes.php?idpais=$idpais&idciudad=$idciudad'>$nombreCiudad</a> - ";
                    echo "<a href='institucionbienes.php?idinstitucion=$idinstitucion&idpais=$idpais&idciudad=$idciudad'>$nombreInstitucion</a> - ";
                    if ($idalbum > 0) {
                        echo "<a href='verbienesinstitucion.php?tipo=$tipo&idinstitucion=$idinstitucion&idpais=$idpais&idciudad=$idciudad&tipodisplay=$tipodisplay'>$tipodisplay</a> - ";
                        echo "<a href='verbienesalbum.php?tipo=$tipo&idinstitucion=$idinstitucion&idpais=$idpais&idciudad=$idciudad&tipodisplay=$tipodisplay&idalbum=$idalbum'>$nombrealbum</a>";
                    } else {
                        echo "<a href='verbienesinstitucion.php?tipo=$tipo&idinstitucion=$idinstitucion&idpais=$idpais&idciudad=$idciudad&tipodisplay=$tipodisplay'>$tipodisplay</a>";                        
                    }
                ?>
            </div>
        </div>
        <div class="row divPageShortInfo3">
            <div class="col-12">
                Título de la fotografía
            </div>
        </div>
        <div class="row divVerBienElementoContenido" id="divFotografiaTitulo">

        </div>
        <div class="row divVerBienElementoContenidoImagen" id="divFotografiaImagen">

        </div>
        <div id="divFichaFotografia">
            <div class="row">
                <div class="col-4 divPageShortInfo3">
                    Institución
                </div>
                <div class="col-4 divPageShortInfo3">
                    Fecha
                </div>
                <div class="col-4 divPageShortInfo3">
                    País
                </div>
            </div>
            <div class="row">
                <div class="col-4 divVerBienElementoContenido" id="divFotografiaInstitucion">

                </div>
                <div class="col-4 divVerBienElementoContenido" id="divFotografiaFechaToma">

                </div>
                <div class="col-4 divVerBienElementoContenido" id="divFotografiaPais">

                </div>
            </div>
            <div class="row">
                <div class="col-4 divPageShortInfo3">
                    Albúm
                </div>
                <div class="col-4 divPageShortInfo3">
                    Número de fotografía
                </div>
                <div class="col-4 divPageShortInfo3">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-4 divVerBienElementoContenido" id="divFotografiaAlbum">

                </div>
                <div class="col-4 divVerBienElementoContenido" id="divFotografiaNumeroFotografia">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 divPageShortInfo3">
                Contexto histórico
            </div>            
        </div>
        <div class="row">
            <div class="col-12 divVerBienElementoContenido" id="divContextoHistorico">
                
            </div>            
        </div>
        <div class="row">
            <div class="col-12 divPageShortInfo3">
                Imágenes
            </div>            
        </div>
        <div class="row">
            <?php
                obtenerImagenesFicha($idficha, $tipo);
            ?>
        </div>
        <div class="row divBackgroundBlack">
            <div class="col-12 mainFooter">
                <b>Acervo Digital Amado Nervo</b> © Derechos Reservados Fundación Yo te bendigo vida 2018.
            </div>
        </div>
    </div>
    <!--VENTANAS MODALES-->
    <!--Ventana modal para ver los detalles de un bien fotografía-->
    <div class="modal fade" id="modalMostrarFotografia" tabindex="-1" role="dialog" aria-labelledby="modalMostrarFotografia" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Fotografía</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">  
                    <div class="row divVerBienElementoContenidoImagen" id="divImagen">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn fl ghost" data-dismiss="modal" onclick="">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#aPaises").addClass("currentPage");
        verDetallesBien();
    });
</script>
</html>