<?php

class Administracion_ImagenesController extends Zend_Controller_Action {

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

    public function init() {
        $layout = Zend_Layout::getMvcInstance();
        $layout->setLayout('layoutadministracion');
        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();
    }

    public function indexAction() {
        $listaDeImagenes = new Default_Model_ImagenesPaginadas();
        $imagenes = $listaDeImagenes->ListImagenes($this->getParam('pagina'), true);
        $this->view->paginator = $listaDeImagenes->getPaginator();
        $this->view->imagenes = $imagenes;
    }

    public function configurargaleriaAction() {
        // action body
    }

    public function agregaragaleriaAction() {
        $id = $this->_getParam('id');
        if ($this->_getParam('vendimia')) {
            $imagen = $this->_em->find('My\Entity\ImagenVendimia', $id);
        } else {
            $imagen = $this->_em->find('My\Entity\Imagen', $id);
        }

        $imagen->setEnGaleria(true);
        $this->_em->flush();

        if ($this->_getParam('vendimia')) {
            $this->_helper->redirector('administrar-galeria-vendimia');
        } else {
            $this->_helper->redirector('index');
        }
    }

    public function quitardegaleriaAction() {
        $id = $this->_getParam('id');
        if ($this->_getParam('vendimia')) {
            $imagen = $this->_em->find('My\Entity\ImagenVendimia', $id);
        } else {
            $imagen = $this->_em->find('My\Entity\Imagen', $id);
        }
        $imagen->setEnGaleria(false);
        $this->_em->flush();
        if ($this->_getParam('vendimia')) {
            $this->_helper->redirector('administrar-galeria-vendimia');
        } else {
            $this->_helper->redirector('index');
        }
    }

    public function galeriaAction() {
        $query = $this->_em->createQuery('SELECT i from My\Entity\Imagen i where i.enGaleria = ?1');
        $query->setParameter(1, true);

        $imagenes = $query->getResult();
        $this->view->imagenes = $imagenes;
    }

    public function agregarimagenAction() {
        if ($this->_getParam('vendimia')) {
            $formUpload = new Administracion_Form_ImagenVendimiaForm();
            $vendimia = true;
        } else {
            $formUpload = new Administracion_Form_ImagenGaleriaForm();
        }
        $this->view->formUpload = $formUpload;

        if ($this->getRequest()->isPost()) {

            $data = $this->getRequest()->getPost();
            if ($formUpload->isValid($data)) {
                $formUpload->upload->receive();

                if ($vendimia) {
                    $imagen = new My\Entity\ImagenVendimia();
                } else {
                    $imagen = new My\Entity\Imagen();
                }
                $descripcion = $formUpload->getElement('descripcion')->getValue();
                //$url = substr(strrchr($formUpload->upload->getFileName(), '\'),1);
                //PARA EL HOST
                $url = substr(strrchr($formUpload->upload->getFileName(), '/'), 1);
                //$url = substr($formUpload->upload->getFileName(), 50); 

                $imagen->setUrl($url);
                $imagen->setDescripcion($descripcion);
                $imagen->setParaGaleria(true);
                $imagen->setEnGaleria(true);

                $this->_em->persist($imagen);
                $this->_em->flush();
                if($vendimia) {
                    $this->_helper->redirector('administrar-galeria-vendimia');
                } else {
                    $this->_helper->redirector('index');
                }
            }
        }
    }

    public function modificarDescripcionAction() {
        $id = $this->_getParam('id');

        $form = new Administracion_Form_DescripcionImagenForm();

        $this->view->form = $form;
        if ($this->_getParam('vendimia')) {
            $vendimia = true;
        }
        if ($this->getRequest()->isPost()) {

            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {

                if ($vendimia) {
                    $imagen = $this->_em->find('My\Entity\ImagenVendimia', $id);
                } else {
                    $imagen = $this->_em->find('My\Entity\Imagen', $id);
                }
                $descripcion = $form->getElement('descripcion')->getValue();
                $imagen->setDescripcion($descripcion);

                $this->_em->flush();
                if($vendimia) {
                    $this->_helper->redirector('administrar-galeria-vendimia');
                } else {
                    $this->_helper->redirector('index');
                }
            }
        }
    }

    public function galeriaVendimiaAction() {
        $query = $this->_em->createQuery('SELECT i from My\Entity\ImagenVendimia i where i.enGaleria = ?1');
        $query->setParameter(1, true);

        $imagenes = $query->getResult();
        $this->view->imagenes = $imagenes;
    }

    public function administrarGaleriaVendimiaAction() {
        $listaDeImagenes = new Default_Model_ImagenesVendimiaPaginadas();
        $imagenes = $listaDeImagenes->ListImagenes($this->getParam('pagina'), true);
        $this->view->paginator = $listaDeImagenes->getPaginator();
        $this->view->imagenes = $imagenes;
    }

}
