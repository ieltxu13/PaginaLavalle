<?php

namespace My\Entity;

/**
 * @Entity
 */

class DocumentoAcuerdo
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
    protected $urlDocumento;
    
    /**
     * 
     * @var string
     * @Column(type="string")
     */
    protected $descripcion;
    
    /**
     * @var integer
     * @Column (type="integer")
     **/
    protected $ejercicio;
    
    /**
     * @var integer
     * @Column (type="integer")
     **/
    protected $periodo;
    
    public function __construct()
    {
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getDescripcion(){
        return $this->descripcion;
    }
    
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getUrlDocumento() {
        return $this->urlDocumento;
    }

    public function getEjercicio() {
        return $this->ejercicio;
    }

    public function getPeriodo() {
        return $this->periodo;
    }

    public function setUrlDocumento($urlDocumento) {
        $this->urlDocumento = $urlDocumento;
    }

    public function setEjercicio($ejercicio) {
        $this->ejercicio = $ejercicio;
    }

    public function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }


}
