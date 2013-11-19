<?php

class Administracion_ImagenesController extends Zend_Controller_Action
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
        $listaDeImagenes = new Default_Model_ImagenesPaginadas();
        $imagenes = $listaDeImagenes->ListImagenes($this->getParam('pagina'),true);
        $this->view->paginator = $listaDeImagenes->getPaginator();
        $this->view->imagenes = $imagenes;
    }

    public function configurargaleriaAction()
    {
        // action body
    }

    public function agregaragaleriaAction()
    {
        
        $id = $this->_getParam('id');
        $imagen = $this->_em->find('My\Entity\Imagen', $id);
        $imagen->setEnGaleria(true);
        $this->_em->flush();
        
        $this->_helper->redirector('index');
    }

    public function quitardegaleriaAction()
    {
        $id = $this->_getParam('id');
        $imagen = $this->_em->find('My\Entity\Imagen', $id);
        $imagen->setEnGaleria(false);
        $this->_em->flush();
        $this->_helper->redirector('index');
    }

    public function galeriaAction()
    {
        $query = $this->_em->createQuery('SELECT i from My\Entity\Imagen i where i.enGaleria = ?1');
        $query->setParameter(1, true);
        
        $imagenes = $query->getResult();
        $this->view->imagenes = $imagenes;
    }

    public function agregarimagenAction()
    {
        $formUpload = new Administracion_Form_ImagenGaleriaForm();
        $this->view->formUpload = $formUpload;
        
        if($this->getRequest()->isPost()){
            
            $data = $this->getRequest()->getPost();
            if($formUpload->isValid($data)){
                $formUpload->upload->receive();   
                
                $imagen = new My\Entity\Imagen();
                
                $descripcion = $formUpload->getElement('descripcion')->getValue();
                //$url = substr(strrchr($formUpload->upload->getFileName(), '\\'),1);
                
                //PARA EL HOST
                $url = substr(strrchr($formUpload->upload->getFileName(), '/'),1);
                //$url = substr($formUpload->upload->getFileName(), 50); 
                
                $imagen->setUrl($url);
                $imagen->setDescripcion($descripcion);
                $imagen->setParaGaleria(true);
                $imagen->setEnGaleria(true);
   
                $this->_em->persist($imagen);
                $this->_em->flush();
                $this->_helper->redirector('index');
            }
        }
    }

    public function modificarDescripcionAction()
    {
        $id = $this->_getParam('id');
        
        $form = new Administracion_Form_DescripcionImagenForm();
        
        $this->view->form = $form;
        
        if($this->getRequest()->isPost()){
            
            $data = $this->getRequest()->getPost();
            if($form->isValid($data)){
                
                $imagen = $this->_em->find('My\Entity\Imagen', $id);
                
                $descripcion = $form->getElement('descripcion')->getValue();
                $imagen->setDescripcion($descripcion);

                $this->_em->flush();
                $this->_helper->redirector('index');
            }
        }
        
    }


}













