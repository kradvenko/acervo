<?php
    
    function menu() {
            $menu = '
                    <ul class="mainMenu">
                        <li><a href="index.php" id="aIndex" class="mainMenuElement">Inicio</a></li>
                        <li><a href="amadonervo.php" id="aAmado" class="mainMenuElement">Amado Nervo</a></li>
                        <li><a href="acervo.php" id="aAcervo" class="mainMenuElement">Acervo</a></li>
                        <li><a href="galerias.php" id="aGalerias"class="mainMenuElement">Galerías</a></li>
                        <li><a href="contacto.php" id="aContacto" class="mainMenuElement">Contacto</a></li>
                    </ul>
            ';
        return $menu;
    }
?>