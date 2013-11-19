<?php

namespace My\Entity;

/**
 * @Entity
 */
class Noticia
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
    protected $titulo;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $copete;
    
    /**
     *
     * @var string
     * @Column(type="text")
     */
    protected $contenido;
    
    /**
     *
     * @var date
     * @Column (type="date")
     */
    protected $fecha;
    
    /**
     * @OneToOne(targetEntity="Archivo", cascade={"persist"}, fetch="EAGER")
     **/
    protected $archivoPrincipal;
    
    /**
     * @OneToOne(targetEntity="Archivo", cascade={"persist"}, fetch="EAGER")
     **/
    protected $archivoGrande;
    
    public function __construct() {
        $this->archivos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getTitulo(){
        return $this->titulo;
    }
    
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    
    public function getCopete(){
        return $this->copete;
    }
    
    public function setCopete($copete){
        $this->copete = $copete;
    }
    
    public function getContenido(){
        return $this->contenido;
    }
    
    public function setContenido($contenido){
        $this->contenido = $contenido;
    }
    
    public function getFecha(){
        return date_format($this->fecha, 'Y-m-d');
    }
    
    public function setFecha($fecha){
        $this->fecha = new \DateTime($fecha);
    }
    
    //
//    public function getArchivos(){
//        return $this->archivos;
//    }
//    
//    public function agregarArchivo(Archivo $archivo){
//        $this->archivos[] = $archivo;
//    }
//    
//    public function agregarImagen(Imagen $imagen){
//        $this->archivos[] = $imagen;
//    }
//    
//    public function agregarVideo(Video $video){
//        $this->archivos[] = $video;
//    }
    
    public function quitarArchivo(Archivo $archivo){
        $this->archivos->removeElement($archivo);
    }
    
    public function setArchivoPrincipal(Archivo $archivo){
        $this->archivoPrincipal = $archivo;
    }
    
    public function getArchivoPrincipal(){
        return $this->archivoPrincipal;
    }
    
    public function setArchivoGrande(Archivo $archivo){
        $this->archivoGrande = $archivo;
    }
    
    public function getArchivoGrande(){
        return $this->archivoGrande;
    }
    
    public function __get($name){
        return $this->$name;
    }
    
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    
    
    
    
}

