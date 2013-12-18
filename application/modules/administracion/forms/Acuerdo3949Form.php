<?php

class Administracion_Form_Acuerdo3949Form extends Zend_Form
{

    public function init()
    {
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName('Acuerdo3949');
        $this->setAttrib('enctype', 'multipart/form-data');
        
        $descripcion = new Zend_Form_Element_Text('descripcion');
        $descripcion->setAttribs(array('class'=> 'input-xxlarge','placeholder' => 'Documento (descripcion)'))
                ->setRequired();
        
        $ejercicio = new Zend_Form_Element_Select('ejercicio');
        $ejercicio->setLabel('Ejercicio')->setAttribs(array('class'=> 'input-xxlarge'))
                ->setRequired();
        $añoActual = date('Y');
        for($i = 0; $i<10; $i++) {
        $ejercicio->addMultiOptions(array(
            $añoActual-$i => $añoActual-$i,
        ));
        }
        
        $periodo = new Zend_Form_Element_Select('periodo');
        $periodo->setLabel('Periodo')->setAttribs(array('class'=> 'input-xxlarge'))
                ->setRequired();
        
        $periodo->addMultiOptions(array(
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4
        ));
        
        $upload = new Zend_Form_Element_File('upload');
        $upload->setLabel('Archivo')
                ->setRequired()
                ->setDestination('acuerdo/')
                ->addValidator('Count', false, 1)//Asegura que sea solo un archivo
                ->addValidator('Size', false, 10240000)//Limite al tamaño del archivo
                ->addValidator('Extension', false, 'pdf')
                ->addValidator('NotExists', false, 
                        array(APPLICATION_PATH . '\..\public\acuerdo'));
        
        $submit = new Zend_Form_Element_Submit('Crear!');
        $submit->setAttrib('class', 'btn btn-success');
        
        $this->addElements(array($descripcion,$ejercicio,$periodo,$upload,$submit));
        
        
    }


}

