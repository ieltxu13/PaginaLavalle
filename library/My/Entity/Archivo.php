<?php

namespace My\Entity;

/**
 * @Entity
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="tipo", type="string")
 * @DiscriminatorMap({"imagen" = "Imagen", "video" = "Video"})
 */

class Archivo
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
     * @Column(type="string")
     */
    protected $url;
    
    /**
     * 
     * @var string
     * @Column(type="string")
     */
    protected $descripcion;
    

    /**
     *
     * @var boolean
     * @Column(type="boolean")
     */
    protected $enGaleria;
    
    /**
     * @ManyToMany(targetEntity="SubSeccion", inversedBy="imagenes", cascade={"persist"}, fetch="EAGER")
     * @JoinTable(name="imagenes_subsecciones")
     **/
    protected $subSecciones;
    
    public function __construct()
    {
        $this->enGaleria = false; // Default value for column is_visible
        $this->subSecciones = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getUrl(){
        return $this->url;
    }
    
    public function setUrl($url){
        $this->url = $url;
    }
    
    public function getDescripcion(){
        return $this->descripcion;
    }
    
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    
    public function setEnGaleria($enGaleria = true) {
        $this->enGaleria = $enGaleria;
    }
    
    public function getEnGaleria() {
        return $this->enGaleria;
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
    
}
