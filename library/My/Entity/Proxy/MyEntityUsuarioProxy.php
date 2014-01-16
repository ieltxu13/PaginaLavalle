<?php

namespace My\Entity\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class MyEntityUsuarioProxy extends \My\Entity\Usuario implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    private function _load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    
    public function setId($id)
    {
        $this->_load();
        return parent::setId($id);
    }

    public function getId()
    {
        $this->_load();
        return parent::getId();
    }

    public function setNombre($nombre)
    {
        $this->_load();
        return parent::setNombre($nombre);
    }

    public function getNombre()
    {
        $this->_load();
        return parent::getNombre();
    }

    public function setApellido($apellido)
    {
        $this->_load();
        return parent::setApellido($apellido);
    }

    public function getApellido()
    {
        $this->_load();
        return parent::getApellido();
    }

    public function setUsuario($usuario)
    {
        $this->_load();
        return parent::setUsuario($usuario);
    }

    public function getUsuario()
    {
        $this->_load();
        return parent::getUsuario();
    }

    public function setClave($clave)
    {
        $this->_load();
        return parent::setClave($clave);
    }

    public function getClave()
    {
        $this->_load();
        return parent::getClave();
    }

    public function setRol($rol)
    {
        $this->_load();
        return parent::setRol($rol);
    }

    public function getRol()
    {
        $this->_load();
        return parent::getRol();
    }

    public function getUltimoAcceso()
    {
        $this->_load();
        return parent::getUltimoAcceso();
    }

    public function setUltimoAcceso()
    {
        $this->_load();
        return parent::setUltimoAcceso();
    }

    public function getCreado()
    {
        $this->_load();
        return parent::getCreado();
    }

    public function setCreado($fecha)
    {
        $this->_load();
        return parent::setCreado($fecha);
    }

    public function getModificado()
    {
        $this->_load();
        return parent::getModificado();
    }

    public function setModificado($fecha)
    {
        $this->_load();
        return parent::setModificado($fecha);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'nombre', 'apellido', 'usuario', 'clave', 'rol', 'ultimoAcceso', 'creado', 'modificado');
    }
}