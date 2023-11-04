<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="container mt-3">
    <!-- <h1>Hola Mundo</h1> -->
    <?php
        //  Incluyendo todas las constantes que usaremos
        include_once("./constantes.php");
    /*
     El objeto $_SERVER de PHP contiene la información de la petición, tal como la URL solicitada
    */
        $request_uri = $_SERVER['REQUEST_URI'];

        // Método solicitado:
        $request_method = $_SERVER['REQUEST_METHOD'];

        // echo $request_uri, $request_method;

        // Obteniendo la información completa de la URL
        $url_components = parse_url($request_uri);
        $path_url = $url_components['path'];
        $path_url = ltrim($path_url, '/');
        if (count($url_components) > 1) {
            parse_str($url_components['query'], $query_params);
        }


        $path_components = explode('/',  $path_url);

        // echo json_encode($path_components);

        // echo "
        //         <br>
        //         El Recurso solicitado es: $path_url <br>
        //         Esta petición fue realizada a través de: $request_method <br>
        //         Los query params recibidos son: $query_params['perro']
        //     ";

        require_once("./app.controller.php");

        ?>
</body>

</html>