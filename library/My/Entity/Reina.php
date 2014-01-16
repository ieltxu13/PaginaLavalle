<?php

namespace My\Entity;

/**
 * @Entity
 */
class Reina
{
    
    /**
     * @var integer 
     * @Column (type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $nombre;
    
    /**
     *
     * @var string
     * @Column(type="string", length=4)
     */
    protected $anio;
    
    /**
     *
     * @var string
     * @Column(type="text")
     */
    protected $datos;
    
    
    public function __construct() {
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function getAnio() {
        return $this->anio;
    }

    public function getDatos() {
        return $this->datos;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setAnio($anio) {
        $this->anio = $anio;
    }

    public function setDatos($datos) {
        $this->datos = $datos;
    }
}
