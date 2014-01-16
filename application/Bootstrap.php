<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    private $_acl = null;

    protected function _initSession()
    {
        Zend_Session::start();
    }

    protected function _initAutoload()
    {
        if (Zend_Auth::getInstance()->hasIdentity()) {
            Zend_Registry::set('rol', Zend_Auth::getInstance()->getStorage()->read()->getRol());
        } else {
            Zend_Registry::set('rol', 'invitado');
        }

        $this->_acl = new Application_Model_Acl();
        $fc = Zend_Controller_Front::getInstance();
        $fc->registerPlugin(new My_Controller_Plugin_AssetsGrabber());
        //$fc->registerPlugin(new My_Controller_Plugin_SeccionesCheck());
        $fc->registerPlugin(new My_Controller_Plugin_Modular_ErrorController());
        $fc->registerPlugin(new My_Controller_Plugin_AccessCheck($this->_acl));
    }

    protected function _initViewHelpers()
    {
        $this->bootstrap('view');
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();

        ZendX_JQuery::enableView($view);
    }
    
    protected function _initNavigation() {
        
        $this->bootstrap('view');
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        
        $navContainerConfig = new Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml','nav');
        $navContainer = new Zend_Navigation($navContainerConfig);
      
        $view->navigation($navContainer)->setAcl($this->_acl)->setRole(Zend_Registry::get('rol'));
    }

    protected function _initRoutes() {
        
        $frontControlller = Zend_Controller_Front::getInstance();
        $router = $frontControlller->getRouter();
        
        $config = new Zend_Config_Xml(APPLICATION_PATH . '/configs/routes.xml');
        $router->addConfig($config->routes);
        /** RUTAS
        $router->addRoute(
                'subseccion',
                new Zend_Controller_Router_Route('secciones/ver/:id', array(
                    'module'=>'default',
                    'controller'=>'secciones',
                    'action'=>'ver',
                    'id'=>null
                ),
                array('id' => '\d+')
                )
                );
        
        $router->addRoute(
                'noticia',
                new Zend_Controller_Router_Route('noticia/:id', array(
                    'module'=>'default',
                    'controller'=>'noticias',
                    'action'=>'noticia',
                    'id'=>null
                ),
                array('id' => '\d+')
                )
                );
        $router->addRoute(
                'inicio',
                new Zend_Controller_Router_Route('/', array(
                    'module'=>'default',
                    'controller'=>'index',
                    'action'=>'index',
                ))
                );
        $router->addRoute(
                'recurso-noticia',
                new Zend_Controller_Router_Route('imagen/:action', array(
                    'module'=>'default',
                    'controller'=>'recursosn',
                ))
                );
        $router->addRoute(
                'recurso-seccion',
                new Zend_Controller_Router_Route('imagen-seccion/:action', array(
                    'module'=>'default',
                    'controller'=>'recursoss',
                ))
                );
        $router->addRoute(
                'recurso-galeria',
                new Zend_Controller_Router_Route('imagen-galeria/:action', array(
                    'module'=>'default',
                    'controller'=>'recursosg',
                ))
                );
        $router->addRoute(
                'acuerdo',
                new Zend_Controller_Router_Route('acuerdo3949', array(
                    'module'=>'default',
                    'controller'=>'secciones',
                    'action'=> 'acuerdo'
                ))
                );
         
        $router->addRoute(
                'todas-las-noticias',
                new Zend_Controller_Router_Route('historial/:pagina', array(
                    'module'=>'default',
                    'controller'=>'noticias',
                    'action'=> 'todas',
                    'pagina' => 1
                ),
                array('pagina' => '\d+')
                        )
                );
        
        
        FIN RUTAS SECCIONES **/
        

    }
}

