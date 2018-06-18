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
    <script src="js/acervo.js"></script>

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
        <div class="row divFiltro">
            <div class="col-12 ">
                <label>Opciones de filtro y búsqueda</label>
            </div>
        </div>
        <div class="row divFiltro">
            <div class="col-1">
                <label>País</label>
            </div>
            <div class="col-3">
                <?php
                    obtenerSelectPaises();
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                
            </div>
            <div class="col-2">
                <button class="btn lg ghost" onclick="obtenerBienes()">Buscar</button>
            </div>
        </div>
        <div class="row" id="divBienes">
            
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
                    <div class="row divVerBienElementoLabel">
                        Título de la fotografía
                    </div>
                    <div class="row divVerBienElementoContenido" id="divTituloFotografia">

                    </div>
                    <div class="row divVerBienElementoContenidoImagen" id="divImagenBien">

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
        $("#aAcervo").addClass("currentPage");
    });
</script>
</html>