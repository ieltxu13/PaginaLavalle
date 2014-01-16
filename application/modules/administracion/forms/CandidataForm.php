<?php

class Administracion_Form_CandidataForm extends Twitter_Bootstrap_Form_Horizontal
{

    public function init()
    {
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName('Candidata');

        $this->_addClassNames('well');
        
        $nombre = $this->createElement('text', 'nombre');
        $nombre->setRequired()->addFilters(array('StringTrim','StripTags'))
                ->setLabel('Nombre')
                ->setAttrib('class', 'input-xxlarge');
        
        $localidad = $this->createElement('text', 'localidad');
        $localidad->setRequired()->addFilters(array('StringTrim','StripTags'))
                ->setLabel('Localidad');
        
        $ojos = $this->createElement('text', 'ojos');
        $ojos->setRequired()->addFilters(array('StringTrim','StripTags'))
                ->setLabel('Ojos');
        
        $estatura = $this->createElement('text', 'estatura');
        $estatura->setRequired()->addFilters(array('StringTrim','StripTags'))
                ->setLabel('Estatura');
        
        $cabello = $this->createElement('text', 'cabello');
        $cabello->setRequired()->addFilters(array('StringTrim','StripTags'))
                ->setLabel('Cabello');
        
        $hobby = $this->createElement('text', 'hobby');
        $hobby->setRequired()->addFilters(array('StringTrim','StripTags'))
                ->setLabel('Hobby')
                ->setAttrib('class', 'input-xxlarge');;

        $estudios = $this->createElement('text', 'estudios');
        $estudios->setRequired()->addFilters(array('StringTrim','StripTags'))
                ->setLabel('Estudios')
                ->setAttrib('class', 'input-xxlarge');;

        $edad = $this->createElement('text', 'edad');
        $edad->setLabel('Fecha de Nacimiento')->setAttribs(array(
            'size' => 16 ,'readonly'=>true))->setValue('01-01-2014');
        
        $submit = $this->createElement('button', 'submit', array(
            'label'         => 'Guardar!',
            'type'          => 'submit'
        ));
        $submit->setAttribs(array('disableLoadDefaultDecorators' => true, 'decorators'=>array('Actions')));
        
        $this->setElements(array($nombre,$localidad, $edad, $estatura, $cabello, $ojos, $estudios, $hobby,$submit));
        
        $edad->setDecorators(array('ViewHelper',
            array(array('addOn' =>'HtmlTag'), array('tag' => 'span','placement'=>'append','closeOnly'=>true)),
            array(array('icon' => 'HtmlTag'), array('tag' => 'i', 'class' => 'icon-calendar','placement'=>'append')),
            array(array('addOn' =>'HtmlTag'), array('tag' => 'span', 'class'=> 'add-on', 'placement'=>'append','openOnly'=>true)),
            array('HtmlTag', array ('tag' => 'div','id'=>'datepickerdiv', 'class' => 'input-append date','data-date' => '01-01-2013', 'data-date-format'=>'dd-mm-yyyy', 'data-date-viewmode'=>2)),
            array(array('data' => 'HtmlTag'), array('tag' => 'div', 'class' => 'controls')),
            array('Label', array('class' => 'control-label')),
            array(array('row' => 'HtmlTag'), array ('tag' => 'div', 'class' => 'control-group'))
         ));
        
    }


}

