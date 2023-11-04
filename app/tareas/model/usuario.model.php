<?php
    class Usuario {
        private int $id;
        private string $usuario;
        private string $password;

        public function __construct(
            int $id = 0,
            string $usuario,
            string $password
        )
        {
            $this->id = $id;
            $this->usuario = $usuario;
            $this->password = $password;
        }

        public function getId(): int {
            return $this->id;
        }

        public function getUsuario(): string {
            return $this->usuario;
        }

        public function setUsuario( string $usuario ): void {
            $this->usuario = $usuario;
        }

        public function getPassword(): string {
            return $this->password;
        }

        public function setPassword( string $password ): void {
            $this->password = $password;
        }
    }