<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/acervo.css" />
    <link href="https://fonts.googleapis.com/css?family=Marck+Script|Montserrat|Poiret+One" rel="stylesheet">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>

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
            <div class="col-4 divAcervoBien" onclick="window.location.assign('verbienes.php?tipo=fotografia')">
                <div class="divAcervoBienHeader">
                    <label>Fotografías</label>
                </div>
                <div class="divAcervoBienHedearImg">
                    <img src="imgs/fotografiasub.jpg">
                </div>
                <div class="divAcervoBienFooter">
                    Número de bienes registrados <br />
                    <?php 
                        echo obtenerTotalBienes("fotografia");
                    ?>
                </div>
            </div>
            <div class="col-4 divAcervoBien">
                <div class="divAcervoBienHeader">
                    <label>Libros</label>
                </div>
                <div class="divAcervoBienHedearImg">
                    <img src="imgs/librosub.jpg">
                </div>
                <div class="divAcervoBienFooter">
                    Número de bienes registrados
                    <?php 
                        echo obtenerTotalBienes("libro");
                    ?>
                </div>
            </div>
            <div class="col-4 divAcervoBien">
                <div class="divAcervoBienHeader">
                    <label>Publicaciones periódicas</label>
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
                    <label>Monumentos</label>
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
                    <label>Dibujos</label>
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
                    <label>Pinturas</label>
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
                    <label>Grabados</label>
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
                    <label>Carteles</label>
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
                    <label>Partituras</label>
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
        <div class="row">
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
                    <label>Documentación</label>
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
                    <label>Audiovisuales</label>
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
        <div class="row">
            <div class="col-4 divAcervoBien">
                <div class="divAcervoBienHeader">
                    <label>Grabaciones sonoras</label>
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
                    <label>Objetos personales</label>
                </div>
                <div class="divAcervoBienHedearImg">
                    <img src="imgs/objetosub.jpg">
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
        $("#aAcervo").addClass("currentPage");
    });
</script>
</html>