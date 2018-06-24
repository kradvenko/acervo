<?php
    try
    {
        require_once('connection.php');

        $idInstitucion = $_POST["idInstitucion"];
        $tipoFicha = $_POST["tipoFicha"];
        $idAlbum = $_POST["idAlbum"];
        $currentPage = $_POST["currentPage"];
        $cp = ($currentPage - 1) * 40;

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
        //Cálculo del total de registros
        $sql = "Select Count(*) As C
                From $tablaFicha
                Left Join $tablaImagen
                On $tablaImagen.id$tipoFicha = $tablaFicha.idficha$tipoFicha
                Left Join instituciones
                On instituciones.idinstitucion = $tablaFicha.idinstitucion
                Where instituciones.idinstitucion Like '$idInstitucion' And $tablaImagen.aprobada = 'SI' And $tablaFicha.idalbum = $idAlbum";
        
        $result = $con->query($sql);

        $row = $result->fetch_array();

        $totalRegistros = $row["C"];

        if ($totalRegistros > 0) {
            echo "<div class='col-12 gridNavigation'>";
            for ($i = 1; $i <= ceil($totalRegistros/40); $i++) {                
                if ($i == $currentPage) {
                    echo "<span class='gridCurrentPage' onclick='irPaginaAlbum($i)'>";
                } else 
                {
                    echo "<span onclick='irPaginaAlbum($i)'>";
                }
                echo $i;
                echo "</span>";
            }
            echo "</div>";
        } else {
            echo "No existen bienes registrados.";
            return;
        }

        $sql = "Select *
                From $tablaFicha
                Left Join $tablaImagen
                On $tablaImagen.id$tipoFicha = $tablaFicha.idficha$tipoFicha
                Left Join instituciones
                On instituciones.idinstitucion = $tablaFicha.idinstitucion
                Where instituciones.idinstitucion Like '$idInstitucion' And $tablaImagen.aprobada = 'SI' And $tablaFicha.idalbum = $idAlbum
                Order By $tablaFicha.idficha$tipoFicha
                Limit $cp, 40";
        
        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            echo "<div class='col-3 divCard'>";
            echo "<div class='divCardBody'>";
            if (strlen($row["thumbnail"]) == 0) {
                echo "<img src='" . $urlThumb . "no-image.jpg" . "' />";
            } else {
                echo "<img src='" . $urlThumb . $row["thumbnail"] . "' />";
            }
            echo "</div>";
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
            echo "<button class='btn fl ghost' data-toggle='modal' data-target='#modalMostrarFotografia' onclick='verDetallesBien(" . $row["idficha$tipoFicha"] . ", \"" . $urlImagen . $row["rutaimagen"] . "\")'>Detalles</button>";
            echo "</div>";
            echo "</div>";
        }

        if ($totalRegistros > 0) {
            echo "<div class='col-12 gridNavigation'>";
            for ($i = 1; $i <= ceil($totalRegistros/40); $i++) {                
                if ($i == $currentPage) {
                    echo "<span class='gridCurrentPage' onclick='irPaginaAlbum($i)'>";
                } else 
                {
                    echo "<span onclick='irPaginaAlbum($i)'>";
                }
                echo $i;
                echo "</span>";
            }
            echo "</div>";
        } else {
            echo "No existen bienes registrados.";
            return;
        }

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>