<?php

namespace My\Entity\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class MyEntityNoticiaProxy extends \My\Entity\Noticia implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function getId()
    {
        $this->_load();
        return parent::getId();
    }

    public function setId($id)
    {
        $this->_load();
        return parent::setId($id);
    }

    public function getTitulo()
    {
        $this->_load();
        return parent::getTitulo();
    }

    public function setTitulo($titulo)
    {
        $this->_load();
        return parent::setTitulo($titulo);
    }

    public function getCopete()
    {
        $this->_load();
        return parent::getCopete();
    }

    public function setCopete($copete)
    {
        $this->_load();
        return parent::setCopete($copete);
    }

    public function getContenido()
    {
        $this->_load();
        return parent::getContenido();
    }

    public function setContenido($contenido)
    {
        $this->_load();
        return parent::setContenido($contenido);
    }

    public function getFecha()
    {
        $this->_load();
        return parent::getFecha();
    }

    public function setFecha($fecha)
    {
        $this->_load();
        return parent::setFecha($fecha);
    }

    public function quitarArchivo(\My\Entity\Archivo $archivo)
    {
        $this->_load();
        return parent::quitarArchivo($archivo);
    }

    public function setArchivoPrincipal(\My\Entity\Archivo $archivo)
    {
        $this->_load();
        return parent::setArchivoPrincipal($archivo);
    }

    public function getArchivoPrincipal()
    {
        $this->_load();
        return parent::getArchivoPrincipal();
    }

    public function setArchivoGrande(\My\Entity\Archivo $archivo)
    {
        $this->_load();
        return parent::setArchivoGrande($archivo);
    }

    public function getArchivoGrande()
    {
        $this->_load();
        return parent::getArchivoGrande();
    }

    public function __get($name)
    {
        $this->_load();
        return parent::__get($name);
    }

    public function __set($name, $value)
    {
        $this->_load();
        return parent::__set($name, $value);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'titulo', 'copete', 'contenido', 'fecha', 'archivoPrincipal', 'archivoGrande');
    }
}