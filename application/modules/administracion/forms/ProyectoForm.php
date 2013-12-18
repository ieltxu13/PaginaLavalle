<?php

class Administracion_Form_ProyectoForm extends Zend_Form
{

    public function init()
    {
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName('Proyecto');
        $this->setAttrib('enctype', 'multipart/form-data');
        
        $titulo = new Zend_Form_Element_Text('titulo');
        $titulo->setAttribs(array('class'=> 'input-xxlarge','placeholder' => 'Titulo'))
                ->setRequired();
        
        $descripcion = new Zend_Form_Element_Text('descripcion');
        $descripcion->setAttribs(array('class'=> 'input-xxlarge','placeholder' => 'Documento (descripcion)'))
                ->setRequired();
        
        
        $tipo = new Zend_Form_Element_Select('tipo');
        $tipo->setLabel('Tipo')->setAttribs(array('class'=> 'input-xxlarge'))
                ->setRequired();
        
        $tipo->addMultiOptions(array(
            'Declaracion' => 'Declaracion',
            'Resolucion' => 'Ordenanza',
            'Resolucion' => 'Resolucion'
        ));
        
        $upload = new Zend_Form_Element_File('upload');
        $upload->setLabel('Archivo')
                ->setRequired()
                ->setDestination('proyectos/')
                ->addValidator('Count', false, 1)//Asegura que sea solo un archivo
                ->addValidator('Size', false, 10240000)//Limite al tamaño del archivo
                ->addValidator('Extension', false, 'pdf')
                ->addValidator('NotExists', false, 
                        array(APPLICATION_PATH . '\..\public\proyectos'));
        
        $submit = new Zend_Form_Element_Submit('Crear!');
        $submit->setAttrib('class', 'btn btn-success');
        
        $this->addElements(array($titulo,$descripcion,$tipo,$upload,$submit));
        
        
    }


}

