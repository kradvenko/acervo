<?php
    try
    {
        require_once('connection.php');

        $idPais = $_POST["idPais"];
        $tipoFicha = $_POST["tipoFicha"];

        $urlImagen = "";
        $urlThumb = "";

        switch ($tipoFicha) {
            case "fotografia":
                                $urlImagen = $url . "/";
                                $urlThumb = $url . "/imagenesbienes/thumbs/fotografias/";
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
                Where instituciones.idpais Like '$idPais' And $tablaImagen.aprobada = 'SI'
                Order By $tablaFicha.idficha$tipoFicha
                Limit 50";
        
        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            echo "<div class='col-3'>";
            switch ($tipoFicha) {
                case "fotografia":
                                    echo "<div class='divCard2' data-toggle='modal' data-target='#modalMostrarFotografia' onclick='verDetallesBien(" . $row["idficha$tipoFicha"] . ", \"" . $urlImagen . $row["rutaimagen"] . "\")'>";
                                    break;
                case "libro":
                                    echo "<div class='divCard2'data-toggle='modal' data-target='#modalMostrarLibro' onclick='verDetallesBien(" . $row["idficha$tipoFicha"] . ", \"" . $urlImagen . $row["rutaimagen"] . "\")'>";                                  
                                    break;
            }
            echo "<div class='divCardBody2'>";
            if (strlen($row["thumbnail"]) == 0) {
                echo "<img src='" . $urlThumb . "no-image.jpg" . "' />";
            } else {
                echo "<img src='" . $urlThumb . $row["thumbnail"] . "' />";
            }
            echo "</div>";
            echo "<div class='divCardBody2Img'>";
            echo "</div>";
            echo "<div class='divCardBody2 labelType03'>";
            switch ($tipoFicha) {
                case "fotografia":
                                    if (strlen($row["titulo"]) == 0) {
                                        echo "Sin título";
                                    } else {
                                        echo $row["titulo"];
                                    }                                    
                                    break;
                case "libro":
                                    if (strlen($row["titulo"]) == 0) {
                                        echo "Sin título";
                                    } else {
                                        echo $row["titulo"];
                                    }                                    
                                    break;
            }
            echo "</div>";
            echo "<div class='divCardFooter2'>";
            echo "</div>";
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