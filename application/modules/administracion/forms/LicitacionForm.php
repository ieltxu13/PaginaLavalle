<?php

class Administracion_Form_LicitacionForm extends Zend_Form
{

    public function init()
    {
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName('licitacion');
        
        $numero = new Zend_Form_Element_Text('numero');
        $numero->setLabel('Numero')->setRequired()->addFilter('Int')->addValidator('Int')
                ->setAttrib('placeholder', 'Solo Número, sin el año');
        
        $descripcion = new Zend_Form_Element_Textarea('descripcion');
        $descripcion->setLabel('Descripcion')->setRequired()->setAttribs(array(
            'rows' => 4,
            'class'=> 'input-xxlarge'));
        
        $fechaDeApertura = new Zend_Form_Element_Text('fecha');
        $fechaDeApertura->setLabel('Fecha de apertura')->setAttribs(array(
            'class' => 'span7','size' => 16 ,'readonly'=>true))->setValue('01-01-2013');
        
        $hora = new Zend_Form_Element_Select('hora');
        $hora->setLabel('Hora')->setRequired()
                ->setMultiOptions(array(6=>6,
                    7=>7,
                    8=>8,
                    9=>9,
                    10=>10,
                    11=>11,
                    12=>12,
                    13=>13,
                    14=>14,
                    15=>15,
                    16=>16,
                    17=>17,
                    18=>18,
                    19=>19,
                    20=>20,
                    21=>21,
                    22=>22,
                    23=>23,
                    24=>24
            ));
        
        $tipoDeContratacion = new Zend_Form_Element_Text('tipoDeContratacion');
        $tipoDeContratacion->setLabel('Tipo de contratación')->setRequired()
                ->setAttribs(array('class'=> 'input-xxlarge'));
        
        $submit = new Zend_Form_Element_Submit('Guardar');
        $submit->setAttrib('class', 'btn btn-primary');
        
        $this->addElements(array($numero,$descripcion,$fechaDeApertura,$hora,$tipoDeContratacion,$submit));
        
        $this->setElementDecorators(array(
            'ViewHelper',
            //'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array('ErrorsHtmlTag', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
            
        $fechaDeApertura->setDecorators(array('ViewHelper',
            array(array('addOn' =>'HtmlTag'), array('tag' => 'span','placement'=>'append','closeOnly'=>true)),
            array(array('icon' => 'HtmlTag'), array('tag' => 'i', 'class' => 'icon-calendar','placement'=>'append')),
            array(array('addOn' =>'HtmlTag'), array('tag' => 'span', 'class'=> 'add-on', 'placement'=>'append','openOnly'=>true)),
            array('HtmlTag', array ('tag' => 'div','id'=>'datepickerdiv', 'class' => 'input-append date','data-date' => '01-01-2013', 'data-date-format'=>'dd-mm-yyyy', 'data-date-viewmode'=>2)),
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array('Label', array('tag' => 'td')),
            array('ErrorsHtmlTag', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array ('tag' => 'tr'))
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

