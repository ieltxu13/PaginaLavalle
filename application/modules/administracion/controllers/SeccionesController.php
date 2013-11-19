<?php

class Administracion_SeccionesController extends Zend_Controller_Action
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
        // action body
    }

    public function nuevaseccionAction()
    {
        $form = new Administracion_Form_SeccionForm();
        $this->view->form = $form;
        $ubicacion = $this->_getParam('ubicacion');
        if ($this->getRequest()->isPost()){
            $data = $this->getRequest()->getPost();
            
            if ($form->isValid($data)) {
                
                $seccion = new My\Entity\Seccion();
                $seccion->setNombre($form->nombre->getValue());
                $seccion->setFecha(date('Y-m-d'));
                $seccion->setUbicacion($ubicacion);
                $this->_em->persist($seccion);
                $this->_em->flush();
                
                $session = new Zend_Session_Namespace('secciones');
                $session->unsetAll();
                $this->_helper->redirector('index');
            }
        }
    }

    public function nuevasubseccionAction()
    {
        $form = new Administracion_Form_SubseccionForm();
        
        $query = $this->_em->createQuery('SELECT n FROM My\Entity\Seccion n');
        $secciones = $query->getResult();
        $seccionesSelect = array();
        foreach ($secciones as $seccion){
            $seccionesSelect[$seccion->getId()] = $seccion->getNombre();
        }
        $form->getElement('seccionesPadre')->setMultiOptions($seccionesSelect);
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()){
            $data = $this->getRequest()->getPost();
            
            if ($form->isValid($data)) {
                
                $subSeccion = new My\Entity\SubSeccion();
                
                $subSeccion->setNombre($form->nombre->getValue());
                $subSeccion->setContenido($form->contenido->getValue());
                $subSeccion->setFecha(date('Y-m-d'));
                
                foreach ($form->seccionesPadre->getValue() as $idPadreSeleccionado)
                {
                    $seccion = $this->_em->find('My\Entity\Seccion', $idPadreSeleccionado);
                    $subSeccion->setSeccionPadre($seccion);  
                }
                
                $this->_em->flush();
                $session = new Zend_Session_Namespace('secciones');
                $session->unsetAll();
                $this->_helper->redirector('index');
            }
        }
    }

    public function listaseccionesAction()
    {
        $query = $this->_em->createQuery('SELECT s from My\Entity\Seccion s');
        
        $secciones = $query->getResult();
        $this->view->secciones = $secciones;
    }

    public function listasubseccionesAction()
    {
        $query = $this->_em->createQuery('SELECT ss from My\Entity\SubSeccion ss');
        
        $subsecciones = $query->getResult();
        $this->view->subsecciones = $subsecciones;
    }

    public function editarsubseccionAction()
    {
        $form = new Administracion_Form_SubseccionForm();
        $this->view->form = $form;

        $id = $this->_getParam('id');
        $form->removeElement('seccionesPadre');
        $form->id->setValue($id);
        
        if ($this->getRequest()->isPost()){
            $data = $this->getRequest()->getPost();
            
            if ($form->isValid($data)) {
                
                $subSeccion = $this->_em->find('My\Entity\SubSeccion', $id);
                
                $subSeccion->setNombre($form->nombre->getValue());
                $subSeccion->setContenido($form->contenido->getValue());
                
                $this->_em->flush();
                $this->_helper->redirector('listasubsecciones');
            }
        }
        $subSeccion = $this->_em->find('My\Entity\SubSeccion', $id);
        $form->id->setValue($id);
        $form->nombre->setValue($subSeccion->getNombre());
        $form->contenido->setValue($subSeccion->getContenido());
    }

    public function eliminarsubseccionAction()
    {
        // action body
    }

    public function verAction()
    {
        if ($this->_getParam('id')){
            $id = $this->_getParam('id');
            $subseccion = $this->_em->find('My\Entity\SubSeccion', $id);
        }else {
            $this->_helper->redirector('index','noticias','administracion');
        }
        
        $this->view->subseccion = $subseccion;
    }

    public function imagenesAction()
    {
        $upload = new Administracion_Form_ImagenSeccionesForm();
        $this->view->form = $upload;
        
        if ($this->_getParam('id')){
            $id = $this->_getParam('id');
            $subseccion = $this->_em->find('My\Entity\SubSeccion', $id);
        }else {
             $this->_helper->redirector('index','noticias','administracion');
        }
        
        if($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if($upload->isValid($data)) {
                $upload->upload->receive();   
                
                $imagen = new My\Entity\Imagen();
                
                $descripcion = $upload->getElement('descripcion')->getValue();
                
                //$url = substr(strrchr($upload->upload->getFileName(), '\\'),1);
                
                //PARA EL HOST
                $url = substr(strrchr($upload->upload->getFileName(), '/'),1);
                
                
                $imagen->setUrl($url);
                $imagen->setDescripcion($descripcion);
                $imagen->setParaGaleria(false);
                $subseccion->agregarImagen($imagen);
                
                if($upload->getAttrib('imagen')) {
                    $imagenAReemplazar = $this->_em->find('My\Entity\Imagen',$upload->getAttrib('imagen'));
                    
                    $subseccion->quitarImagen($imagenAReemplazar);
                    unlink(APPLICATION_PATH . '/recursos/secciones/' . $imagenAReemplazar->getUrl());
                    $this->_em->remove($imagenAReemplazar);
                }
                $this->_em->flush();
                $this->_helper->redirector('ver','secciones','administracion',array('id'=>$id));
            }
        }
        
        $this->view->subseccion = $subseccion;
    }

    public function seleccionarimagenAction()
    {
        if ($this->_getParam('id')){
            $id = $this->_getParam('id');
            $subseccion = $this->_em->find('My\Entity\SubSeccion', $id);
        }else {
             $this->_helper->redirector('index','noticias','administracion');
        }
        
        $listaDeImagenes = new Default_Model_ImagenesPaginadas();
        $imagenes = $listaDeImagenes->ListImagenes($this->getParam('pagina'),false);
        $this->view->paginator = $listaDeImagenes->getPaginator();
        $this->view->imagenes = $imagenes;
        $this->view->subseccion = $subseccion;
    }

    public function seleccionarAction()
    {
        if ($this->_getParam('id') && $this->_getParam('idimagen')){
            $id = $this->_getParam('id');
            $subseccion = $this->_em->find('My\Entity\SubSeccion', $id);
            $idimagen = $this->_getParam('idimagen');
            $imagen = $this->_em->find('My\Entity\Imagen',$idimagen);
        }else {
             $this->_helper->redirector('index','noticias','administracion');
        }
        
        $subseccion->agregarImagen($imagen);
        $this->_em->flush();
        
        $this->_helper->redirector('ver','secciones','administracion',array('id'=>$id));
               
    }

    public function quitarimagenAction()
    {
        if ($this->_getParam('id') && $this->_getParam('idimagen')){
            $id = $this->_getParam('id');
            $subseccion = $this->_em->find('My\Entity\SubSeccion', $id);
            $idimagen = $this->_getParam('idimagen');
            $imagen = $this->_em->find('My\Entity\Imagen',$idimagen);
        }else {
            $this->_helper->redirector('index','noticias','administracion');
        }
        
        $subseccion->quitarImagen($imagen);
        unlink(APPLICATION_PATH . '/recursos/secciones/' . $imagen->getUrl());
        $this->_em->remove($imagen);
        $this->_em->flush();
        
        $this->_helper->redirector('ver','secciones','administracion',array('id'=>$id));
    }

    public function editarseccionAction()
    {
        $form = new Administracion_Form_SeccionForm();
        $this->view->form = $form;

        $id = $this->_getParam('id');
        
        $form->id->setValue($id);
        
        if ($this->getRequest()->isPost()){
            $data = $this->getRequest()->getPost();
            
            if ($form->isValid($data)) {
                
                $seccion = $this->_em->find('My\Entity\Seccion', $id);
                
                $seccion->setNombre($form->nombre->getValue());
                
                $this->_em->flush();
                $this->_helper->redirector('listasecciones');
            }
        }
        $seccion = $this->_em->find('My\Entity\Seccion', $id);
        $form->id->setValue($id);
        $form->nombre->setValue($seccion->getNombre());
    }


}







































