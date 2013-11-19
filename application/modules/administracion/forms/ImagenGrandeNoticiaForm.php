<?php

class Administracion_Form_ImagenGrandeNoticiaForm extends Zend_Form
{

    public function init()
    {
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName('upload');
        $this->setAttrib('enctype', 'multipart/form-data');
        $descripcion = new Zend_Form_Element_Text('descripcion');
        $descripcion->setLabel('descripcion')->setAttribs(array('class' => 'input-xxlarge'))->setRequired();
        $upload = new Zend_Form_Element_File('upload');
        $upload->setLabel('Elegir Imagen')
                ->setRequired()
                ->setDestination(APPLICATION_PATH . '/recursos/noticias')
                ->addValidator('Count', false, 1)//Asegura que sea solo un archivo
                ->addValidator('Size', false, 10240000)//Limite al tamaño del archivo
                ->addValidator('Extension', false, 'jpg,png,gif')
                ->addValidator('NotExists', false, 
                        array(APPLICATION_PATH . '\recursos\noticias'));
        /*  ->addFilter(new Zend_Filter_File_Rename(array(
          'target' => Zend_Auth::getInstance()->getIdentity()->id.'.jpg'
          )));//Formatos que se pueden subir */

        $submit = new Zend_Form_Element_Submit('Subir');

        $this->addElements(array($upload, $descripcion, $submit));
    }


}

