<?php

class Ingrediente
{
    private int $idIngrediente;
    private string $nombre;
    private string $cantidad;

    public function __construct(int $idIngrediente, string $nombre, string $cantidad)
    {
        $this->idIngrediente = $idIngrediente;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
    }

    public function getIdIngrediente(): int
    {
        return $this->idIngrediente;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getCantidad(): string
    {
        return $this->cantidad;
    }
}