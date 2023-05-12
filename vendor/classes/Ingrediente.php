<?php

class Ingrediente
{
    private int $idIngrediente;
    private string $nombre;
    private string $descripcion;



    public function __construct(int $idIngrediente, string $nombre, string $descripcion)
    {
        $this->idIngrediente = $idIngrediente;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    public function getIdIngrediente(): int
    {
        return $this->idIngrediente;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }
}