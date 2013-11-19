<?php

class Administracion_UsuariosController extends Zend_Controller_Action
{

    /**
     * @var Bisna\Application\Container\DoctrineContainer
     */
    protected $_doctrineContainer = null;

    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $_em = null;

    
    public function init()
    {
        $layout = Zend_Layout::getMvcInstance();
        $layout->setLayout('layoutadministracion');
        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();
    }
    public function indexAction()
    {
        
        $query = $this->_em->createQuery('SELECT u from My\Entity\Usuario u');
        
        $usuarios = $query->getResult();
        
        $this->view->usuarios = $usuarios;
    }


}

