<?php

/**
 * Description of Mensajes
 *
 * @author Ieltxu
 */
namespace My\Entity;
/**
 * @Entity
 */
class Mensaje {
    
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
    protected $de;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $asunto;
    
    /**
     *
     * @var string
     * @Column(type="text")
     */
    protected $contenido;
    
    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $email;
    
    /**
     * @Column(type="datetime", nullable=false)
     * @Timestamp
     */
    protected $fecha;
    
    /**
     *
     * @var boolean
     * @Column(type="boolean")
     */
    protected $leido;
    
    public function __construct() {
        $this->fecha = new \DateTime(date('Y-m-d H:i:s'));
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getDe() {
        return $this->de;
    }
    
    public function setDe($de) {
        $this->de = $de;
    }
    
    public function getAsunto() {
        return $this->asunto;
    }
    
    public function setAsunto($asunto) {
        $this->asunto = $asunto;
    }
    
    public function getContenido() {
        return $this->contenido;
    }
    
    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getFecha(){
        return date_format($this->fecha, 'Y-m-d');
    }
    
    public function setFecha($fecha){
        $this->fecha = new \DateTime($fecha);
    }
    
    public function getLeido() {
        return $this->leido;
    }
    
    public function setLeido($leido = true) {
        $this->leido = $leido;
    }
}

