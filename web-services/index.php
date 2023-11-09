<?php


    $env = parse_ini_file(".env");
    foreach ( $env as $llave => $value ){
        $_ENV[$llave] = $value;
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
</head>

<body>
    <?php
    //configurar cabeceras para el servicio
    //configurando el tipo de contenido delas respuestas
    header("Content-Type:application/json");

    //configurar el acceso de las peticiones (cualquier origen y metodos permitidos)
    header("Access-Control-Allow-Origin: *");

    //habilitar los verbos con los que trabajara la REST
    header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");

    header("Allow: GET, POST, PUT, PATCH, DELETE, OPTIONS"); 
    


        //  Incluyendo todas las constantes que usaremos
        include_once("./constantes/constantes.php");
    /*
     El objeto $_SERVER de PHP contiene la información de la petición, tal como la URL solicitada
    */
        $request_uri = $_SERVER['REQUEST_URI'];

        // Método solicitado:
        $request_method = $_SERVER['REQUEST_METHOD'];

        // echo $request_uri, $request_method;

        // Obteniendo la información completa de la URL
        $url_components = parse_url($request_uri);
        $query_params=array();

        $path_url = $url_components['path'];

        //elimnamos diagonales de inicio y final
        $path_url = ltrim($path_url, '/');

        if (isset($url_components['query'])) {
            parse_str($url_components['query'], $query_params);
        }


        $path_components = explode('/',  $path_url);

        //posicion de la api en la ruta
        $api_check_index=1;
        //posicion de la version en la ruta
        $version_ckeck_index=$api_check_index+1;
        //enrutado del index de forma completa
         $path_index=$version_ckeck_index+1;

        // echo json_encode($path_components);

        //validar que nos solicite la url que incluya api.
        if( !isset($path_components[$api_check_index])
        ||
        $path_components[$api_check_index] != "api"){
            //notificar de no existencia de url
            header(HTTP_CODE_400);
            //romper ejecucion de php
            exit();
        }

        //validar que nos solicite la url que incluya  la version.
        if(!isset($path_components[$version_ckeck_index])
        ||
        $path_components[$version_ckeck_index]!="v-1"){
            //notificar de no existencia de url
            header(HTTP_CODE_400);
            //romper ejecucion de php
            exit();
        }

        switch ($path_components[$version_ckeck_index]) {
            case 'v-1':
                require_once("./v-1/app.controller.php");
                break;
            
            default:
                header(HTTP_CODE_400);
                exit();
        }

        ?>
</body>

</html>