<?php

class Administracion_HcdController extends Zend_Controller_Action
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

    public function init() {
        $layout = Zend_Layout::getMvcInstance();
        $layout->setLayout('layoutadministracion');
        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();
    }

    public function indexAction() {
        
        $query = $this->_em->createQuery('Select p from My\Entity\ProyectoHCD p');
        $proyectos = $query->getResult();
        
        $this->view->proyectos = $proyectos;
        
    }

    public function subirDocumentosAction() {

        $form = new Administracion_Form_ProyectoForm();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {

                $proyecto = new My\Entity\ProyectoHCD();
                $url = substr(strrchr($form->upload->getFileName(), '/'), 1);

                $form->upload->receive();
                if ($form->upload->isReceived()) {
                    $proyecto->setTitulo($form->titulo->getValue());
                    $proyecto->setResumen($form->descripcion->getValue());
                    $proyecto->setTipo($form->tipo->getValue());
                    $proyecto->setDocumento($url);

                    $this->_em->persist($proyecto);
                    $this->_em->flush();
                    $this->_helper->flashMessenger->addMessage('Documento subido con éxito');
                    $this->_helper->redirector('index');
                } else {
                    $this->_helper->flashMessenger->addMessage('Error al subir el archivo, intente de nuevo');
                    $this->_helper->redirector('index');
                }
            }
        }
    }

}

