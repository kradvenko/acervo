<?php
    try
    {
        require_once('connection.php');

        $idFichaLibro = $_POST["idFichaLibro"];

        if (!$idFichaLibro) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select fichaslibro.*, instituciones.nombreInstitucion, paises.pais,
                idiomas.idioma, C.nombre
                From fichaslibro
                Left Join instituciones
                On fichaslibro.idinstitucion = instituciones.idinstitucion
                Left Join idiomas
                On idiomas.ididioma = fichaslibro.ididioma
                Left Join usuarios C
                On fichaslibro.idpersonacaptura = C.idusuario
                Inner Join paises
                On paises.idpais = instituciones.idpais
                Where fichaslibro.idfichalibro = $idFichaLibro";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<idfichalibro>" . $row['idfichalibro'] . "</idfichalibro>\n";
            echo "<idinstitucion>" . $row['idinstitucion'] . "</idinstitucion>\n";
            echo "<numeroregistrointerno>" . $row['numeroregistrointerno'] . "</numeroregistrointerno>\n";
            echo "<numeroinventario>" . $row['numeroinventario'] . "</numeroinventario>\n";
            echo "<titulo>" . $row['titulo'] . "</titulo>\n";
            echo "<subtitulo>" . $row['subtitulo'] . "</subtitulo>\n";
            echo "<imprenta>" . $row['imprenta'] . "</imprenta>\n";
            echo "<prologo>" . $row['prologo'] . "</prologo>\n";
            echo "<compiladores>" . $row['compiladores'] . "</compiladores>\n";
            echo "<editorial>" . $row['editorial'] . "</editorial>\n";
            echo "<lugaredicion>" . $row['lugaredicion'] . "</lugaredicion>\n";
            echo "<ididioma>" . $row['ididioma'] . "</ididioma>\n";
            echo "<idioma>" . $row['idioma'] . "</idioma>\n";
            echo "<fechaedicion>" . $row['fechaedicion'] . "</fechaedicion>\n";
            echo "<fechaimpresion>" . $row['fechaimpresion'] . "</fechaimpresion>\n";
            echo "<fechareimpresion>" . $row['fechareimpresion'] . "</fechareimpresion>\n";
            echo "<isbn>" . $row['isbn'] . "</isbn>\n";
            echo "<volumen>" . $row['volumen'] . "</volumen>\n";
            echo "<tomo>" . $row['tomo'] . "</tomo>\n";
            echo "<tiraje>" . $row['tiraje'] . "</tiraje>\n";
            echo "<ejemplares>" . $row['ejemplares'] . "</ejemplares>\n";
            echo "<ciudad>" . $row['ciudad'] . "</ciudad>\n";
            echo "<coleccion>" . $row['coleccion'] . "</coleccion>\n";
            echo "<numerototalcoleccion>" . $row['numerototalcoleccion'] . "</numerototalcoleccion>\n";
            echo "<anotaciones>" . $row['anotaciones'] . "</anotaciones>\n";
            echo "<contextohistorico>" . $row['contextohistorico'] . "</contextohistorico>\n";
            echo "<estadoconservacion>" . $row['estadoconservacion'] . "</estadoconservacion>\n";
            echo "<estadointegridad>" . $row['estadointegridad'] . "</estadointegridad>\n";
            echo "<idpersonacaptura>" . $row['idpersonacaptura'] . "</idpersonacaptura>\n";
            echo "<fechacaptura>" . $row['fechacaptura'] . "</fechacaptura>\n";
            echo "<estado>" . $row['estado'] . "</estado>\n";
            echo "<nombreInstitucion>" . $row['nombreInstitucion'] . "</nombreInstitucion>\n";
            echo "<album>" . $row['album'] . "</album>\n";
            echo "<nombre>" . $row['nombre'] . "</nombre>\n";
            echo "<pais>" . $row['pais'] . "</pais>\n";
        }

        echo "</resultado>\n";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>