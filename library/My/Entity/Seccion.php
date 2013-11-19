<?php

namespace My\Entity;

/**
 * @Entity
 */
class Seccion
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
     * @var date
     * @Column (type="date")
     */
    protected $fecha;
    
    /**
     * @ManyToMany(targetEntity="SubSeccion", inversedBy="seccionesPadre", cascade={"persist"}, fetch="EAGER")
     * @JoinTable(name="secciones_subsecciones")
     **/
    protected $subSecciones;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $ubicacion;
    
    
    public function __construct() {
        $this->subSecciones = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function getFecha(){
        return date_format($this->fecha, 'Y-m-d');
    }
    
    public function setFecha($fecha){
        $this->fecha = new \DateTime($fecha);
    }
    
    public function getSubsecciones(){
        return $this->subSecciones;
    }
    
    public function agregarSubSeccion(SubSeccion $seccion){
        $this->subSecciones[] = $seccion;
    }
    
    public function quitarSubSeccion(SubSeccion $seccion){
        $this->subSecciones->removeElement($seccion);
    }
    
    public function getUbicacion() {
        return $this->ubicacion;
    }
    
    public function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }
}

