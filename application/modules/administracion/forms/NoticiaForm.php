<?php

class Administracion_Form_NoticiaForm extends Zend_Form
{

    public function init()
    {
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName('Noticia');
        $id = new Zend_Form_Element_Hidden('id');
        $titulo = new Zend_Form_Element_Text('titulo');
        $titulo->setLabel('Titulo')->setAttribs(array('class'=> 'input-xxlarge'));
        $copete = new Zend_Form_Element_Textarea('copete');
        $copete->setLabel('Copete')->setAttribs(array('class'=> 'input-xxlarge',
                                                            'rows'=>3));
        $contenido = new Zend_Form_Element_Textarea('contenido');
        $contenido->setLabel('Contenido')->setAttribs(array('class'=> 'input-xxlarge',
                                                            'rows'=>10));
        
        $submit = new Zend_Form_Element_Submit('Guardar');
        
        $this->addElements(array($id,$titulo,$copete,$contenido,$submit));
        
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

