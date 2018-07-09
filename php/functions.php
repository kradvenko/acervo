<?php


    function obtenerTotalBienes($tipoFicha) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);

            $sql = "Select Count(*) As C
                    From fichas" . $tipoFicha . "
                    Where estado = 'ACTIVO'";

            $result = $con->query($sql);

            $row = $result->fetch_array();

            echo $row["C"];

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            echo $t;
        }
    }

    function obtenerSelectPaises() {
        try
        {
            require('connection.php');
    
            $con = new mysqli($hn, $un, $pw, $db);
    
            $sql = "Select * From paises Order By pais";
    
            $result = $con->query($sql);
    
            echo "<select class='' id='selPais'>";
            echo "<option value='%' selected>Todos los países</option>"; 
    
            while ($row = $result->fetch_array()) {
                echo "<option value='" . $row["idpais"] . "'>" . $row["pais"] . "</option>";            
            }
            
            echo "</select>";
            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            echo $t;
        }
    }

    function obtenerPaisesMain() {
        try
        {
            require('connection.php');
    
            $con = new mysqli($hn, $un, $pw, $db);
    
            $sql = "Select * From paises Order By pais";
    
            $result = $con->query($sql);
    
            while ($row = $result->fetch_array()) {
                echo "<div class='col-4 divPaisMainContainer'>";
                echo "<div class='divPaisMainHeader'>";
                echo $row["pais"];
                echo "</div>";
                echo "<div class='divPaisMainImage'>";
                echo "<img src='imgs/" . $row["image"] . "' />";
                echo "</div>";
                echo "<div class='divPaisMainInfo'>";
                echo "Bienes registrados:<br />";
                echo (obtenerTotalFotografiasPais($row["idpais"]) + obtenerTotalPublicacionesPais($row["idpais"]) +
                        obtenerTotalLibrosPais($row["idpais"])
                    );
                echo "</div>";
                echo "<div>";
                echo "<button class='btn fl ghost' onclick='verBienesPais(" . $row["idpais"] . ")'>Visitar</button>";
                echo "</div>";
                echo "</div>";
            }
            
            echo "</select>";
            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            echo $t;
        }
    }
    //Totales País
    function obtenerTotalFotografiasPais($idpais) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select Count(*) As Total
                    From fichasfotografia
                    Left Join instituciones
                    On instituciones.idinstitucion = fichasfotografia.idinstitucion
                    Where instituciones.idpais = $idpais";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                return $row["Total"];
            }

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }

    function obtenerTotalPublicacionesPais($idpais) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select Count(*) As Total
                    From fichaspublicacion
                    Left Join instituciones
                    On instituciones.idinstitucion = fichaspublicacion.idinstitucion
                    Where instituciones.idpais = $idpais";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                return $row["Total"];
            }

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }

    function obtenerTotalLibrosPais($idpais) {
        try
        {
            require('connection.php');
            
            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select Count(*) As Total
                    From fichaslibro
                    Left Join instituciones
                    On instituciones.idinstitucion = fichaslibro.idinstitucion
                    Where instituciones.idpais = $idpais";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                return $row["Total"];
            }

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }
    //Totales Institucion
    function obtenerTotalFotografiasInstitucion($idinstitucion) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select Count(*) As Total
                    From fichasfotografia
                    Where fichasfotografia.idinstitucion = $idinstitucion";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                return $row["Total"];
            }

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }

    function obtenerTotalPublicacionesInstitucion($idinstitucion) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select Count(*) As Total
                    From fichaspublicacion
                    Where fichaspublicacion.idinstitucion = $idinstitucion";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                return $row["Total"];
            }

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }

    function obtenerTotalLibrosInstitucion($idinstitucion) {
        try
        {
            require('connection.php');
            
            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select Count(*) As Total
                    From fichaslibro
                    Where fichaslibro.idinstitucion = $idinstitucion";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                return $row["Total"];
            }

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }
    //Totales Ciudad
    function obtenerTotalFotografiasCiudad($idciudad) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select Count(*) As Total
                    From fichasfotografia
                    Left Join instituciones
                    On instituciones.idinstitucion = fichasfotografia.idinstitucion
                    Where instituciones.idciudad = $idciudad";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                return $row["Total"];
            }

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }

    function obtenerTotalPublicacionesCiudad($idciudad) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select Count(*) As Total
                    From fichaspublicacion
                    Left Join instituciones
                    On instituciones.idinstitucion = fichaspublicacion.idinstitucion
                    Where instituciones.idciudad = $idciudad";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                return $row["Total"];
            }

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }

    function obtenerTotalLibrosCiudad($idciudad) {
        try
        {
            require('connection.php');
            
            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select Count(*) As Total
                    From fichaslibro
                    Left Join instituciones
                    On instituciones.idinstitucion = fichaslibro.idinstitucion
                    Where instituciones.idciudad = $idciudad";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                return $row["Total"];
            }

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }

    function obtenerNombrePais($idpais) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select *
                    From paises
                    Where idpais = $idpais";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                return $row["pais"];
            }

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }

    function obtenerHeaderPais($idpais) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select *
                    From paises
                    Where idpais = $idpais";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                echo '<div class="row divPaisBienHeader">';
                echo '<div class="col-1">';
                echo '</div>';
                echo '<div class="col-1">';
                echo $row["pais"];    
                echo '</div>';
                echo '<div class="col-8">';
                echo '</div>';
                echo '<div class="col-2 bk-' . $row["prefix"] .'">';
                echo '</div>';
                echo '</div>';                
            }

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            echo $t;
        }
    }

    function obtenerNombreInstitucion($idinstitucion) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select *
                    From instituciones
                    Where idinstitucion = $idinstitucion";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                return $row["nombreInstitucion"];
            }

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }

    function obtenerNombreCiudad($idciudad) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select *
                    From ciudades
                    Where idciudad = $idciudad";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                return $row["ciudad"];
            }

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }

    function obtenerInstitucionesPais($idpais) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select *
                    From instituciones
                    Where idpais = $idpais";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                echo "<div class='col-3'>";
                echo "<div class='divCard2' onclick='verBienesInstitucion(" . $row["idinstitucion"] . ", " . $row["idpais"] . ", " . $row["idciudad"] . ")'>";
                echo "<div class='divCardBody2'>";
                if (strlen($row["imagen"]) == 0) {
                    
                } else {
                    echo "<img src='imgs/instituciones/" . $row["imagen"] . "' />";
                }
                echo "<div class='divCardBody2Img'>";
                echo "</div>";
                echo "<label class='labelType02'>" . $row["nombreInstitucion"] . "</label><br />";
                /*echo "<label class='labelType03'>Bienes</label>";
                echo "<label class='labelType03'>";
                echo (obtenerTotalFotografiasInstitucion($row["idinstitucion"]) + obtenerTotalPublicacionesInstitucion($row["idinstitucion"]) +
                        obtenerTotalLibrosInstitucion($row["idinstitucion"])
                    );
                echo "</label>";*/
                echo "</div>";
                echo "<div class='divCardFooter2'>";
                //echo "<button class='btn fl ghost' onclick='verBienesInstitucion(" . $row["idinstitucion"] . ", " . $row["idpais"] . ", " . $row["idciudad"] . ")'>Ir</button>";
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
    }

    function obtenerInstitucionesCompletas() {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select *
                    From instituciones
                    Inner Join paises
                    On paises.idpais = instituciones.idpais
                    Order By paises.pais";

            $sql = "Select *
                    From instituciones
                    Order By nombreInstitucion";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                echo "<div class='col-3'>";
                echo "<div class='divCard2' onclick='verBienesInstitucion(" . $row["idinstitucion"] . ", " . $row["idpais"] . ", " . $row["idciudad"] . ")'>";
                echo "<div class='divCardBody2'>";
                if (strlen($row["imagen"]) == 0) {
                    
                } else {
                    echo "<img src='imgs/instituciones/" . $row["imagen"] . "' />";
                }
                echo "<div class='divCardBody2Img'>";
                echo "</div>";
                echo "<label class='labelType02'>" . $row["nombreInstitucion"] . "</label><br />";
                /*echo "<label class='labelType03'>Bienes</label>";
                echo "<label class='labelType03'>";
                echo (obtenerTotalFotografiasInstitucion($row["idinstitucion"]) + obtenerTotalPublicacionesInstitucion($row["idinstitucion"]) +
                        obtenerTotalLibrosInstitucion($row["idinstitucion"])
                    );
                echo "</label>";*/
                echo "</div>";
                echo "<div class='divCardFooter2'>";
                //echo "<button class='btn fl ghost' onclick='verBienesInstitucion(" . $row["idinstitucion"] . ", " . $row["idpais"] . ", " . $row["idciudad"] . ")'>Ir</button>";
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
    }

    function obtenerInstitucionesCiudad($idciudad) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select *
                    From instituciones
                    Where idciudad = $idciudad";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                echo "<div class='col-3'>";
                echo "<div class='divCard2' onclick='verBienesInstitucion(" . $row["idinstitucion"] . ", " . $row["idpais"] . ", " . $row["idciudad"] . ")'>";
                echo "<div class='divCardBody2'>";
                if (strlen($row["imagen"]) == 0) {
                    
                } else {
                    echo "<img src='imgs/instituciones/" . $row["imagen"] . "' />";
                }
                echo "<div class='divCardBody2Img'>";
                echo "</div>";
                echo "<label class='labelType02'>" . $row["nombreInstitucion"] . "</label><br />";
                /*echo "<label class='labelType03'>Bienes</label>";
                echo "<label class='labelType03'>";
                echo (obtenerTotalFotografiasInstitucion($row["idinstitucion"]) + obtenerTotalPublicacionesInstitucion($row["idinstitucion"]) +
                        obtenerTotalLibrosInstitucion($row["idinstitucion"])
                    );
                echo "</label>";*/
                echo "</div>";
                echo "<div class='divCardFooter2'>";
                //echo "<button class='btn fl ghost' onclick='verBienesInstitucion(" . $row["idinstitucion"] . ", " . $row["idpais"] . ", " . $row["idciudad"] . ")'>Ir</button>";
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
    }

    function obtenerCiudadesPais($idpais) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);
            
            $sql = "Select *
                    From ciudades
                    Inner Join paises
                    On paises.idpais = ciudades.idpais
                    Where paises.idpais = $idpais";
    
            $result = $con->query($sql);
            
            while ($row = $result->fetch_array()) {
                echo "<div class='col-3'>";
                echo "<div class='divCard' onclick='verBienesCiudad(" . $row["idciudad"] . ", " . $row["idpais"] . ")'>";
                echo "<div class='divCardBody'>";
                if (strlen($row["imagen"]) == 0) {
                    
                } else {
                    echo "<img src='imgs/ciudades/" . $row["imagen"] . "' />";
                }
                echo "<div class='divCardBody2Img'>";
                echo "</div>";
                echo "<label class='labelType02'>" . $row["ciudad"] . "</label><br />";
                /*echo "<label class='labelType03'>Bienes</label>";
                echo "<label class='labelType03'>";
                echo (obtenerTotalFotografiasInstitucion($row["idinstitucion"]) + obtenerTotalPublicacionesInstitucion($row["idinstitucion"]) +
                        obtenerTotalLibrosInstitucion($row["idinstitucion"])
                    );
                echo "</label>";*/
                echo "</div>";
                echo "<div class='divCardFooter'>";
                //echo "<button class='btn fl ghost' onclick='verBienesCiudad(" . $row["idciudad"] . ", " . $row["idpais"] . ")'>Ir</button>";
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
    }

    function obtenerTotalBienesInstitucion($tipoFicha, $idinstitucion) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);

            $sql = "Select Count(*) As C
                    From fichas" . $tipoFicha . "
                    Where estado = 'ACTIVO' And idinstitucion = $idinstitucion";

            $result = $con->query($sql);

            $row = $result->fetch_array();

            echo $row["C"];

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            echo $t;
        }
    }

    function obtenerAlbumesInstitucion($idinstitucion, $tipoficha) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);

            $sql = "Select *
                    From albumes
                    Where idinstitucion = $idinstitucion And tipoficha Like '$tipoficha'";

            $result = $con->query($sql);

            while ($row = $result->fetch_array()) {
                echo "<div class='col-3'>";
                echo "<div class='divCard' onclick='verBienesAlbum(" . $row["idalbum"] . ", \"" . $tipoficha . "\")'>";
                echo "<div class='divCardBody'>";
                /*
                if (strlen($row["imagen"]) == 0) {
                    
                } else {
                    echo "<img src='imgs/instituciones/" . $row["imagen"] . "' />";
                }
                */
                echo "<label class='labelType02'>" . $row["album"] . "</label><br />";
                /*echo "<label class='labelType03'>Bienes</label>";
                echo "<label class='labelType03'>";
                echo obtenerTotalBienesAlbum($row["idalbum"], $tipoficha);
                echo "</div>";
                echo "<div class='divCardFooter'>";
                //echo "<button class='btn fl ghost' onclick='verBienesCiudad(" . $row["idciudad"] . ", " . $row["idpais"] . ")'>Ir</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

                echo "<div class='col-3 divCard'>";
                echo "<div class='divCardBody'>";
                /*
                if (strlen($row["thumbnail"]) == 0) {
                    echo "<img src='" . $urlThumb . "no-image.jpg" . "' />";
                } else {
                    echo "<img src='" . $urlThumb . $row["thumbnail"] . "' />";
                }
                */               
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
    }

    function obtenerNombreAlbum($idalbum) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);

            $sql = "Select *
                    From albumes
                    Where idalbum = $idalbum";

            $result = $con->query($sql);

            while ($row = $result->fetch_array()) {
                return $row["album"];
            }            

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }

    function obtenerInfoAlbum($idalbum) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);

            $sql = "Select *
                    From albumes
                    Where idalbum = $idalbum";

            $result = $con->query($sql);

            while ($row = $result->fetch_array()) {
                echo "<div class='col-1'>";
                echo "";
                echo "</div>";
                echo "<div class='col-2'>";
                echo "<b>Nombre del albúm</b>: ";
                echo "</div>";
                echo "<div class='col-9'>";
                echo $row["album"];
                echo "</div>";
                echo "<div class='col-1'>";
                echo "";
                echo "</div>";
                echo "<div class='col-2'>";
                echo "<b>Descripción</b>: ";
                echo "</div>";
                echo "<div class='col-9'>";
                echo $row["descripcion"];
                echo "</div>";
            }            

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            echo $t;
        }
    }

    function obtenerTotalBienesAlbum($idalbum, $tipo) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);

            $sql = "Select Count(*) As C
                    From albumes
                    Inner Join fichas$tipo
                    On fichas$tipo.idalbum = albumes.idalbum
                    Where albumes.idalbum = $idalbum";

            $result = $con->query($sql);

            $row = $result->fetch_array();

            return $row["C"];

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }

    function obtenerIdAlbumFicha($idficha, $tipo) {
        try
        {
            require('connection.php');

            $con = new mysqli($hn, $un, $pw, $db);

            $sql = "Select idalbum
                    From fichas$tipo
                    Where idficha$tipo = $idficha";

            $result = $con->query($sql);
            
            $row = $result->fetch_array();

            return $row["idalbum"];

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }

    function obtenerImagenesFicha($idficha, $tipo) {
        try
        {
            require('connection.php');

            $urlImagen = "";
            $urlThumb = "";

            switch ($tipo) {
                case "fotografia":
                                    $urlImagen = $url . "/";
                                    $urlThumb = $url . "/imagenesbienes/thumbs/fotografias/";
                                    break;
                case "libro":
                                    $urlImagen = $url . "/";
                                    $urlThumb = $url . "/imagenesbienes/thumbs/libros/";
                                    break;
            }

            $con = new mysqli($hn, $un, $pw, $db);

            $sql = "Select *
                    From fichas$tipo
                    Left Join " . $tipo . "imagenes
                    On fichas$tipo.idficha$tipo = " . $tipo . "imagenes.id$tipo
                    Where idficha$tipo = $idficha And " . $tipo ."imagenes.aprobada = 'SI'";

            $result = $con->query($sql);

            while ($row = $result->fetch_array()) {
                echo "<div class='col-3'>";
                echo "<div class='divCard' data-toggle='modal' data-target='#modalMostrarImagen' onclick='verFotoBien(" . $row["idficha$tipo"] . ", \"" . $urlImagen . $row["rutaimagen"] . "\")'>";
                echo "<div class='divCardBody'>";
                if (strlen($row["thumbnail"]) == 0) {
                    echo "<img src='" . $urlThumb . "no-image.jpg" . "' />";
                } else {
                    echo "<img src='" . $urlThumb . $row["thumbnail"] . "' />";
                }
                echo "<div class='divCardBody2Img'>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } 

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }

    function obtenerEsquemaFicha($tipo) {
        if ($tipo == 'fotografia') {
            echo '
                    <div class="row divVerBienElementoContenido">
                        <div class="col-1">
                        </div>
                        <div class="col-10 divFichaTitulo" id="divFotografiaTitulo">
                        </div>
                        <div class="col-1">
                        </div>
                    </div>
                    <div class="row divVerBienElementoContenido">
                        <div class="col-1">
                            
                        </div>
                        <div class="col-3">
                            <b>Institución</b>
                        </div>
                        <div class="col-7" id="divFotografiaInstitucion">
                            
                        </div>
                        <div class="col-1">
                            
                        </div>
                    </div>
                    <div class="row divVerBienElementoContenido">
                        <div class="col-1">
                            
                        </div>
                        <div class="col-3">
                            <b>Fecha</b>
                        </div>
                        <div class="col-7" id="divFotografiaFechaToma">
                            
                        </div>
                        <div class="col-1">
                            
                        </div>
                    </div>
                    <div class="row divVerBienElementoContenido">
                        <div class="col-1">
                            
                        </div>
                        <div class="col-3">
                            <b>País</b>
                        </div>
                        <div class="col-7" id="divFotografiaPais">
                            
                        </div>
                        <div class="col-1">
                            
                        </div>
                    </div>
                    <div class="row divVerBienElementoContenido">
                        <div class="col-1">
                            
                        </div>
                        <div class="col-3">
                            <b>Albúm</b>
                        </div>
                        <div class="col-7" id="divFotografiaAlbum">
                            
                        </div>
                        <div class="col-1">
                            
                        </div>
                    </div>
                    <div class="row divVerBienElementoContenido">
                        <div class="col-1">
                            
                        </div>
                        <div class="col-3">
                            <b>Número de fotografía</b>
                        </div>
                        <div class="col-7" id="divFotografiaNumeroFotografia">
                            
                        </div>
                        <div class="col-1">
                            
                        </div>
                    </div>
                    <div class="row divVerBienElementoContenido">
                        <div class="col-1">
                            
                        </div>
                        <div class="col-3">
                        <b>Contexto histórico</b>
                        </div>
                        <div class="col-7" id="divFotografiaContextoHistorico">
                            
                        </div>
                        <div class="col-1">
                            
                        </div>
                    </div>
            ';
        } else if ($tipo == "libro") {
            echo '
                        <div class="row divVerBienElementoContenido">
                        <div class="col-1">
                        </div>
                        <div class="col-10 divFichaTitulo" id="divLibroTitulo">
                            
                        </div>
                        <div class="col-1">
                        </div>
                    </div>
                    <div class="row divVerBienElementoContenido">
                        <div class="col-1">
                            
                        </div>
                        <div class="col-3">
                            <b>Institución</b>
                        </div>
                        <div class="col-7" id="divLibroInstitucion">
                            
                        </div>
                        <div class="col-1">
                            
                        </div>
                    </div>
                    <div class="row divVerBienElementoContenido">
                        <div class="col-1">
                            
                        </div>
                        <div class="col-3">
                            <b>Autor</b>
                        </div>
                        <div class="col-7" id="divLibroAutor">
                            
                        </div>
                        <div class="col-1">
                            
                        </div>
                    </div>
                    <div class="row divVerBienElementoContenido">
                        <div class="col-1">
                            
                        </div>
                        <div class="col-3">
                            <b>País</b>
                        </div>
                        <div class="col-7" id="divLibroPais">
                            
                        </div>
                        <div class="col-1">
                            
                        </div>
                    </div>
                    <div class="row divVerBienElementoContenido">
                        <div class="col-1">
                            
                        </div>
                        <div class="col-3">
                        <b>Contexto histórico</b>
                        </div>
                        <div class="col-7" id="divLibroContextoHistorico">
                            
                        </div>
                        <div class="col-1">
                            
                        </div>
                    </div>
            ';
        }
    }

    function obtenerPDFsFicha($idficha, $tipo) {
        try
        {
            require('connection.php');

            $urlPDF = "";

            switch ($tipo) {
                case "fotografia":
                                    $urlPDF = $url . "/";
                                    return;                                 
                                    break;
                case "libro":
                                    $urlPDF = $url . "/";
                                    break;
            }

            $con = new mysqli($hn, $un, $pw, $db);

            $sql = "Select *
                    From fichas$tipo
                    Left Join " . $tipo . "pdfs
                    On fichas$tipo.idficha$tipo = " . $tipo . "pdfs.id$tipo
                    Where idficha$tipo = $idficha And " . $tipo ."pdfs.aprobado = 'SI'";

            $result = $con->query($sql);

            while ($row = $result->fetch_array()) {
                echo "<div class='col-3'>";
                echo "<div class='divCard' data-toggle='modal' data-target='#modalMostrarPDF' onclick='verPdfBien(" . $row["idficha$tipo"] . ", \"" . $urlPDF . $row["rutapdf"] . "\")'>";
                echo "<div class='divCardBody'>";                
                echo "<h1 class='divCardLabelBig'>Ver PDF</h1>";
                echo "<div class='divCardBody2Img'>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } 

            mysqli_close($con);
        }
        catch (Throwable $t)
        {
            return $t;
        }
    }
?>