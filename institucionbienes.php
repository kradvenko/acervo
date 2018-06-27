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
    <script src="js/instituciones.js"></script>

    <title>Acervo artístico de Amado Nervo</title>
    <asp:ContentPlaceHolder ID="head" runat="server">
    </asp:ContentPlaceHolder>
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
                    $idpais = $_GET["idpais"];
                    $idinstitucion = $_GET["idinstitucion"];
                    $idciudad = $_GET["idciudad"];
                    $nombrePais = obtenerNombrePais($idpais);
                    $nombreInstitucion = obtenerNombreInstitucion($idinstitucion);
                    $nombreCiudad = obtenerNombreCiudad($idciudad);
                    echo "<a href='paises.php'>Paises</a> - ";
                    echo "<a href='paisbienes.php?idpais=$idpais'>$nombrePais</a> - ";
                    echo "<a href='ciudadbienes.php?idpais=$idpais&idciudad=$idciudad'>$nombreCiudad</a> - ";
                    echo $nombreInstitucion;
                ?>
            </div>
        </div>
        <div class="row divPageShortInfo">
            <div class="col-1">

            </div>
            <div class="col-10 labelType01">
                <?php
                    echo $nombreInstitucion;
                ?>
            </div>
        </div>
        <div class="row divPageShortInfo2">
            <div class="col-1">

            </div>
            <div class="col-10 labelType01">
                Información de la institución
            </div>
        </div>
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-10" id="divImagenInstitucion" style="text-align: center;">
                
            </div>
        </div>
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-10 labelType01" id="divNombreInstitucion">
                
            </div>
        </div>
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-2 labelType01">
                <b>País</b>
            </div>
            <div class="col-2 labelType01">
                <b>Ciudad</b>
            </div>
            <div class="col-7 labelType01">
                <b>Domicilio</b>
            </div>
        </div>
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-2 labelType01" id="divPais">
                
            </div>
            <div class="col-2 labelType01" id="divCiudad">
                
            </div>
            <div class="col-7 labelType01" id="divDireccion">
                
            </div>
        </div>
        <div class="row divPageShortInfo2">
            <div class="col-1">

            </div>
            <div class="col-10 labelType01">
                Bienes
            </div>
        </div>
        <div class="row">
            <div class="col-4 divAcervoBien" onclick="irInstitucionBienes('fotografia', window.location.href, 'Fotografias');">
                <div class="divAcervoBienHeader">
                    <label>Fotografías</label>
                </div>
                <div class="divAcervoBienHedearImg">
                    <img src="imgs/fotografiasub.jpg">
                </div>
                <div class="divAcervoBienFooter">
                    Número de bienes registrados <br />
                    <?php 
                        echo obtenerTotalBienesInstitucion("fotografia", $idinstitucion);
                    ?>
                </div>
            </div>
            <div class="col-4 divAcervoBien" onclick="irInstitucionBienes('libro', window.location.href, 'Libros');">
                <div class="divAcervoBienHeader">
                    <label>Libros</label>
                </div>
                <div class="divAcervoBienHedearImg">
                    <img src="imgs/librosub.jpg">
                </div>
                <div class="divAcervoBienFooter">
                    Número de bienes registrados <br />
                    <?php 
                        $idinstitucion = $_GET["idinstitucion"];
                        echo obtenerTotalBienesInstitucion("libro", $idinstitucion);
                    ?>
                </div>
            </div>
            <div class="col-4 divAcervoBien">
                <div class="divAcervoBienHeader">
                    <label>Hemerografía</label>
                </div>
                <div class="divAcervoBienHedearImg">
                    <img src="imgs/hemerografiasub.jpg">
                </div>
                <div class="divAcervoBienFooter">
                    Número de bienes registrados
                </div>
            </div>
        </div>
        <div class="row divSeparator">

        </div>
        <div class="row">
            <div class="col-4 divAcervoBien">
                <div class="divAcervoBienHeader">
                    <label>Poesías</label>
                </div>
                <div class="divAcervoBienHedearImg">
                    <img src="imgs/poesiasub.jpg">
                </div>
                <div class="divAcervoBienFooter">
                    Número de bienes registrados
                </div>
            </div>
            <div class="col-4 divAcervoBien">
                <div class="divAcervoBienHeader">
                    <label>Correspondencia</label>
                </div>
                <div class="divAcervoBienHedearImg">
                    <img src="imgs/correspondenciasub.jpg">
                </div>
                <div class="divAcervoBienFooter">
                    Número de bienes registrados
                </div>
            </div>
            <div class="col-4 divAcervoBien">
                <div class="divAcervoBienHeader">
                    <label>Documentos</label>
                </div>
                <div class="divAcervoBienHedearImg">
                    <img src="imgs/documentosub.jpg">
                </div>
                <div class="divAcervoBienFooter">
                    Número de bienes registrados
                </div>
            </div>
        </div>
        <div class="row divSeparator">

        </div>
        <div class="row">
            <div class="col-4 divAcervoBien">
                <div class="divAcervoBienHeader">
                    <label>Revistas</label>
                </div>
                <div class="divAcervoBienHedearImg">
                    <img src="imgs/revistasub.jpg">
                </div>
                <div class="divAcervoBienFooter">
                    Número de bienes registrados
                </div>
            </div>
            <div class="col-4 divAcervoBien">
                <div class="divAcervoBienHeader">
                    <label>Objetos</label>
                </div>
                <div class="divAcervoBienHedearImg">
                    <img src="imgs/objetosub.jpg">
                </div>
                <div class="divAcervoBienFooter">
                    Número de bienes registrados
                </div>
            </div>
            <div class="col-4 divAcervoBien">
                <div class="divAcervoBienHeader">
                    <label>Pinturas y dibujos</label>
                </div>
                <div class="divAcervoBienHedearImg">
                    <img src="imgs/pinturasub.jpg">
                </div>
                <div class="divAcervoBienFooter">
                    Número de bienes registrados
                </div>
            </div>
        </div>
        <div class="row divSeparator">

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
        obtenerInstitucion();
    });
</script>
</html>