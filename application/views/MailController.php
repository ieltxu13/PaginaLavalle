<?php

class Default_MailController extends Zend_Controller_Action
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
        
    }

    public function enviarMailAction()
    {
        
        if (!$this->_getParam('id')) {

            $this->_helper->redirector('index');

            $this->_helper->flashMessenger->addMessages('error');
        }

        $idInforme = $this->getParam('id');
        $informe = $this->_em->find('My\Entity\Informe', $idInforme);
        
        $imagenes = $informe->getImagenes();
        
        $imagenesArray = array();
        if($imagenes->count() > 0) {
            foreach($imagenes as $imagen) {
                $imagenAux = array();
                $imagenAux['url'] = $imagen->getNombre();
                $imagenAux['descripcion'] = htmlentities($imagen->getResumen());
                $imagenesArray[] = $imagenAux;
            }
        }
        
        $queryContactos = $this->_em->createQuery('SELECT c FROM My\Entity\Contacto c');
        $contactosAux = $queryContactos->getResult();
        $contactos = array();

        if (count($contactosAux) > 0) {
            foreach($contactosAux as $contacto) {
                $contactoArray = array(
                  'mail' => $contacto->getEmail(),
                  'persona' => $contacto->getNombre()
                );
                
                $contactos[] = $contactoArray;
            }
        }
        
        foreach ($contactos as $contacto) {
            $mail = new My_HtmlMailer();
            $mail->clearFrom();
        $mail->setSubject('MOL NEWSLETTER TEST')
                ->setFrom('contacto@azdesarrollo.com.ar','AZ desarrollo')
                ->addTo($contacto['mail'],$contacto['persona']);
        
        
        $mail->setViewParam('titulo', htmlentities($informe->getTitulo()));
        $mail->setViewParam('copete', htmlentities($informe->getCopete()));
        $mail->setViewParam('resumen', htmlentities($informe->getResumen()));
        $mail->setViewParam('imagenes', $imagenesArray);
        $mail->sendHtmlTemplate('test.phtml');
        }
        
    }


}



