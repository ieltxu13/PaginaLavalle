<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Acl
 *
 * @author Ieltxu
 */
class Application_Model_Acl extends Zend_Acl
{
    
    public function __construct()
    {
        $this->addRole(new Zend_Acl_Role('invitado'));
        $this->addRole(new Zend_Acl_Role('compras'),'invitado');
        $this->addRole(new Zend_Acl_Role('prensa'),'invitado');
        $this->addRole(new Zend_Acl_Role('administrador'),'prensa');
        
        $this->addResource(new Zend_Acl_Resource('default'))
             ->addResource(new Zend_Acl_Resource('default:index'),'default')
             ->addResource(new Zend_Acl_Resource('default:error'),'default')
             ->addResource(new Zend_Acl_Resource('default:noticias'),'default')
             ->addResource(new Zend_Acl_Resource('default:mensajes'),'default')
             ->addResource(new Zend_Acl_Resource('default:licitaciones'),'default')
             ->addResource(new Zend_Acl_Resource('default:secciones'),'default');
        
        $this->addResource(new Zend_Acl_Resource('administracion'))
             ->addResource(new Zend_Acl_Resource('administracion:index'),'administracion')
             ->addResource(new Zend_Acl_Resource('administracion:error'),'administracion')
             ->addResource(new Zend_Acl_Resource('administracion:noticias'),'administracion')
             ->addResource(new Zend_Acl_Resource('administracion:usuarios'),'administracion')
             ->addResource(new Zend_Acl_Resource('administracion:secciones'),'administracion')
             ->addResource(new Zend_Acl_Resource('administracion:mensajes'),'administracion')
             ->addResource(new Zend_Acl_Resource('administracion:encuestas'),'administracion')
             ->addResource(new Zend_Acl_Resource('administracion:licitaciones'),'administracion')
             ->addResource(new Zend_Acl_Resource('administracion:imagenes'),'administracion')
             ->addResource(new Zend_Acl_Resource('administracion:colectivos'),'administracion')
             ->addResource(new Zend_Acl_Resource('administracion:acuerdo'),'administracion')
             ->addResource(new Zend_Acl_Resource('administracion:hcd'),'administracion')
             ->addResource(new Zend_Acl_Resource('administracion:revista-crecemos'),'administracion');
        
        $this->allow('invitado', 'default:index','index')
             ->allow('invitado', 'default:error','error')
             ->allow('invitado', 'default:mensajes','nuevo-mensaje')
             ->allow('invitado', 'administracion:error','error')
             ->allow('invitado', 'default:noticias',array('index','noticia','todas'))
             ->allow('invitado', 'default:secciones',array('index','ver','galeria','novedades','hcd','acuerdo','revista-crecemos'))
             ->allow('invitado', 'administracion:index','index')
             ->allow('invitado', 'default:licitaciones',array('index','pdf'));
        
        $this
             ->allow('compras','administracion:index',array('principal','salir'))
             ->allow('compras','administracion:licitaciones',array('index','nueva','editar','cerrar','ver','activar','desactivar'));
        
        $this
             ->allow('prensa', 'administracion:noticias',array('index','nuevo','ver','editar','agregarimagen','agregarvideo'))
             ->allow('prensa', 'administracion:index',array('principal','salir'))
             ->allow('prensa', 'administracion:mensajes',array('index','leer'))
             ->allow('prensa', 'administracion:noticias','dropdown')
             ->allow('prensa', 'administracion:encuestas',array('index','nueva','activar','ver','desactivar'))
             ->allow('prensa', 'administracion:imagenes',array('dropdown','index','agregaragaleria','quitardegaleria','galeria','agregarimagen','modificar-descripcion'))   
             ->allow('prensa', 'administracion:secciones',array('index','listasecciones','listasubsecciones','editarsubseccion','dropdown',
                 'ver','imagenes','seleccionarimagin','seleccionar','quitarimagen','editarseccion'))
             ->allow('prensa','administracion:acuerdo',array('index','subir-documentos'))
             ->allow('prensa','administracion:hcd',array('index','subir-documentos'))
             ->allow('prensa','administracion:revista-crecemos',array('index','subir-documentos'))
             ->deny('prensa', 'administracion:index','index');
             
        
        $this->allow('administrador','administracion:secciones',array('index','nuevaseccion',
            'nuevasubseccion','listasecciones','listasubsecciones','editarsubseccion','dropdown',
            'ver','imagenes','seleccionarimagen','seleccionar','quitarimagen','editarseccion'))
            ->allow('administrador','administracion:usuarios',array('index','dropdown'))
            ->allow('administrador','administracion:acuerdo',array('index','subir-documentos'))
            ->allow('administrador','administracion:colectivos',array('index','nueva-linea','nuevo-horario'));
        $this->allow('administrador','administracion:index',array('prueba-widget-encuesta'))
             ->allow('administrador','administracion:licitaciones',array('index','nueva','editar',
                 'cerrar','ver','activar','desactivar','pdf'));
    }
}

