<?php

class Default_IndexController extends Zend_Controller_Action
{

    /**
     * @var Bisna\Application\Container\DoctrineContainer
     */
    protected $_doctrineContainer = null;

    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $_em = null;

    public function init()
    {
        
        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();
    }


    public function indexAction()
    {
        
        $query = $this->_em->createQuery('SELECT n FROM My\Entity\Noticia n WHERE n.archivoGrande IS NOT NULL ORDER BY n.fecha DESC');
        $query->setMaxResults(5);
        $noticiasCarrousel = $query->getResult();   
 
        $this->view->noticiasCarrousel = $noticiasCarrousel;
        
        $query2 = $this->_em->createQuery('SELECT n FROM My\Entity\Noticia n ORDER BY n.fecha DESC');
        $query2->setMaxResults(6);
        $noticiasPrincipales = $query2->getResult();   
 
        $this->view->noticiasPrincipales = $noticiasPrincipales;
        
        $queryEncuesta = $this->_em->createQuery('Select e From My\Entity\Encuesta e where e.activo = ?1');
        $queryEncuesta->setParameter(1, true);

        try {
            $encuesta = $queryEncuesta->getSingleResult();
        
        $this->view->encuesta = $encuesta;
        $this->view->encuestaActiva = 'encuesta'.$encuesta->getId();
        } catch (Exception $exc) {
        }
        if($this->_request->isXmlHttpRequest()){
            
            $this->_helper->layout()->disableLayout();
            $this->_helper->viewRenderer->setNoRender(true);
            
           /// var_dump($this->getRequest()->getParams());die();
            $voto = $this->_getParam('voto');
            $encuesta->setRespuesta($voto);
            $this->_em->flush();
            
            $datos = array('total' => $encuesta->getTotalRespuestas(),
                           'si' => $encuesta->getSi(),
                           'no' => $encuesta->getNo(),
                           'encuesta' => $encuesta->getId());
            
            //para decirle al browser que vamos a mandarle contenido json
            header('Content-Type: application/json;charset=utf-8_spanish_ci');
            echo Zend_Json::encode($datos);
        }
    }


}

