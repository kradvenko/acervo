<?php
    try
    {
        require_once('connection.php');

        $idFichaFotografia = $_POST["idFichaFotografia"];

        if (!$idFichaFotografia) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select fichasfotografia.*, instituciones.nombreInstitucion,
                CA.ciudad As ciudadAsunto,
                CT.ciudad As ciudadToma,
                estudiosfotograficos.estudio, albumes.album, C.nombre
                From fichasfotografia
                Left Join instituciones
                On fichasfotografia.idinstitucion = instituciones.idinstitucion
                Left Join ciudades CA
                On fichasfotografia.idciudadasunto = CA.idciudad
                Left Join ciudades CT
                On fichasfotografia.idciudadtoma = CT.idciudad
                Left Join estudiosfotograficos
                On fichasfotografia.idestudio = estudiosfotograficos.idestudiofotografico
                Left Join albumes
                On fichasfotografia.idalbum = albumes.idalbum
                Left Join usuarios C
                On fichasfotografia.idpersonacaptura = C.idusuario
                Where fichasfotografia.idfichafotografia = $idFichaFotografia";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<idfichafotografia>" . $row['idfichafotografia'] . "</idfichafotografia>\n";
            echo "<idinstitucion>" . $row['idinstitucion'] . "</idinstitucion>\n";
            echo "<numeroregistrointerno>" . $row['numeroregistrointerno'] . "</numeroregistrointerno>\n";
            echo "<numeroinventario>" . $row['numeroinventario'] . "</numeroinventario>\n";
            echo "<titulo>" . $row['titulo'] . "</titulo>\n";
            echo "<tituloserie>" . $row['tituloserie'] . "</tituloserie>\n";
            echo "<idciudadasunto>" . $row['idciudadasunto'] . "</idciudadasunto>\n";
            echo "<idciudadtoma>" . $row['idciudadtoma'] . "</idciudadtoma>\n";
            echo "<fechaasunto>" . $row['fechaasunto'] . "</fechaasunto>\n";
            echo "<fechatoma>" . $row['fechatoma'] . "</fechatoma>\n";
            echo "<idestudio>" . $row['idestudio'] . "</idestudio>\n";
            echo "<idalbum>" . $row['idalbum'] . "</idalbum>\n";
            echo "<numerofotografia>" . $row['numerofotografia'] . "</numerofotografia>\n";
            echo "<coleccion>" . $row['coleccion'] . "</coleccion>\n";
            echo "<clavetecnica>" . $row['clavetecnica'] . "</clavetecnica>\n";
            echo "<anotaciones>" . $row['anotaciones'] . "</anotaciones>\n";
            echo "<contextohistorico>" . $row['contextohistorico'] . "</contextohistorico>\n";
            echo "<estadoconservacion>" . $row['estadoconservacion'] . "</estadoconservacion>\n";
            echo "<estadointegridad>" . $row['estadointegridad'] . "</estadointegridad>\n";
            echo "<agrietamiento>" . $row['agrietamiento'] . "</agrietamiento>\n";
            echo "<ataquebiologico>" . $row['ataquebiologico'] . "</ataquebiologico>\n";
            echo "<burbujas>" . $row['burbujas'] . "</burbujas>\n";
            echo "<cambioscolor>" . $row['cambioscolor'] . "</cambioscolor>\n";
            echo "<craqueladuras>" . $row['craqueladuras'] . "</craqueladuras>\n";
            echo "<cintasadhesivas>" . $row['cintasadhesivas'] . "</cintasadhesivas>\n";
            echo "<deformaciones>" . $row['deformaciones'] . "</deformaciones>\n";
            echo "<desprendimientos>" . $row['desprendimientos'] . "</desprendimientos>\n";
            echo "<desvanecimientos>" . $row['desvanecimientos'] . "</desvanecimientos>\n";
            echo "<huellasdigitales>" . $row['huellasdigitales'] . "</huellasdigitales>\n";
            echo "<hongos>" . $row['hongos'] . "</hongos>\n";
            echo "<manchas>" . $row['manchas'] . "</manchas>\n";
            echo "<raspaduras>" . $row['raspaduras'] . "</raspaduras>\n";
            echo "<ralladuras>" . $row['ralladuras'] . "</ralladuras>\n";
            echo "<retocado>" . $row['retocado'] . "</retocado>\n";
            echo "<roturas>" . $row['roturas'] . "</roturas>\n";
            echo "<sellosotinta>" . $row['sellosotinta'] . "</sellosotinta>\n";
            echo "<sulfuracion>" . $row['sulfuracion'] . "</sulfuracion>\n";
            echo "<alto>" . $row['alto'] . "</alto>\n";
            echo "<ancho>" . $row['ancho'] . "</ancho>\n";
            echo "<diametro>" . $row['diametro'] . "</diametro>\n";
            echo "<inspeccionesomarcas>" . $row['inspeccionesomarcas'] . "</inspeccionesomarcas>\n";
            echo "<caracteristicas>" . $row['caracteristicas'] . "</caracteristicas>\n";
            echo "<idpersonacaptura>" . $row['idpersonacaptura'] . "</idpersonacaptura>\n";
            echo "<fechacaptura>" . $row['fechacaptura'] . "</fechacaptura>\n";
            echo "<estado>" . $row['estado'] . "</estado>\n";
            echo "<nombreInstitucion>" . $row['nombreInstitucion'] . "</nombreInstitucion>\n";
            echo "<ciudadAsunto>" . $row['ciudadAsunto'] . "</ciudadAsunto>\n";
            echo "<ciudadToma>" . $row['ciudadToma'] . "</ciudadToma>\n";
            echo "<estudio>" . $row['estudio'] . "</estudio>\n";
            echo "<album>" . $row['album'] . "</album>\n";
            echo "<nombre>" . $row['nombre'] . "</nombre>\n";
        }

        echo "</resultado>\n";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>