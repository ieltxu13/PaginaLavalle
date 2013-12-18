<?php

namespace My\Entity;

/**
 * Description of ProyectoHCD
 *
 * @author Ieltxu Algañarás (ieltxu.alganaras@gmail.com)
 */

/**
 * @Entity
 */
class ProyectoHCD {
    
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
     * @Column (type="string",length=255)
     */
    protected $tipo;
       
    /**
     *
     * @var string
     * @Column (type="string",length=255)
     */
    protected $titulo;
    
    /**
     *
     * @var string
     * @Column (type="string",length=255)
     */
    protected $resumen;
    
    /**
     *
     * @var string
     * @Column (type="string",length=255)
     */
    protected $documento;
    
    public function getId() {
        return $this->id;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getResumen() {
        return $this->resumen;
    }

    public function getDocumento() {
        return $this->documento;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setResumen($resumen) {
        $this->resumen = $resumen;
    }

    public function setDocumento($documento) {
        $this->documento = $documento;
    }


}
