<?php
class Tarea {

    private int $id;
    private int $idUsuario;
    private string $titulo;
    private string $descripcion;
    private string $status;

    public function __construct(
        int $id = -1,
        int $idUsuario,
        string $titulo,
        string $descripcion,
        string $status = "Pendiente"
    )
    {
        $this->id = $id;
        $this->idUsuario = $idUsuario;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->status = $status;
    }

    public function getId(): int {
        return $this->id;
    }
    public function getIdUsuario(): int {
        return $this->idUsuario;
    }

    public function getTitulo(): string {
        return $this->titulo;
    }

    public function setTitulo( string $titulo ) {
        $this->titulo = $titulo;
    }

    public function getDescripcion(): string {
        return $this->descripcion;
    }

    public function setDescripcion( string $descripcion ) {
        $this->descripcion = $descripcion;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus( string $status ) {
        $this->status = $status;
    }
}
?>