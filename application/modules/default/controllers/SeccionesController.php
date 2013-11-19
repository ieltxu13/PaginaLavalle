<?php

class Default_SeccionesController extends Zend_Controller_Action
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
        
        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();
    }

    public function indexAction()
    {
        // action body
    }

    public function verAction()
    {
        if ($this->_getParam('id')){
            $id = $this->_getParam('id');
            $subseccion = $this->_em->find('My\Entity\SubSeccion', $id);
        }else {
            $this->_helper->redirector('index','index');
        }
        
        $this->view->subseccion = $subseccion;
    }

    public function galeriaAction()
    {
        $query = $this->_em->createQuery('SELECT i from My\Entity\Imagen i where i.enGaleria = ?1');
        $query->setParameter(1, true);
        
        $imagenes = $query->getResult();
        $this->view->imagenes = $imagenes;
    }

    public function novedadesAction()
    {
        
        $query2 = $this->_em->createQuery('SELECT n FROM My\Entity\Noticia n ORDER BY n.fecha DESC');
        $query2->setMaxResults(6);
        $noticiasPrincipales = $query2->getResult();   
 
        $this->view->noticiasPrincipales = $noticiasPrincipales;
        
        
    }

}







