<?php


    function obtenerTotalBienes($tipoFicha) {
        try
        {
            require_once('connection.php');

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
            require_once('connection.php');
    
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
            require_once('connection.php');
    
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
                echo "";
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

    function obtenerTotalBienesPais($idpais) {
        try
        {
            require_once('connection.php');
    
            $con = new mysqli($hn, $un, $pw, $db);
    
            $sql = "Select Count(*)
                    From paises
                    Inner Join 
                    ";
    
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
                echo "";
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
?>