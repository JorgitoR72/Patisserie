<?php

class PlanSuscripcion
{
    private int $idPlan;
    private string $nombrePlan;
    private int $precio;
    private string $ventajasPlan;



    public function __construct(int $idPlan, string $nombrePlan, int $precio, string $ventajasPlan)
    {
        $this->idPlan = $idPlan;
        $this->nombrePlan = $nombrePlan;
        $this->precio = $precio;
        $this->ventajasPlan = $ventajasPlan;
    }

    public function getIdPlan(): int
    {
        return $this->idPlan;
    }
    public function getNombrePlan(): string
    {
        return $this->nombrePlan;
    }
    public function getPrecio(): int
    {
        return $this->precio;
    }
    public function getVentajasPlan(): string
    {
        return $this->ventajasPlan;
    }
}
