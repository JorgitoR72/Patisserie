<?php

class Receta {
    private $idReceta;
    private $nombre;
    private $imagen;
    private $video;
    private $descripcion;
    private $preparacion;
    private $idAutor;
    private $idIngredientes;

    public function __construct($idReceta, $nombre, $imagen, $video, $descripcion, $preparacion, $idAutor, $idIngredientes) {
        $this->idReceta = $idReceta;
        $this->nombre = $nombre;
        $this->imagen = $imagen;
        $this->video = $video;
        $this->descripcion = $descripcion;
        $this->preparacion = $preparacion;
        $this->idAutor = $idAutor;
        $this->idIngredientes = $idIngredientes;
    }

    // getters
    public function getIdReceta() {
        return $this->idReceta;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getVideo() {
        return $this->video;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPreparacion() {
        return $this->preparacion;
    }

    public function getIdAutor() {
        return $this->idAutor;
    }

    public function getidIngredientes() {
        return $this->idIngredientes;
    }

    // setters
    public function setIdReceta($idReceta) {
        $this->idReceta = $idReceta;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function setVideo($video) {
        $this->video = $video;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPreparacion($preparacion) {
        $this->preparacion = $preparacion;
    }

    public function setIdAutor($idAutor) {
        $this->idAutor = $idAutor;
    }

    public function setidIngredientes($idIngredientes) {
        $this->idIngredientes = $idIngredientes;
    }
}
