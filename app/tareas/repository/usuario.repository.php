<?php
    include_once("./app/tareas/model/usuario.model.php");

    class UsuariosRepository {
        private static $_intance = [];
        
        private mysqli $mysqli;

        private function __construct() {
          $host = $_ENV['DB_HOST'];
          $user = $_ENV['DB_USER'];
          $password = $_ENV['DB_PASSWORD'];
          $database = $_ENV['DB_DATABASE'];
           
            //$this->mysqli = new mysqli("localhost", "root", "", "tudu");
            $this->mysqli = new mysqli($host, $user,$password,$database);
        }
        
        public static function getInstance(): UsuariosRepository {
            $class = static::class;
            if ( !isset( $_intance[ $class ] ) ){
                $_intance[ $class ] = new static();
            }

            return $_intance[ $class ];
        }

        public function getMysqli(): mysqli {
            return $this->mysqli;
        }

        public function loginUsuario(Usuario $usuario): Usuario {
            $query = "SELECT * FROM usuarios WHERE usuario = ? and password = ?";

            $sentencia = $this->mysqli->prepare($query);
            $sentencia->bind_param("ss", $usuario->getUsuario(), $usuario->getPassword());
            
            $sentencia->execute();

            $sentencia->bind_result( $id, $nombre_usuario, $password );
            // $sentencia->
            while ($sentencia->fetch() ){
                $usuario = new Usuario( id:$id, usuario:$nombre_usuario, password:$password );
            }
            return $usuario;
        }

        public function registerNewUsuario( Usuario $usuario ): bool {
            $this->mysqli->begin_transaction();
            $query = "INSERT INTO usuarios(usuario, password) VALUES( ? , ? )";

            $sentencia = $this->mysqli->prepare($query);
            
            $sentencia->bind_param("ss", $usuario->getUsuario(), $usuario->getPassword());

            if ( !$sentencia->execute() ){
                $this->mysqli->rollback();
                return false;
            }

            $this->mysqli->commit();
            return true;
        }

        public function findUsuarioByUsuario(string $usuario): Usuario | false {
            $query = "SELECT * FROM usuarios WHERE usuario = ?";

            $sentencia = $this->mysqli->prepare($query);
            $sentencia->bind_param( "s", $usuario );
            
            $sentencia->execute();

            $sentencia->bind_result( $id, $nombre_usuario, $password );
            // $sentencia->
            if ($sentencia->fetch() ){
                $usuario = new Usuario( id:$id, usuario:$nombre_usuario, password:$password );
            } else{
                return false;
            }
            return $usuario;
        }

        public function changeUsuarioPassword(Usuario $usuario): bool {
            $this->mysqli->begin_transaction();
            $query = "UPDATE usuarios SET password = ? WHERE id = ?";

            $sentencia = $this->mysqli->prepare($query);
            $sentencia->bind_param( "si", $usuario->getPassword(), $usuario->getId() );
            
            if ( !$sentencia->execute() ) {
                $this->mysqli->rollback();
                return false;
            }

            $this->mysqli->commit();
            return true;
        }
    }
    ?>