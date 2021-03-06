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
    <script src="js/paises.js"></script>

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
                    echo "<a href='paises.php'>Paises</a> - ";
                    echo obtenerNombrePais($_GET["idpais"]);
                ?>
            </div>
        </div>
        <?php
            obtenerHeaderPais($_GET["idpais"]);
        ?>
        <div class="row divPageShortInfo">
            <div class="col-1">

            </div>
            <div class="col-1 labelType01">
                Ciudades
            </div>
        </div>
        <div class="row">
            <?php
                obtenerCiudadesPais($_GET["idpais"]);
            ?>
        </div>
        <div class="row divPageShortInfo">
            <div class="col-1">

            </div>
            <div class="col-1 labelType01">
                Instituciones
            </div>
        </div>
        <div class="row">
            <?php
                obtenerInstitucionesPais($_GET["idpais"]);
            ?>
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
        $("#aPaises").addClass("currentPage");
    });
</script>
</html>