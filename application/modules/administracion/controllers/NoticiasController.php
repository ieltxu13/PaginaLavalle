<?php

class Administracion_NoticiasController extends Zend_Controller_Action
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
        $query = $this->_em->createQuery('SELECT n FROM My\Entity\Noticia n');
        $noticias = $query->getResult();
        //$modeloNoticias = new Default_Model_DbTable_Noticia();

        $this->view->noticias = $noticias;
    }

    public function nuevoAction()
    {
        $form = new Administracion_Form_NoticiaForm();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {

            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {

                $this->guardarNoticia($form, true);
                $this->_helper->redirector('index');
            } else {
                $this->view->mensajesform1 = $form->getErrors();
            }
        }
    }

    public function agregarimagenAction()
    {
        
        
        if ($this->_getParam('id')) {
            $id = $this->_getParam('id');
            $noticia = $this->_em->find('My\Entity\Noticia', $id);
            $this->view->noticia = $noticia;
        } else {
            throw new Exception('ha ocurrido un error, intente de vuelta y si el error consiste comuníquese con el programador');
        }

        if ($this->_getParam('grande')) {
            $cambiandoImagenGrande = true;
            $formUpload = new Administracion_Form_ImagenGrandeNoticiaForm();
            
        } else {
            $cambiandoImagenGrande = false;
            $formUpload = new Administracion_Form_UploadForm();
        }
        $this->view->formUpload = $formUpload;
        $this->view->cambiandoImagenGrande = $cambiandoImagenGrande;
        
        if ($this->getRequest()->isPost()) {

            $data = $this->getRequest()->getPost();
            if ($formUpload->isValid($data)) {
                $formUpload->upload->receive();

                $imagen = new My\Entity\Imagen();

                $descripcion = $formUpload->getElement('descripcion')->getValue();
                //$url = substr(strrchr($formUpload->upload->getFileName(), '\\'), 1);
                
                //PARA EL HOST
                $url = substr(strrchr($formUpload->upload->getFileName(), '/'), 1);

                $imagen->setUrl($url);
                $imagen->setDescripcion($descripcion);
                $imagen->setParaGaleria(false);

                //**BORRO LA IMAGEN ANTERIOR DEL SERVIDOR Y LA ENTIDAD DE LA BD Y REEMPLAZO**//
                if ($cambiandoImagenGrande) {
                    if ($noticia->getArchivoGrande()) {
                    $urlImagenParaBorrar = $noticia->getArchivoGrande()->getUrl();
                    $this->_em->remove($noticia->getArchivoGrande());
                    unlink(APPLICATION_PATH . '/recursos/noticias/' . $urlImagenParaBorrar);
                    }
                    $noticia->setArchivoGrande($imagen);
                } else {
                    if($noticia->getArchivoPrincipal()) {
                    $urlImagenParaBorrar = $noticia->getArchivoPrincipal()->getUrl();
                    $this->_em->remove($noticia->getArchivoPrincipal());
                    unlink(APPLICATION_PATH . '/recursos/noticias/' . $urlImagenParaBorrar);
                    }
                    $noticia->setArchivoPrincipal($imagen);
                }
                //**BORRO LA IMAGEN ANTERIOR DEL SERVIDOR Y LA ENTIDAD DE LA BD **//


                $this->_em->persist($noticia);
                $this->_em->flush();
                $this->_helper->redirector('index');
            }
        }
    }

    public function agregarvideoAction()
    {
     //Sin Implementar
    }

    public function editarAction()
    {

        $form = new Administracion_Form_NoticiaForm();
        $this->view->form = $form;

        if ($this->_getParam('id')) {
            $id = $this->_getParam('id');
        } else {
            $this->_helper->redirector('index');
        }
        /**
         * var My\Entity\Noticia
         */
        $noticia = $this->_em->find('My\Entity\Noticia', $id);
        if (!$noticia) {
            $this->_helper->redirector('index');
        }

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {

                $noticia->setTitulo($form->titulo->getValue());
                $noticia->setContenido($form->contenido->getValue());
                $noticia->setCopete($form->copete->getValue());

                $this->_em->flush();

                $this->forward('ver', 'noticias', 'administracion', array('id' => $noticia->getId()));
            }
        }
        $this->view->noticia = $noticia;
        $form->titulo->setValue($noticia->getTitulo());
        $form->copete->setValue($noticia->getCopete());
        $form->contenido->setValue($noticia->getContenido());
    }

    private function guardarNoticia($form, $esAlta = false)
    {
        $noticia = new My\Entity\Noticia();
        //$modeloNoticia = new Default_Model_DbTable_Noticia();

        $titulo = $form->titulo->getValue();
        $copete = $form->copete->getValue();
        $contenido = $form->contenido->getValue();
        $noticia->setTitulo($titulo);
        $noticia->setCopete($copete);
        $noticia->setContenido($contenido);
        if ($esAlta) {
            $noticia->setFecha(date('Y-m-d'));
        }
        $this->_em->persist($noticia);
        $this->_em->flush();
    }

    public function verAction()
    {

        if ($this->_getParam('id')) {
            $id = $this->_getParam('id');
        } else {
            $this->_helper->redirector('index');
        }
        /**
         * var My\Entity\Noticia
         */
        $noticia = $this->_em->find('My\Entity\Noticia', $id);
        if (!$noticia) {
            $this->_helper->redirector('index');
        }

        $this->view->noticia = $noticia;
    }

}

