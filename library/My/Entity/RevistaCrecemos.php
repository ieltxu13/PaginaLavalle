<?php

namespace My\Entity;

/**
 * @Entity
 */

class RevistaCrecemos
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
    protected $imagen;
    
    /**
     * 
     * @var integer
     * @Column(type="integer")
     */
    protected $numero;
    
    public function __construct()
    {
    }
    
    public function getId(){
        return $this->id;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }
    
    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }



}
