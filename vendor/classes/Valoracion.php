<?php

class Valoracion
{
    private int $idCliente;
    private int $idReceta;
    private string $comentario;
    private int $puntuacion;



    public function __construct(int $idCliente, int $idReceta, string $comentario, int $puntuacion)
    {
        $this->idCliente = $idCliente;
        $this->idReceta = $idReceta;
        $this->comentario = $comentario;
        $this->puntuacion = $puntuacion;
    }

    public function getIdCliente(): int
    {
        return $this->idCliente;
    }
    public function getIdReceta(): int
    {
        return $this->idReceta;
    }
    public function getComentario(): string
    {
        return $this->comentario;
    }
    public function getPuntuacion(): int
    {
        return $this->puntuacion;
    }
}
