    <?php

class Administracion_IndexController extends Zend_Controller_Action
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
        $layout = Zend_Layout::getMvcInstance();
        $layout->setLayout('layoutadministracion');
        $this->_doctrineContainer = Zend_Registry::get('doctrine');
        $this->_em = $this->_doctrineContainer->getEntityManager();
    }

    public function indexAction()
    {
        $form = new Administracion_Form_LoginForm();

        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {

            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {

                $usuario = $form->getValue('usuario');
                $clave = $form->getValue('clave');

                $authAdapter = new My_Auth_Adapter($usuario, $clave);
                $result = Zend_Auth::getInstance()->authenticate($authAdapter);
                
                if (Zend_Auth::getInstance()->hasIdentity()) {    
                $usuario = $this->_em->find('My\Entity\Usuario',Zend_Auth::getInstance()->getIdentity()->getId());
                $usuario->setUltimoAcceso();
                $this->_em->flush();
                
                
                    $this->_helper->redirector('principal');
                } else {
                    $this->view->message = implode('  ', $result->getMessages());
                }
            }
            $this->view->errors = $form->getErrorMessages();
        }
    }

    public function salirAction()
    {
        if (Zend_Auth::getInstance()->hasIdentity()) {
            Zend_Auth::getInstance()->clearIdentity();
        }
        $this->_helper->redirector('index');
    }

    public function pruebaWidgetEncuestaAction()
    {
        $query = $this->_em->createQuery('Select e From My\Entity\Encuesta e where e.activo = ?1');
        $query->setParameter(1, true);

        $encuesta = $query->getSingleResult();
        
        $this->view->encuesta = $encuesta;
        
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

    public function principalAction()
    {
        $query = $this->_em->createQuery('Select m From My\Entity\Mensaje m where m.leido = ?1');
        $query->setParameter(1, false);
        $noLeidos = $query->getScalarResult();
        
        $this->view->noLeidos = $noLeidos;
  
    }


}







