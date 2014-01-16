<?php

class Administracion_VendimiaController extends Zend_Controller_Action
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

        $query = $this->_em->createQuery('Select c From My\Entity\Candidata c');
        $candidatas = $query->getResult();

        $this->view->candidatas = $candidatas;

        $this->view->messages = $this->_helper->flashMessenger->getMessages();
    }

    public function nuevaAction()
    {
        $form = new Administracion_Form_CandidataForm();

        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();

            if ($form->isValid($data)) {

                $candidata = new My\Entity\Candidata();

                $candidata->setNombre($form->nombre->getValue());
                $candidata->setFechaNac($this->fechaMysql($form->edad->getValue()));
                $candidata->setEstatura($form->estatura->getValue());
                $candidata->setEstudios($form->estudios->getValue());
                $candidata->setHobby($form->hobby->getValue());
                $candidata->setCabello($form->cabello->getValue());
                $candidata->setOjos($form->ojos->getValue());
                $candidata->setLocalidad($form->localidad->getValue());
                $candidata->setVotos(0);

                $this->_em->persist($candidata);
                $this->_em->flush();

                $this->_helper->flashMessenger->addMessage('Candidata Guardada con éxito');
                $this->_helper->redirector('index');
            }
        }
    }

    public function imagenAction()
    {
        if(!$this->_getParam('id')) {
            $this->_helper->flashMessenger->addMessage('Error, intente de nuevo');
            $this->_helper->redirector('index');
        }
        $form = new Administracion_Form_ImagenCandidataForm();
        $this->view->form = $form;

        $candidata = $this->_em->find('My\Entity\Candidata', $this->_getParam('id'));
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {
                $form->upload->receive();

                $imagen = new My\Entity\Imagen();

                //$url = substr(strrchr($upload->upload->getFileName(), '\'),1);
                //PARA EL HOST
                $url = substr(strrchr($form->upload->getFileName(), '/'), 1);


                $imagen->setUrl($url);
                $imagen->setDescripcion('Vendimia');
                $imagen->setParaGaleria(false);
                $candidata->setImagenPrincipal($url);

                $this->_em->flush();
                $this->_helper->flashMessenger->addMessage('Imagen Guardada con éxito');
                $this->_helper->redirector('index');
            }
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

    public function editarAction()
    {
        if(!$this->_getParam('id')) {
            $this->_helper->flashMessenger->addMessage('Error, intente de nuevo');
            $this->_helper->redirector('index');
        }
        $candidata = $this->_em->find('My\Entity\Candidata',$this->_getParam('id'));
        $this->view->candidata = $candidata;
        $form = new Administracion_Form_CandidataForm();
        $form->removeElement('edad');
        
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();

            if ($form->isValid($data)) {

                

                $candidata->setNombre($form->nombre->getValue());
                $candidata->setEstatura($form->estatura->getValue());
                $candidata->setEstudios($form->estudios->getValue());
                $candidata->setHobby($form->hobby->getValue());
                $candidata->setCabello($form->cabello->getValue());
                $candidata->setOjos($form->ojos->getValue());
                $candidata->setLocalidad($form->localidad->getValue());
                
                $this->_em->flush();

                $this->_helper->flashMessenger->addMessage('Candidata Modificada con éxito');
                $this->_helper->redirector('index');
            }
        }else {
            $form->nombre->setValue($candidata->getNombre());
            $form->estatura->setValue($candidata->getEstatura());
            $form->estudios->setValue($candidata->getEstudios());
            $form->hobby->setValue($candidata->getHobby());
            $form->cabello->setValue($candidata->getCabello());
            $form->ojos->setValue($candidata->getOjos());
            $form->localidad->setValue($candidata->getLocalidad());
        }
        
    }

 

}




