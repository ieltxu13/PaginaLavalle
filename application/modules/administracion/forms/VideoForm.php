<?php

class Administracion_Form_VideoForm extends Zend_Form
{

    public function init()
    {
       $this->setName('VideoForm');
       $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
       
       $url = new Zend_Form_Element_Text('url');
       $url->setLabel('Url')->setRequired()
               ->setAttribs(array('class'=> 'input-xxlarge'));
       
       $descripcion = new Zend_Form_Element_Text('descripcion');
       $descripcion->setLabel('Descripcion')->setRequired()
               ->setAttribs(array('class'=> 'input-xxlarge'));
       
       
        $submit = new Zend_Form_Element_Submit('Guardar');
        
        $this->addElements(array($url,$descripcion,$submit));
        
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

