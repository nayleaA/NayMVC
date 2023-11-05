<?php

    if ( !isset($path_components[2]) )
        $path_components[2] = '';

    switch ($path_components[2]) {
        case 'por-continente':
            require_once("./app/paises/por-continente/view/porcontinente.view.php");
            break;

        case 'por-pais':
            require_once("./app/paises/por-pais/view/porpais.view.php");
            break;

        case 'ver-pais':
            require_once("./app/paises/ver-pais/view/verpais.view.php");
            break;

        default:
            header("Location: /NayMVC/app-paises/por-continente");
            break;
    }
?>