<?php

class Default_SeccionesController extends Zend_Controller_Action
{

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

    public function init()
    {

        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();
    }

    public function indexAction()
    {
        // action body
    }

    public function verAction()
    {
        if ($this->_getParam('id')) {
            $id = $this->_getParam('id');
            $subseccion = $this->_em->find('My\Entity\SubSeccion', $id);
        } else {
            $this->_helper->redirector('index', 'index');
        }

        $this->view->subseccion = $subseccion;
    }

    public function galeriaAction()
    {
        $query = $this->_em->createQuery('SELECT i from My\Entity\Imagen i where i.enGaleria = ?1');
        $query->setParameter(1, true);

        $imagenes = $query->getResult();
        $this->view->imagenes = $imagenes;
    }

    public function novedadesAction()
    {

        $query2 = $this->_em->createQuery('SELECT n FROM My\Entity\Noticia n ORDER BY n.fecha DESC');
        $query2->setMaxResults(6);
        $noticiasPrincipales = $query2->getResult();

        $this->view->noticiasPrincipales = $noticiasPrincipales;
    }

    public function hcdAction()
    {

        $subseccion = $this->_em->find('My\Entity\SubSeccion', 9);

        $queryDec = $this->_em->createQuery('Select p from My\Entity\ProyectoHCD p WHERE p.tipo = ?1');
        $queryDec->setParameter(1, 'Declaracion');
        $queryOrd = $this->_em->createQuery('Select p from My\Entity\ProyectoHCD p WHERE p.tipo = ?1');
        $queryOrd->setParameter(1, 'Ordenanza');
        $queryRes = $this->_em->createQuery('Select p from My\Entity\ProyectoHCD p WHERE p.tipo = ?1');
        $queryRes->setParameter(1, 'Resolucion');
        $proyectosDec = $queryDec->getResult();
        $proyectosOrd = $queryOrd->getResult();
        $proyectosRes = $queryRes->getResult();

        $this->view->proyectosDec = $proyectosDec;
        $this->view->proyectosOrd = $proyectosOrd;
        $this->view->proyectosRes = $proyectosRes;
        $this->view->subseccion = $subseccion;
    }

    public function acuerdoAction()
    {
        if (!$this->_request->isXmlHttpRequest()) {
            $query = $this->_em->createQuery('Select a from My\Entity\DocumentoAcuerdo a');
            $acuerdos = $query->getResult();

            $this->view->acuerdos = $acuerdos;

            $select = new Zend_Form_Element_Select('acuerdo');
            foreach ($acuerdos as $acuerdo) {
                $select->addMultiOption($acuerdo->getEjercicio() . $acuerdo->getPeriodo(), 'Ejercicio ' . $acuerdo->getEjercicio() . ' - Período' . $acuerdo->getPeriodo());
            }
            $this->view->select = $select;
        } else {
            $acuerdo = $this->getParam('acuerdo');
            $periodo = substr($acuerdo, 4);
            $ejercicio = substr($acuerdo, 0, 4);

            $query = $this->_em->createQuery('Select a from My\Entity\DocumentoAcuerdo a where a.ejercicio = ?1 AND a.periodo = ?2');
            $query->setParameter(1, $ejercicio);
            $query->setParameter(2, $periodo);
            $acuerdosAjax = $query->getArrayResult();

            $this->_helper->layout()->disableLayout();
            $this->_helper->viewRenderer->setNoRender(true);
            header('Content-Type: application/json;charset=utf-8_spanish_ci');
            echo Zend_Json::encode($acuerdosAjax);
        }
    }

    public function revistaCrecemosAction()
    {
        
        $subseccion = $this->_em->find('My\Entity\SubSeccion', 19);
        $query = $this->_em->createQuery('Select r from My\Entity\RevistaCrecemos r ORDER BY r.numero DESC');
        $revistas = $query->getResult();

        $this->view->revistas = $revistas;
        $this->view->subseccion = $subseccion;
    }

    public function vendimiaAction()
    {
        
        $query = $this->_em->createQuery('Select c From My\Entity\Candidata c ORDER BY c.nombre ASC');
        $candidatas = $query->getResult();
        
        $this->view->candidatas = $candidatas;
        
        if ($this->_request->isXmlHttpRequest()) {

            $this->_helper->layout()->disableLayout();
            $this->_helper->viewRenderer->setNoRender(true);

            /// var_dump($this->getRequest()->getParams());die();
            $id = $this->_getParam('candidata');
            $candidata = $this->_em->find('My\Entity\Candidata',$id);
            $candidata->votar();
            $this->_em->flush();
            
            //para decirle al browser que vamos a mandarle contenido json
            header('Content-Type: application/json;charset=utf-8_spanish_ci');
            echo Zend_Json::encode('voto registrado');
        }
        
    }

    public function galeriaVendimiaAction()
    {
        $query = $this->_em->createQuery('SELECT i from My\Entity\ImagenVendimia i where i.enGaleria = ?1');
        $query->setParameter(1, true);

        $imagenes = $query->getResult();
        $this->view->imagenes = $imagenes;
    }


}




