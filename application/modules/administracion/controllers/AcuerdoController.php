<?php

class Administracion_AcuerdoController extends Zend_Controller_Action {

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
        
        $query = $this->_em->createQuery('Select a from My\Entity\DocumentoAcuerdo a');
        $acuerdos = $query->getResult();
        
        $this->view->acuerdos = $acuerdos;
        
    }

    public function subirDocumentosAction() {

        $form = new Administracion_Form_Acuerdo3949Form();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {

                $acuerdo = new My\Entity\DocumentoAcuerdo();
                $url = substr(strrchr($form->upload->getFileName(), '/'), 1);

                $form->upload->receive();
                if ($form->upload->isReceived()) {
                    $acuerdo->setDescripcion($form->descripcion->getValue());
                    $acuerdo->setEjercicio($form->ejercicio->getValue());
                    $acuerdo->setPeriodo($form->periodo->getValue());
                    $acuerdo->setUrlDocumento($url);

                    $this->_em->persist($acuerdo);
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
