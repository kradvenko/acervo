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
                echo "<div class='col-3 divCard'>";
                echo "<div class='divCardBody'>";
                /*
                if (strlen($row["thumbnail"]) == 0) {
                    echo "<img src='" . $urlThumb . "no-image.jpg" . "' />";
                } else {
                    echo "<img src='" . $urlThumb . $row["thumbnail"] . "' />";
                }
                */
                echo "<label class='labelType01'>" . $row["nombreInstitucion"] . "</label>";
                echo "<h4 class=''>Bienes</h4>";
                echo "<h4 class=''>";
                echo (obtenerTotalFotografiasInstitucion($row["idinstitucion"]) + obtenerTotalPublicacionesInstitucion($row["idinstitucion"]) +
                        obtenerTotalLibrosInstitucion($row["idinstitucion"])
                    );
                echo "</h4>";
                echo "</div>";
                echo "<div>";
                echo "<button class='btn fl ghost' onclick=''>Ir</button>";
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
                echo "<div class='col-3 divCard'>";
                echo "<div class='divCardBody'>";
                /*
                if (strlen($row["thumbnail"]) == 0) {
                    echo "<img src='" . $urlThumb . "no-image.jpg" . "' />";
                } else {
                    echo "<img src='" . $urlThumb . $row["thumbnail"] . "' />";
                }
                */
                echo "<label class='labelType01'>" . $row["ciudad"] . "</label>";
                echo "<h4 class=''>Bienes</h4>";
                echo "<h4 class=''>";
                echo (obtenerTotalFotografiasCiudad($row["idciudad"]) + obtenerTotalPublicacionesCiudad($row["idciudad"]) +
                        obtenerTotalLibrosCiudad($row["idciudad"])
                    );
                echo "</h4>";
                echo "</div>";
                echo "<div>";
                echo "<button class='btn fl ghost' onclick=''>Ir</button>";
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
?>