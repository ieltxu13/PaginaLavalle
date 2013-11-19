<?php

class Administracion_Form_EncuestaForm extends Zend_Form
{

    public function init()
    {
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName('Encuesta');
        $titulo = new Zend_Form_Element_Text('titulo');
        $titulo->setLabel('Titulo')->setAttribs(array('class'=> 'input-xxlarge'))
                ->setRequired();
        $pregunta = new Zend_Form_Element_Text('pregunta');
        $pregunta->setLabel('Pregunta')->setAttribs(array('class'=> 'input-xxlarge',
            'placeholder'=>'Esto Será lo que se vea en la página'))
                ->setRequired();
        
        $submit = new Zend_Form_Element_Submit('Crear!');
        $submit->setAttrib('class', 'btn btn-success');
        
        $this->addElements(array($titulo,$pregunta,$submit));
        
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

