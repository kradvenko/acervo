<?php
    try
    {
        require_once('connection.php');

        $idFicha = $_POST["idFicha"];
        $tipo = $_POST["tipo"];

        if (!$idFicha) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $tablaFicha = 'fichas' . $tipo;
        $tablaAutores = $tipo . 'autores';

        $sql = "SELECT autores.*
                FROM autores
                INNER JOIN $tablaAutores
                ON $tablaAutores.idautor = autores.idautor
                INNER JOIN $tablaFicha
                ON $tablaAutores.id$tipo = $tablaFicha.idficha$tipo                
                WHERE $tablaFicha.idficha$tipo = $idFicha";
        
        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<idautor>" . $row['idautor'] . "</idautor>\n";
            echo "<autor>" . $row['autor'] . "</autor>\n";
        }

        echo "</resultado>\n";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>