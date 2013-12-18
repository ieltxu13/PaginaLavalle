<?php

class Administracion_RevistaCrecemosController extends Zend_Controller_Action
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
        
        $query = $this->_em->createQuery('Select r from My\Entity\RevistaCrecemos r');
        $acuerdos = $query->getResult();
        
        $this->view->acuerdos = $acuerdos;
        
    }

    public function subirDocumentosAction() {

        $form = new Administracion_Form_RevistaCrecemosForm();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {

                $revista = new My\Entity\RevistaCrecemos();
                $url = substr(strrchr($form->upload->getFileName(), '/'), 1);
                $urlImagen = substr(strrchr($form->imagen->getFileName(), '/'), 1);
                $form->upload->receive();
                $form->imagen->receive();
                if ($form->upload->isReceived() && $form->imagen->isReceived()) {
                    $revista->setNumero($form->numero->getValue());
                    $revista->setUrl($url);
                    $revista->setImagen($urlImagen);

                    $this->_em->persist($revista);
                    $this->_em->flush();
                    $this->_helper->flashMessenger->addMessage('Revista subida con éxito');
                    $this->_helper->redirector('index');
                } else {
                    $this->_helper->flashMessenger->addMessage('Error al subir el archivo, intente de nuevo');
                    $this->_helper->redirector('index');
                }
            }
        }
    }


}

