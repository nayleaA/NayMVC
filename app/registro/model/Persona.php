<?php
class Persona {
    public static $CREADOR = "Naylea Altamirano Godínez";

    private $nombre;
    private $edad;

    public function __construct($nombre = '', $edad = 0) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function get_nombre() {
        return $this->nombre;
    }
    public function set_nombre($nombre = '') {
        $this->nombre = $nombre;
    }

    public function get_edad() {
        return $this->edad;
    }
    public function set_edad($edad = 0) {
        $this->edad = $edad;
    }
}
?>