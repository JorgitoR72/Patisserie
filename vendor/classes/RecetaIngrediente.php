<?php

class RecetaIngrediente
{
    private int $idReceta;
    private int $idIngrediente;
    private string $cantidad;

    public function __construct(int $idReceta, int $idIngrediente, string $cantidad)
    {
        $this->idReceta = $idReceta;
        $this->idIngrediente = $idIngrediente;
        $this->cantidad = $cantidad;
    }
    
    public function getIdReceta(): int
    {
        return $this->idReceta;
    }
    public function getIdIngrediente(): int
    {
        return $this->idIngrediente;
    }
    public function getCantidad(): string
    {
        return $this->cantidad;
    }
}