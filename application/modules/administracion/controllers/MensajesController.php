<?php

class Administracion_MensajesController extends Zend_Controller_Action
{

    /**
     * @var Bisna\Application\Container\DoctrineContainer
     *
     *
     */
    protected $_doctrineContainer = null;

    /**
     * @var Doctrine\ORM\EntityManager
     *
     *
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
        $listaDeMensajes = new Administracion_Model_MensajesPaginados();
        $mensajes = $listaDeMensajes->ListMensajes($this->getParam('pagina'));
        
        
        $this->view->mensajes = $mensajes;
        $this->view->paginator = $listaDeMensajes->getPaginator();
        
        
        
    }

    public function leerAction()
    {
        $id = $this->getParam('id');
        
        $mensaje = $this->_em->find('My\Entity\Mensaje', $id);
        
        if(!$mensaje->getLeido()) {
            $mensaje->setLeido(true);
            $this->_em->flush();
        }
        $this->view->mensaje = $mensaje;
    }


}



