<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/acervo.css" />
    <link rel="stylesheet" type="text/css" href="css/button.css" />
    <link href="https://fonts.googleapis.com/css?family=Marck+Script:400,900|Montserrat|Poiret+One" rel="stylesheet">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/busqueda.js"></script>

    <title>Acervo artístico de Amado Nervo</title>    
</head>
<body>
    <div class="container mainContainer">
        <div class="row divBackgroundBlack">
            <div class="col-12 divLogo">
                <img src="imgs/logo.png" />
            </div>
        </div>
        <div class="row divSlogan">
            <div class="col-12" id="divAcervoDigital">
                <b>ACERVO DIGITAL</b>
            </div>
        </div>
        <div class="">
            <div class="menuContainer">
                <?php
                    require_once('php/menu.php');
                    echo menu();
                ?>
            </div>
        </div>
        <div class="row divSearchBar">
            <div class="col-3">
                <select id="selOpciones" class="form-control">
                    <option value="ELIJA">Elija una opción de búsqueda</option>
                    <option value="TITULO">Título</option>
                </select>
            </div>
            <div class="col-7">
                <input type="text" id="tbBuscar" class="form-control" />
            </div>
            <div class="col-2">
                <input type="button" style="margin: 0px !important;" class="btn lg ghost" value="Buscar" onclick="buscar()" />
            </div>
        </div>
        <div class="row divSearchResults" id="divResultados">
            
        </div>
        <div class="row divBackgroundBlack">
            <div class="col-12 mainFooter">
                <b>Acervo Digital Amado Nervo</b> © Derechos Reservados Fundación Yo te bendigo vida 2018.
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#aBuscar").addClass("currentPage");
        //$('select').niceSelect();
        limpiarCamposBusqueda();        
    });
</script>
</html>