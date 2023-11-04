<?php
    include_once("./app/registro/model/Persona.php");
    $data = $_POST;

    $persona = new Persona($data['nombre'], $data['edad']);
    $persona->get_nombre();

    echo "
        <h1>Bienvenido {$persona->get_nombre()}</h1>
        <h2>Felicidades por tus {$persona->get_edad()} años</h2>
        <h3>Este trabajo fue creado por {$persona::$CREADOR};</h3>
    ";
?>