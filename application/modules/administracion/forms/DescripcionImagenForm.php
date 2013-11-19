<?php

class Administracion_Form_DescripcionImagenForm extends Zend_Form
{

    public function init()
    {
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName('descripcionImagen');
        
        
        $descripcion = new Zend_Form_Element_Text('descripcion');
        $descripcion->setLabel('Descripcion')->setAttribs(array('class'=> 'input-xxlarge'))
                ->addFilters(array('StripTags','StringTrim'));
        
        $submit = new Zend_Form_Element_Submit('Guardar');
        $submit->setAttrib('class', 'btn btn-primary');
        
        $this->addElements(array($descripcion,$submit));
        
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

