<?php

namespace My\Entity;


/**
 * @Entity
 */
class Encuesta {
    
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
     * @Column (type="string", length="255")
     */
    protected $titulo;
    
    /**
     *
     * @var string
     * @Column (type="string", length="255")
     */
    protected $pregunta;
    
    /**
     *
     * @var integer
     * @Column (type="integer")
     */
    protected $si;
    
    /**
     *
     * @var integer 
     * @Column (type="integer")
     */
    protected $no;
    
    /**
     *
     * @var boolean
     * @column (type="boolean")
     */
    protected $activo;
    
    /**
     *
     * @var date
     * @Column (type="date")
     */
    protected $creado;
            
    public function __construct() {
        $this->creado = new \DateTime(date('Y-m-d'));
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getTitulo() {
        return $this->titulo;
    }
    
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    
    public function getPregunta() {
        return $this->pregunta;
    }
    
    public function setPregunta($pregunta) {
        $this->pregunta = $pregunta;
    }
    
    public function setRespuesta($respuesta) {
        if($respuesta == 'true') {
            $this->si = $this->si + 1;
        } else {
            $this->no = $this->no + 1;
        }
    }
    
    public function getSi() {
        return $this->si;
    }
    
    public function getNo() {
        return $this->no;
    }
    
    public function getTotalRespuestas() {
        return (int)$this->si + (int)$this->no;
    }
    
    public function getFecha() {
        return date_format($this->creado, 'Y-m-d');
    }
    
    public function getActiva() {
        return $this->activo;
    }
    
    public function setActiva($activa) {
        $this->activo = $activa;
    }
}

