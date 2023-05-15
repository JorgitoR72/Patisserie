<?php

class RecetaIngrediente
{
    private int $idReceta;
    private int $idIngrediente;
    private int $cantidad;




    public function __construct(int $idReceta, int $idIngrediente, int $cantidad)
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
    public function getCantidad(): int
    {
        return $this->cantidad;
    }
}