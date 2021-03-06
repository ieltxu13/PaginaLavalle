<?php

class Administracion_Form_SeccionForm extends Zend_Form
{

    public function init()
    {
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName('Seccion');
        
        $id = new Zend_Form_Element_Hidden('id');
        $ubicacion = new Zend_Form_Element_Hidden('ubicacion');
        
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre')->setAttribs(array('class'=> 'input-xxlarge'));
        
        $submit = new Zend_Form_Element_Submit('Guardar');
        
        $this->addElements(array($id,$ubicacion,$nombre,$submit));
        
        $this->setElementDecorators(array(
            'ViewHelper',
            //'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array('ErrorsHtmlTag', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

        $submit->setDecorators(array('ViewHelper',
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array(array('emptyrow' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

        $this->setDecorators(
                array(
                    "FormElements",
                    array("HtmlTag", array("tag" => "table")),
                    "Form"
                )
        );
                
    
    }


}

