<?php

class Administracion_Form_SubseccionForm extends Zend_Form
{

    public function init()
    {
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName('Subseccion');
        $id = new Zend_Form_Element_Hidden('id');
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Titulo')->setAttribs(array('class'=> 'input-xxlarge'));

        $contenido = new Zend_Form_Element_Textarea('contenido');
        $contenido->setLabel('Contenido')->setAttribs(array('class'=> 'input-xxlarge',
                                                            'rows'=>10));
        
        $seccionPadre = new Zend_Form_Element_Multiselect('seccionesPadre');
        $seccionPadre->setLabel('Seccion Padre')->setRequired();
      
        $submit = new Zend_Form_Element_Submit('Guardar');
        
        $this->addElements(array($id,$nombre,$contenido,$seccionPadre,$submit));
        
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

