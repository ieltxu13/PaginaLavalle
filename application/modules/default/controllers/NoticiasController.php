<?php

class Default_NoticiasController extends Zend_Controller_Action
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
        $contextSwitch = $this->_helper->getHelper('contextSwitch');
            $contextSwitch->addActionContext('todas', 'json')
                    ->initContext();
        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();
    }

    public function indexAction()
    {
        // action body
    }

    public function noticiaAction()
    {
        $form = new Administracion_Form_NoticiaForm();
       $this->view->form = $form;
       
       if ($this->_getParam('id')) {
           $id = $this->_getParam('id');
       }else{
           $this->_helper->redirector('index');
       }
       /**
        * var My\Entity\Noticia
        */
       $noticia = $this->_em->find('My\Entity\Noticia', $id);
       if(!$noticia){
           $this->_helper->redirector('index','index');
       }
       
       $this->view->noticia = $noticia;
    }

    public function todasAction()
    {
        
        $listaDeNoticias = new Default_Model_NoticiasPaginadas();
        $noticias = $listaDeNoticias->ListNoticias($this->getParam('pagina',1));
        $this->view->noticias = $noticias;
        $this->view->paginator = $listaDeNoticias->getPaginator();

        /* PARA TRABAJAR EL PAGINADOR CON AJAX
          if (!$this->_request->isXmlHttpRequest()) {
         
            $this->view->paginator = $listaDeNoticias->getPaginator();
        } else {
            $this->_helper->layout()->disableLayout();
            $this->_helper->viewRenderer->setNoRender(true);
            $this->view->currentPage = $listaDeNoticias->getPaginator()->getCurrentPageNumber();
        }*/
    }


}





