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
                La obra artística de Amado Nervo forma parte del tesoro cultural de los muchos países en los que el autor vivió o que visitó, ya fuera
                llevado por su naturaleza viajera o por las responsabilidades de sus cargos oficiales.
            </div>
        </div>
        <div class="row">
            <?php
                obtenerPaisesMain();
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