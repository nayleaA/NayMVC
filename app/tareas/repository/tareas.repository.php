<?php
    include_once("./app/tareas/model/tarea.model.php");

    class TareasRepository {
        private static $_intance = [];
        
        private mysqli $mysqli;

        private function __construct() {
           /* $host = $_ENV['DB_HOST'];
            $user = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASSWORD'];
            $database = $_ENV['DB_DATABASE'];
            $this->mysqli = new mysqli($host, $user, $password, $database);*/
            $this->mysqli = new mysqli("localhost", "root", "", "tudu");
        }
        
        public static function getInstance(): TareasRepository {
            $class = static::class;
            if ( !isset( $_intance[ $class ] ) ){
                $_intance[ $class ] = new static();
            }

            return $_intance[ $class ];
        }

        public function getMysqli(): mysqli {
            return $this->mysqli;
        }

        public function getAllTareas(): array {
            $tareas = array();
            $query = "SELECT * FROM tareas ORDER BY status DESC, titulo";

            $sentencia = $this->mysqli->prepare($query);

            $sentencia->execute();

            $sentencia->bind_result( $id, $idUsuario, $titulo, $descripcion, $status );
            while ($sentencia->fetch() ){
                $tareas[] = new Tarea( $id, $idUsuario, $titulo, $descripcion, $status );
            }
            return $tareas;
        }

        public function getAllTareasByUserId($userId): array {
            $tareas = array();
            $query = "SELECT * FROM tareas WHERE idUsuario = ? ORDER BY status DESC, titulo";

            $sentencia = $this->mysqli->prepare($query);
            $sentencia->bind_param("i", $userId);

            $sentencia->execute();

            $sentencia->bind_result( $id, $idUsuario, $titulo, $descripcion, $status );
            while ($sentencia->fetch() ){
                $tareas[] = new Tarea( $id, $idUsuario, $titulo, $descripcion, $status );
            }
            return $tareas;
        }

        public function getTareaById(int $id): Tarea | false {
            $query = "SELECT * FROM tareas WHERE id = ?";

            $sentencia = $this->mysqli->prepare($query);
            $sentencia->bind_param("i", $id);
            
            $sentencia->execute();
            $sentencia->bind_result( $id, $idUsuario, $titulo, $descripcion, $status );

            if ( $sentencia->fetch() ) {
                return new Tarea( $id, $idUsuario, $titulo, $descripcion, $status );
            }
            return false;
        }

        public function saveNewTarea( Tarea $tarea ): bool {
            $this->mysqli->begin_transaction();
            $query = "INSERT INTO tareas(idUsuario, titulo, descripcion, status) VALUES( ?, ?, ?, ? )";

            $sentencia = $this->mysqli->prepare($query);
            
            $idUsuario = $tarea->getIdUsuario();
            $titulo = $tarea->getTitulo();
            $descri = $tarea->getDescripcion();
            $status = $tarea->getStatus();
            
            $sentencia->bind_param("isss", $idUsuario, $titulo, $descri, $status);

            if ( !$sentencia->execute() ){
                $this->mysqli->rollback();
                return false;
            }

            $this->mysqli->commit();
            return true;
        }

        public function editTarea( Tarea $tarea ): bool {
            $this->mysqli->begin_transaction();
            $query = "UPDATE tareas SET titulo = ?, descripcion = ?, status = ? WHERE id = ?";

            $sentencia = $this->mysqli->prepare( $query );
            
            $sentencia->bind_param( "sssi", $tarea->getTitulo(), $tarea->getDescripcion(), $tarea->getStatus(), $tarea->getId() );

            if ( !$sentencia->execute() ){
                $this->mysqli->rollback();
                return false;
            }

            $this->mysqli->commit();
            return true;
        }
    }
    ?>