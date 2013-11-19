<?php

class Default_MensajesController extends Zend_Controller_Action
{

    /**
     * @var Bisna\Application\Container\DoctrineContainer
     *
     *
     *
     */
    protected $_doctrineContainer = null;

    /**
     * @var Doctrine\ORM\EntityManager
     *
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

    public function nuevoMensajeAction()
    {
        $form = new Administracion_Form_NuevoMensajeForm();
        
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            
            if ($form->isValid($data)) {
                
                $mensaje = new My\Entity\Mensaje();
                
                $mensaje->setDe($form->de->getValue());
                $mensaje->setAsunto($form->asunto->getValue());
                $mensaje->setEmail($form->email->getValue());
                $mensaje->setContenido($form->contenido->getValue());
                $mensaje->setLeido(false);
                
                $this->_em->persist($mensaje);
                $this->_em->flush();
                
                $this->view->enviado = true;
            }
        }
    }

}





