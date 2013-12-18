<?php

namespace My\Entity;

/**
 * Description of HorarioColectivo
 *
 * @author Ieltxu Algañarás (ieltxu.alganaras@gmail.com)
 */

/**
 * @Entity
 */
class HorarioColectivo {
    
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
    protected $trayecto;
    
    /**
     *
     * @Column (type = "time", length=255, nullable="false")
     */
    protected $horario;
    
    /**
     * 
     * @var string
     * @Column(type="string", length=255, nullable="false")
     */
    protected $dias;
    
    /**
     * 
     * @var string
     * @Column(type="string", length=255, nullable="false")
     */
    protected $observaciones;
    
    /**
     *
     * @ManyToMany(targetEntity="LineaColectivo", inversedBy="horarios")
     */
    protected $lineas;
    
    /**
     * 
     * @var string
     * @Column(type="string", length=255, nullable="false")
     */
    protected $desde;
    
    public function __construct() {
        $this->lineas = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getTrayecto() {
        return $this->trayecto;
    }

    public function setTrayecto($trayecto) {
        $this->trayecto = $trayecto;
    }

    public function setLinea($linea) {
        $this->linea = $linea;
    }
    
    public function getHorario() {
        return date_format($this->fecha, 'H:i:s');
    }

    public function getDias() {
        return $this->dias;
    }

    public function setHorario($horario) {
        $this->horario = new \DateTime($horario);
    }

    public function setDias($dias) {
        $this->dias = $dias;
    }
    
    public function getObservaciones() {
        return $this->observaciones;
    }

    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }
    
    public function getDesde() {
        return $this->desde;
    }

    public function setDesde($desde) {
        $this->desde = $desde;
    }

    public function getLineas() {
        return $this->lineas;
    }
    
    public function agregarLinea(LineaColectivo $horario) {
        $this->lineas[] = $horario;
    }
    
    
}
