<?php

class Administracion_EncuestasController extends Zend_Controller_Action
{

    /**
     * @var Bisna\Application\Container\DoctrineContainer
     *
     */
    protected $_doctrineContainer = null;

    /**
     * @var Doctrine\ORM\EntityManager
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
        $query = $this->_em->createQuery('Select e From My\Entity\Encuesta e order by e.creado DESC');

        $encuestas = $query->getResult();

        $this->view->encuestas = $encuestas;
        $this->view->messages = $this->_helper->flashMessenger->getMessages();
    }

    public function nuevaAction()
    {
        $form = new Administracion_Form_EncuestaForm();

        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams();

            if ($form->isValid($data)) {

                $encuesta = new My\Entity\Encuesta();

                $encuesta->setTitulo($form->titulo->getValue());
                $encuesta->setPregunta($form->titulo->getValue());
                $encuesta->setActiva(false);
                $encuesta->setRespuesta(false);
                $encuesta->setRespuesta(true);

                $this->_em->persist($encuesta);
                $this->_em->flush();

                $this->_helper->flashMessenger->addMessage('Encuesta Creada');
                $this->_helper->redirector('index');
            }
        }
    }

    public function verAction()
    {
        $id = $this->_getParam('id');

        $encuesta = $this->_em->find('My\Entity\Encuesta', $id);

        if ($encuesta) {
            $this->view->encuesta = $encuesta;
        } else {
            $this->_helper->flashMessenger->addMessage('Error, intente luego');
            $this->_helper->redirector('index');
        }
    }

    public function activarAction()
    {
        $id = $this->_getParam('id');

        $encuesta = $this->_em->find('My\Entity\Encuesta', $id);

        if (!$encuesta) {
            $this->_helper->flashMessenger->addMessage('Error, intente luego');
            $this->_helper->redirector('index');
        }

        $query = $this->_em->createQuery('Select e From My\Entity\Encuesta e where e.activo = ?1');
        $query->setParameter(1, true);
        
        try{
        $encuestaADesactivar = $query->getSingleResult();
        $encuestaADesactivar->setActiva(false);
        }  catch (Exception $ex){
            
        }
        

        $encuesta->setActiva(true);

        $this->_em->flush();

        $this->_helper->flashMessenger->addMessage('La Encuesta "' . $encuesta->getTitulo() . '" ha sido Activada
            , Esta será ahora la que se muestre en la página');
        $this->_helper->redirector('index');
    }

    public function desactivarAction()
    {
        $id = $this->_getParam('id');

        $encuesta = $this->_em->find('My\Entity\Encuesta', $id);

        if (!$encuesta) {
            $this->_helper->flashMessenger->addMessage('Error, intente luego');
            $this->_helper->redirector('index');
        }
        
        $encuesta->setActiva(false);

        $this->_em->flush();

        $this->_helper->flashMessenger->addMessage('La Encuesta "' . $encuesta->getTitulo() . '" ha sido Desctivada
            , Esta ahora ya no se mostrará en la página');
        $this->_helper->redirector('index');
    }

    public function editarAction()
    {
        $form = new Administracion_Form_EncuestaForm();

        $id = $this->_getParam('id');

        $encuesta = $this->_em->find('My\Entity\Encuesta', $id);
        
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams();

            if ($form->isValid($data)) {

                $encuesta->setTitulo($form->titulo->getValue());
                $encuesta->setPregunta($form->titulo->getValue());
                
                $this->_em->flush();

                $this->_helper->flashMessenger->addMessage('Encuesta Editada');
                $this->_helper->redirector('index');
            }
        }
        
        $form->titulo->setValue($encuesta->getTitulo());
        $form->pregunta->setValue($encuesta->getPregunta());
        
    }


}





