<?php

class Administracion_Form_RevistaCrecemosForm extends Zend_Form
{

    public function init()
    {
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName('RevistaCrecemos');
        $this->setAttrib('enctype', 'multipart/form-data');
        
        $numero = new Zend_Form_Element_Text('numero');
        $numero->setAttribs(array('class'=> 'input-xxlarge','placeholder' => 'Numero'))
                ->setRequired()
                ->addValidator('Int')
                ->addFilters(array('StripTags','StringTrim'));

        $upload = new Zend_Form_Element_File('upload');
        $upload->setLabel('Archivo')
                ->setRequired()
                ->setDestination('revistaCrecemos/')
                ->addValidator('Count', false, 1)//Asegura que sea solo un archivo
                ->addValidator('Size', false, 10240000)//Limite al tamaño del archivo
                ->addValidator('Extension', false, 'pdf')
                ->addValidator('NotExists', false, 
                        array(APPLICATION_PATH . '\..\public\revistaCrecemos'));
        
        $imagen = new Zend_Form_Element_File('imagen');
        $imagen->setLabel('Portada')
                ->setRequired()
                ->setDestination('revistaCrecemos/')
                ->addValidator('Count', false, 1)//Asegura que sea solo un archivo
                ->addValidator('Size', false, 10240000)//Limite al tamaño del archivo
                ->addValidator('Extension', false, 'jpg,png,gif')
                ->addValidator('NotExists', false, 
                        array(APPLICATION_PATH . '\..\public\revistaCrecemos'));
        
        $submit = new Zend_Form_Element_Submit('Crear!');
        $submit->setAttrib('class', 'btn btn-success');
        
        $this->addElements(array($numero,$imagen,$upload,$submit));
        
        
    }


}

