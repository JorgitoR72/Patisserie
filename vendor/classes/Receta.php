<?php

class Receta
{
    private int $idReceta;
    private int $idAutor;
    private string $nombre;
    private string $urlImagen;
    private string $urlVideo;
    private string $descripción;
    private string $preparación;


    public function __construct(int $idReceta, int $idAutor, string $nombre, string $urlImagen, string $urlVideo, string $descripción, string $preparación)
    {
        $this->idReceta = $idReceta;
        $this->idAutor = $idAutor;
        $this->nombre = $nombre;
        $this->urlImagen = $urlImagen;
        $this->urlVideo = $urlVideo;
        $this->descripción = $descripción;
        $this->preparación = $preparación;
        
    }

    public function getIdReceta(): int
    {
        return $this->idReceta;
    }
    public function getIdAutor(): int
    {
        return $this->idAutor;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getUrlImagen(): string
    {
        return $this->urlImagen;
    }
    public function getUrlVideo(): string
    {
        return $this->urlVideo;
    }
    public function getDescripcion(): string
    {
        return $this->descripción;
    }
    public function getPreparacion(): string
    {
        return $this->preparación;
    }
}
