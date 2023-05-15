<?php

class PlanReceta
{
    private int $idPlan;
    private int $idReceta;



    public function __construct(int $idPlan, int $idReceta)
    {
        $this->idPlan = $idPlan;
        $this->idReceta = $idReceta;
    }

    public function getIdPlan(): int
    {
        return $this->idPlan;
    }
    public function getIdReceta(): int
    {
        return $this->idReceta;
    }
}
