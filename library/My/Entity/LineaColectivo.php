<?php

namespace My\Entity;

/**
 * Description of LineaColectivo
 *
 * @author Ieltxu Algañarás (ieltxu.alganaras@gmail.com)
 */

/**
 * @Entity
 */
class LineaColectivo {
    
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
     * @Column (type = "string", length= 255, nullable="false")
     */
    protected $linea;
    
    /**
     *
     * @ManyToMany(targetEntity="HorarioColectivo", mappedBy="lineas", cascade={"persist"}, fetch="EAGER")
     */
    protected $horarios;
    
    public function __construct() {
        $this->horarios = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getLinea() {
        return $this->linea;
    }

    public function setLinea($linea) {
        $this->linea = $linea;
    }

    public function getHorarios() {
        return $this->horarios;
    }
    
    public function agregarHorario(HorarioColectivo $horario) {
        $this->horarios[] = $horario;
    }
    
    
}
