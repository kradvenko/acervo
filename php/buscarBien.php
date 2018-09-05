<?php
    try
    {
        require('connection.php');

        $busqueda = $_POST["busqueda"];

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select fichaslibro.*, instituciones.idpais, instituciones.idciudad
                From fichaslibro
                Inner Join instituciones
                On instituciones.idinstitucion = fichaslibro.idinstitucion
                Where titulo Like '%$busqueda%'";

        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            echo "<div class='col-12 divResultadoHeader'>";
            echo $row["titulo"];
            echo "</div>";
            echo "<div class='col-12'>";
            echo "Libro";
            echo "</div>";
            echo "<div class='col-12'>";
            echo "<input type='button' class='btn sm ghost' value='Ver ficha' onclick='irFicha(" . $row["idfichalibro"] . ", \"libro\", " . $row["idinstitucion"] . ", " . $row["idpais"] . ", " . $row["idciudad"] . ", \"Libros\", \"null\""  . ")' />";
            echo "</div>";
        }            

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>