<?php

namespace My\Entity;

/**
 * @Entity
 */
class Candidata {

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
     * @Column(type="date")
     */
    protected $fechaNac;

    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $localidad;

    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $ojos;

    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $estatura;

    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $cabello;

    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $estudios;

    /**
     *
     * @var string
     * @Column(type="string", length=255)
     */
    protected $hobby;

    /**
     *
     * @var integer
     * @Column(type="integer")
     */
    protected $votos;

    /**
     * @Column(type="string", length=255, nullable="true")
     *  
     */
    protected $imagenPrincipal;
    

    public function __construct() {
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getFechaNac() {
        return date_format($this->fechaNac, 'Y-m-d');
    }

    public function getEdad() {
        //explode the date to get month, day and year
        $birthDate = explode("-", date_format($this->fechaNac,'d-m-Y'));
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
        return $age;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getVotos() {
        return $this->votos;
    }

    public function getImagenPrincipal() {
        return $this->imagenPrincipal;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setFechaNac($fechaNac) {
        $this->fechaNac = new \DateTime($fechaNac);
    }

    public function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }

    public function setVotos($votos) {
        $this->votos = $votos;
    }

    public function setImagenPrincipal($imagen) {
        $this->imagenPrincipal = $imagen;
    }

    public function getOjos() {
        return $this->ojos;
    }

    public function getEstatura() {
        return $this->estatura;
    }

    public function getCabello() {
        return $this->cabello;
    }

    public function getEstudios() {
        return $this->estudios;
    }

    public function getHobby() {
        return $this->hobby;
    }

    public function setOjos($ojos) {
        $this->ojos = $ojos;
    }

    public function setEstatura($estatura) {
        $this->estatura = $estatura;
    }

    public function setCabello($cabello) {
        $this->cabello = $cabello;
    }

    public function setEstudios($estudios) {
        $this->estudios = $estudios;
    }

    public function setHobby($hobby) {
        $this->hobby = $hobby;
    }
    
    public function votar() {
        $this->votos = $this->votos + 1;
    }

}
