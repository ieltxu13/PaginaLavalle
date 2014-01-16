<?php

class Administracion_ColectivosController extends Zend_Controller_Action
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
        $form = new Administracion_Form_FiltroHorariosForm();
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            var_dump($this->getRequest()->getParams());
            $linea = $this->getParam('lineas');
            $trayecto = $this->getParam('trayecto');
            $desde = $this->_getParam('desde');
            
            $qb = $this->_em->createQueryBuilder();
            $qb->select('h,l')
                ->from('My\Entity\HorarioColectivo','h')
                ->leftJoin('h.lineas', 'l');
            $qb->where('h.desde = :desde')
                    ->setParameter('desde', $desde);
            
            if($linea != 'Todos') {
                $qb->andWhere('l.linea = :linea')
                        ->setParameter('linea', $linea);
            }
            if($trayecto != 'Todos') {
                $qb->andWhere('h.trayecto = :trayecto')
                        ->setParameter('trayecto', $trayecto);
            }
            $query = $qb->getQuery();
            $horarios = $query->getResult();
            
            $this->view->horarios = $horarios;
                    
        }else {
            $query = $this->_em->createQuery('Select h from My\Entity\HorarioColectivo h');
        $horarios = $query->getResult();
        $this->view->horarios = $horarios;
        }
        
    }

    public function nuevaLineaAction()
    {
        // action body
    }

    public function nuevoHorarioAction()
    {
        $this->view->messages = $this->_helper->flashMessenger->getMessages();
        $form = new Administracion_Form_HorarioColectivoForm();
        $this->view->form = $form;
        
        $querylineas = $this->_em->createQuery('Select l from My\Entity\LineaColectivo l ORDER BY l.linea ASC');
        
        $lineas = $querylineas->getResult();
        
        $lineasSelect = array();
        foreach ($lineas as $linea) {
            $lineasSelect[$linea->getId()] = $linea->getLinea();
        }
        
        $form->lineas->setMultiOptions($lineasSelect);
        
        if($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if($form->isValid($data)) {
                $l = $this->_em->find('My\Entity\LineaColectivo',$form->lineas->getValue());
                $horario = new My\Entity\HorarioColectivo();
                
                $horario->agregarLinea($l);
                $horario->setDias($form->dias->getValue());
                $horario->setTrayecto($form->trayecto->getValue());
                $horario->setHorario($form->horario->getValue());
                $horario->setObservaciones($form->observaciones->getValue());
                $horario->setDesde($form->desde->getValue());
                $l->agregarHorario($horario);
                
                $this->_em->flush();
                
                $this->_helper->flashMessenger->addMessage('Horario Creado!');
                $this->_helper->redirector('nuevo-horario');
            }
        }
    }

    public function modificarHoraAction()
    {
        if ($this->_request->isXmlHttpRequest()) {

            $this->_helper->layout()->disableLayout();
            $this->_helper->viewRenderer->setNoRender(true);

            $id = $this->_getParam('id');
            $valor = $this->getParam('valor');
            
            $horario = $this->_em->find('My\Entity\HorarioColectivo',$id);
            $horario->setHorario($valor);
            
            $this->_em->flush();
            header('Content-Type: application/json;charset=utf-8_spanish_ci');
            echo Zend_Json::encode($valor);
        }
    }


}







