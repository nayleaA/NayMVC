<?php
/* ------------------------DOCUMENTACION---------------------------------------------------
$maxlifetime = 3; 
   Descripción: Esta variable define el tiempo máximo de vida de una sesión en segundos. En este caso, la sesión expirará después de 3 segundos de inactividad.
   Uso: Controla el tiempo en que una sesión se considera inactiva y, por lo tanto, se elimina. Puede ajustarse según las necesidades de tu aplicación. 

$secure = true;
   Descripción: Esta variable habilita la seguridad de la sesión. Cuando se establece en true, la sesión solo se transmitirá a través de conexiones seguras (HTTPS).
   Uso: Asegura que la información de la sesión se transmita de manera segura para protegerla de posibles ataques.

$http_only = true;:
   Descripción: Esta variable establece si las cookies de sesión deben ser accesibles solo a través de HTTP. Cuando se establece en true, las cookies de sesión no se pueden acceder a través de JavaScript.
   Uso: Aumenta la seguridad de las cookies de sesión al restringir su acceso a través de JavaScript, lo que evita ataques de scripts maliciosos.

$samesite = 'lax';:
   Descripción: Esta variable controla la política "SameSite" de las cookies de sesión. 'Lax' es una política que permite que las cookies se envíen en las solicitudes de navegación de nivel superior, pero no en las solicitudes de terceros.
   Uso: Ayuda a prevenir ataques de tipo CSRF (Cross-Site Request Forgery) al limitar el envío de cookies de sesión a terceros.

$host = $_SERVER['HTTP_HOST'];
   Descripción: Esta variable obtiene el nombre del host del servidor al que se está realizando la solicitud HTTP actual.
   Uso: Puede utilizarse para identificar el host al que se está enviando la sesión y aplicar lógica personalizada según el dominio.
*/

  /*  $maxlifetime = 60; //máximo tiempo de vida de la sesión en segundos
    $secure = true; //Habilitar seguridad
    $http_only = true;
    $samesite = 'lax';
    $host = $_SERVER['HTTP_HOST'];*/

/* ------------------------DOCUMENTACION---------------------------------------------------
 session_set_cookie_params() es una función de PHP utilizada para configurar los parámetros de las cookies de sesión.

'lifetime' => $maxlifetime:
    Descripción: Establece el tiempo de vida de la cookie de sesión. Utiliza el valor de la variable $maxlifetime definida anteriormente, que determina el tiempo máximo de vida de la sesión en segundos.

'path' => './':
    Descripción: Define la ruta del servidor en la que la cookie de sesión será válida. En este caso, la cookie de sesión será válida en todo el dominio.

'domain' => $host:
    Descripción: Establece el dominio al que pertenece la cookie de sesión. Utiliza el valor de la variable $host definida anteriormente, que obtiene el nombre del host del servidor actual.

'secure' => $secure:
    Descripción: Indica si la cookie de sesión debe ser enviada solo a través de conexiones seguras (HTTPS). Utiliza el valor de la variable $secure definida anteriormente, que habilita o deshabilita esta función.

'httponly' => $http_only:
    Descripción: Controla si la cookie de sesión solo será accesible a través de HTTP y no a través de JavaScript. Utiliza el valor de la variable $http_only definida anteriormente, que habilita o deshabilita esta característica.

'samesite' => $samesite:
    Descripción: Configura la política "SameSite" de la cookie de sesión, que regula cuándo se envía la cookie en las solicitudes. Utiliza el valor de la variable $samesite definida anteriormente, que determina la política de SameSite.
 */

 // Configuración de cookies de sesión
   /* session_set_cookie_params([
        'lifetime'  => $maxlifetime,
        'path'      => './',
        'domain'    => $host,
        'secure'    => $secure,
        'httponly'  => $http_only,
        'samesite'  => $samesite
    ]);

    session_start([
        //'cookie_lifetime' => 60*60*4
    ]);*/ 

    session_start();
    
    /*Comprueba si una sesión de usuario está activa.
      @return bool Devuelve true si la sesión de usuario está activa y el 'userId' está definido y no es nulo; de lo contrario, devuelve false.
    */
    function checkSession(): bool {
        //verifica si la variable de sesión 'userId' está definida. Si está definida, significa que el usuario ha iniciado sesión.
        // verifica si el valor de 'userId' en la sesión no es nulo. Esto es importante porque incluso si 'userId' está definido, podría tener un valor nulo si el usuario no ha iniciado sesión correctamente.
        return isset($_SESSION['userId']) && $_SESSION['userId'] != null;//
    }

    // Trabajando variables de entorno
    //s una función en PHP que se utiliza para analizar y cargar un archivo de configuración en formato INI 

    $env = parse_ini_file(".env.template");

   // print_r($env);

    //Asigna valores desde el arreglo de configuración '$env' a la variable global '$_ENV'.
    // @param array $env Un arreglo asociativo que contiene configuraciones de la aplicación.
    foreach ( $env as $llave => $value ){
        $_ENV[$llave] = $value;
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description"
    content="Descripcion de mi página web entre mas larga mejor"
    />
    <meta name="keywords" content="tareas, paises, mamahuevo">

     <!--Rebots evita que caigamos en dark web, ayuda a la indexacion tiene 4 valores posibles 
    1-index (para no caer en la darkweb)
    2- no index (que no lo puedan encontrar o que no lo muestre)
    3- follow (permite navegar hasta el sitio original cuando son incrustados)
    4-nofollow (lo contrario a follow)
    configuracion:
    1-no archive (no cache, nunca cargar de cache, como si fuera la primera vez que lo carga)
    2.nosnippet (solo el sitio con la url y si acaso el titulo, no muestra toda la informacion del sitio)Permite hacer configuracion de varios tipos separados por comas-->
     <meta name="robots" content="index,follow">

     <meta name="autor" content="Nay Nay">
     <meta name="copyright" content="@SAEN">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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

        require_once("./app.controller.php");

        ?>
</body>

</html>