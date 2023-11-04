<?php
    include_once("./app/tareas/model/tarea.model.php");

    class TareasRepository {
        private static $_intance = [];
        
        private mysqli $mysqli;

        private function __construct() {
            $this->mysqli = new mysqli("localhost", "root", "", "tudu");
        }
        
        public static function getInstance(): TareasRepository {
            $class = static::class;
            if ( !isset( $_intance[ $class ] ) ){
                $_intance[ $class ] = new static();
            }

            return $_intance[ $class ];
        }

        public function getAllTareas(): array {
            $tareas = array();
            $query = "SELECT * FROM tareas ORDER BY status DESC";

            $sentencia = $this->mysqli->prepare($query);

            $sentencia->execute();

            $sentencia->bind_result( $id, $titulo, $descripcion, $status );
            while ($sentencia->fetch() ){
                $tareas[] = new Tarea( $id, $titulo, $descripcion, $status );
            }
            return $tareas;
        }
    }
    ?>