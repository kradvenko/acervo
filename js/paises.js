function verBienesPais(id) {
    document.location = "paisbienes.php?idpais=" + id;
}

function verBienesInstitucion(idi, idp, idc) { 
    document.location = "institucionbienes.php?idinstitucion=" + idi + "&idpais=" + idp + "&idciudad=" + idc;
}

function verBienesCiudad(idc, idp) {
    document.location = "ciudadbienes.php?idciudad=" + idc + "&idpais=" + idp;
}