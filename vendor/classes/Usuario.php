<?php

class Usuario
{
    private int $idUsuario;
    private string $email;
    private string $nombre;
    private string $apellido;
    private string $contraseña;
    private string $tipoUsuario;
    private int $idPlan;


    public function __construct(int $idUsuario, string $email, string $nombre, string $apellido, string $contraseña, string $tipoUsuario, float $idPlan)
    {
        $this->idUsuario = $idUsuario;
        $this->email = $email;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->contraseña = $contraseña;
        $this->tipoUsuario = $tipoUsuario;
        $this->idPlan = $idPlan;
        
    }

    public function getIdUsuario(): int
    {
        return $this->idUsuario;
    }
    public function getEmail(): int
    {
        return $this->email;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getApellido(): string
    {
        return $this->apellido;
    }
    public function getContraseña(): string
    {
        return $this->contraseña;
    }
    public function getTipoUsuario(): string
    {
        return $this->tipoUsuario;
    }
    public function getIdPlan(): int
    {
        return $this->idPlan;
    }
}
