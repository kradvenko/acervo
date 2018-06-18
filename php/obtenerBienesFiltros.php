<?php
    try
    {
        require_once('connection.php');

        $idPais = $_POST["idPais"];
        $tipoFicha = $_POST["tipoFicha"];

        switch ($tipoFicha) {
            case "fotografia":
                                $url = $url . "/imagenesbienes/thumbs/fotografias/";
                                break;
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $tablaFicha = "fichas" . $tipoFicha;
        $tablaImagen = $tipoFicha . "imagenes";

        $sql = "Select *
                From $tablaFicha
                Left Join $tablaImagen
                On $tablaImagen.id$tipoFicha = $tablaFicha.idficha$tipoFicha
                Left Join instituciones
                On instituciones.idinstitucion = $tablaFicha.idinstitucion
                Where instituciones.idpais Like '$idPais'
                Limit 50";
        
        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            echo "<div class='col-3 divCard'>";
            echo "<div class='divCardHeader'>";
            switch ($tipoFicha) {
                case "fotografia":
                                    if (strlen($row["titulo"]) == 0) {
                                        echo "Sin título";
                                    } else {
                                        //echo substr($row["titulo"], 0, 25);
                                        echo $row["titulo"];
                                    }                                    
                                    break;
            }
            echo "</div>";
            echo "<div>";
            if (strlen($row["thumbnail"]) == 0) {
                echo "<img src='" . $url . "no-image.jpg" . "' />";
            } else {
                echo "<img src='" . $url . $row["thumbnail"] . "' />";
            }
            echo "</div>";
            echo "<div>";
            echo "<button class='btn fl ghost' onclick='verDetallesBien(" . $row["idficha$tipoFicha"] . ")'>Detalles</button>";
            echo "</div>";
            echo "</div>";
        }

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>