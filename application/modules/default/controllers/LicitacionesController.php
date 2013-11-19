<?php

class Default_LicitacionesController extends Zend_Controller_Action
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

        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();
    }

    public function indexAction()
    {

        $query = $this->_em->createQuery('Select l From My\Entity\Licitacion l
            ORDER BY l.creado DESC');


        $licitaciones = $query->getResult();
        $this->view->licitaciones = $licitaciones;
    }

    public function pdfAction()
    {
        if ($this->_request->isXmlHttpRequest()) {

            $this->_helper->layout()->disableLayout();
            $this->_helper->viewRenderer->setNoRender(true);

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

            $pdf = 'Licitacion' . $licitacion->getNumero() . '-' . $licitacion->getAnio() . '.pdf';
            file_put_contents($pdf, $document);

            unset($mailMerge);
            
            $datos = array('pdf' => $pdf, 'licitacion' => $licitacion);
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json;charset=utf-8_spanish_ci');
            echo Zend_Json::encode($datos);
        }
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
}

