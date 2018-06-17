<?php
    try
    {
        require_once('connection.php');

        $idPais = $_POST["idPais"];
        $tipoFicha = $_POST["tipoFicha"];

        $con = new mysqli($hn, $un, $pw, $db);

        $tablaFicha = "fichas" . $tipoFicha;
        $tablaImagen = $tipoFicha . "imagenes";

        $sql = "Select *
                From $tablaFicha
                Left Join $tablaImagen
                On $tablaImagen.id$tipoFicha = $tablaFicha.idficha$tipoFicha
                Left Join instituciones
                On instituciones.idinstitucion = $tablaFicha.idinstitucion
                Where instituciones.idpais Like '$idPais'";
        
        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            echo $row["thumbnail"];           
        }

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>