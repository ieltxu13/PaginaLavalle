<?php

class Administracion_LicitacionesController extends Zend_Controller_Action
{

    /**
     * @var Bisna\Application\Container\DoctrineContainer
     *
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
        $query = $this->_em->createQuery('Select l From My\Entity\Licitacion l order by l.creado DESC');

        $licitaciones = $query->getResult();

        $this->view->licitaciones = $licitaciones;
        $this->view->messages = $this->_helper->flashMessenger->getMessages();
    }

    public function nuevaAction()
    {
        $form = new Administracion_Form_LicitacionForm();

        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();

            if ($form->isValid($data)) {

                $licitacion = new My\Entity\Licitacion();

                $licitacion->setNumero($form->numero->getValue());
                $licitacion->setAnio(date('y'));
                $licitacion->setDescripcion($form->descripcion->getValue());
                $licitacion->setFechaDeApertura($this->fechaMysql($form->fecha->getValue()));
                $licitacion->setHoraDeApertura($form->hora->getValue());
                $licitacion->setTipoDeContratacion($form->tipoDeContratacion->getValue());
                $licitacion->setActiva(true);

                $this->_em->persist($licitacion);
                $this->_em->flush();

                $this->_helper->flashMessenger->addMessage('Licitacion Creada');
                $this->_helper->redirector('index');
            }
        }
    }

    public function editarAction()
    {
        $form = new Administracion_Form_LicitacionForm();

        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();

            if ($form->isValid($data)) {

                $licitacion = new My\Entity\Licitacion();

                $licitacion->setNumero($form->numero->getValue());
                $licitacion->setDescripcion($form->descripcion->getValue());
                $licitacion->setFechaDeApertura($this->fechaMysql($form->fecha->getValue()));
                $licitacion->setHoraDeApertura($form->hora->getValue());
                $licitacion->setTipoDeContratacion($form->tipoDeContratacion->getValue());
                $licitacion->setModificado();

                $this->_em->flush();

                $this->_helper->flashMessenger->addMessage('Licitacion Modificada');
                $this->_helper->redirector('index');
            }
        }

        $form->numero->setValue($licitacion->getNumero());
        $form->anio->setValue($licitacion->getAnio());
        $form->descripcion->setValue($licitacion->getDescripcion());
        $form->fecha->setValue($this->fechaMysql($licitacion->getHoraDeApertura()));
        $form->hora->setValue($licitacion->getHoraDeApertura());
        $form->tipoDeContratacion->setValue($licitacion->getTipoDeContratacion());
    }

    public function verAction()
    {
        $licitacion = $this->_em->find('My\Entity\Licitacion', $this->_getParam('id'));

        $this->view->licitacion = $licitacion;
    }

    public function cerrarAction()
    {
        // action body
    }

    public function activarAction()
    {
        $id = $this->_getParam('id');

        $licitacion = $this->_em->find('My\Entity\Licitacion', $id);

        if (!$licitacion) {
            $this->_helper->flashMessenger->addMessage('Error, intente luego');
            $this->_helper->redirector('index');
        }

        $licitacion->setActiva(true);

        $this->_em->flush();

        $this->_helper->flashMessenger->addMessage('La Licitacion "' . $licitacion->getNumero() . '/' . $licitacion->getAnio() . '" ha sido Activada
            , ahora se mostrará en la página');
        $this->_helper->redirector('index');
    }

    public function desactivarAction()
    {
        $id = $this->_getParam('id');

        $licitacion = $this->_em->find('My\Entity\Licitacion', $id);

        if (!$licitacion) {
            $this->_helper->flashMessenger->addMessage('Error, intente luego');
            $this->_helper->redirector('index');
        }

        $licitacion->setActiva(false);

        $this->_em->flush();

        $this->_helper->flashMessenger->addMessage('La Licitacion "' . $licitacion->getNumero() . '/' . $licitacion->getAnio() . '" ha sido Desctivada
            , Esta ahora ya no se mostrará en la página');
        $this->_helper->redirector('index');
    }

    private function fechaMysql($fecha)
    {
        $arr = split("-", $fecha);
        if (count($arr) != 3) {
            return $fecha;
        } else {
            return "$arr[2]-$arr[1]-$arr[0]";
        }
    }

    public function pdfAction()
    {

        $id = $this->_getParam('id');

        $licitacion = $this->_em->find('My\Entity\Licitacion', $id);

        $mailMerge = new Zend_Service_LiveDocx_MailMerge(
                array(
            'username' => 'IAlganaras13',
            'password' => 'culo!tap'
                )
        );

        $mailMerge->setLocalTemplate('pdf/PlantillaLicitacion.rtf');

        $mailMerge->assign('variablesÿHoja1ÿfecha', $this->fechaMysql(date('Y-m-d')));
        $mailMerge->assign('variablesÿHoja1ÿhora', date('H:i'));
        $mailMerge->assign('variablesÿHoja1ÿnumero', $licitacion->getNumero() . '/' . $licitacion->getAnio());
        $mailMerge->assign('variablesÿHoja1ÿdescripcion', $licitacion->getDescripcion());
        $mailMerge->assign('variablesÿHoja1ÿapertura', $this->fechaMysql($licitacion->getFechaDeApertura()));
        $mailMerge->assign('variablesÿHoja1ÿaperturaHora', $licitacion->getHoraDeApertura() . ':00');
        $mailMerge->assign('variablesÿHoja1ÿtipo', $licitacion->getTipoDeContratacion());

        $mailMerge->createDocument();

        $document = $mailMerge->retrieveDocument('pdf');

        $pdf='Licitacion'.$licitacion->getNumero() . '-' . $licitacion->getAnio().'.pdf';
        file_put_contents($pdf, $document);

        unset($mailMerge);
        
        $this->view->pdf = $pdf;
        $this->view->licitacion = $licitacion;
/*
        header("Content-Type: application/pdf");

        header("content-disposition: inline;filename='".$pdf."'");
        
        header("Content-Length: ".filesize($pdf)); 
        readfile($pdf);*/
    }

}

