<?php

class Administracion_Form_FiltroHorariosForm extends Zend_Form {

    public function init() {
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName('FiltroHorarios');

        $trayecto = new Zend_Form_Element_Select('trayecto');
        $trayecto
                ->setRequired()
                ->addMultiOptions(array(
                    'Norte A Mendoza' => 'Norte A Mendoza',
                    'Mendoza al Norte' => 'Mendoza Al Norte'
                ))
                ->setAttribs(array('class' => 'input-xxlarge'));

        $horario = new Zend_Form_Element_Text('horario');
        $horario
                ->setRequired()
                ->setAttribs(array('class' => 'input-xxlarge'));

        $dias = new Zend_Form_Element_Select('dias');
        $dias
                ->setRequired()
                ->addMultiOptions(array(
                    'Semana' => 'Semana',
                    'Sabados' => 'Sabados',
                    'Domingos' => 'Domingos'
                ))
                ->setAttribs(array('class' => 'input-xxlarge'));

        $linea = new Zend_Form_Element_Select('lineas');
        $linea->setRequired()
                ->setAttribs(array('class' => 'input-xxlarge',
                    'autofocus' => true))
                ->addMultiOptions(array(
                    'RUTA 40' => 'RUTA 40',
                    'RUTA 24' => 'RUTA 24'
        ));

        $desde = new Zend_Form_Element_Select('desde');
        $desde->setMultiOptions(array(
                    'ASUNCIÓN' => 'ASUNCIÓN',
                    'EL 15' => 'EL 15',
                    'GUSTAVO ANDRÉ' => 'GUSTAVO ANDRÉ',
                    'COSTA' => 'COSTA',
                    'LAVALLE' => 'LAVALLE',
                    'MENDOZA' => 'MENDOZA',
                    'KM 56' => 'KM 56',
                    'JOCOLI' => 'JOCOLI',
                    'OSC MENDOZA' => 'OSC MENDOZA',
                    'ANDACOLLO' => 'ANDACOLLO',
                    'CROCO' => 'CROCO',
                    'SGUAZINI' => 'SGUAZINI',
                    '3 DE MAYO' => '3 DE MAYO',
                    'SAN FRANCISCO' => 'SAN FRANCISCO',
                    'COLONIA ITALIA' => 'COLONIA ITALIA',
                    'B° LA COLMENA' => 'B° LA COLMENA',
                    'SALVATIERRA' => 'SALVATIERRA',
                    'VERJEL' => 'VERJEL',
                    'CRUCE' => 'CRUCE',
                    'PASTAL' => 'PASTAL',
                    'BORBOLLON' => 'BORBOLLON',
                ))
                ->setAttribs(array('class' => 'input-xxlarge'));

        $observaciones = new Zend_Form_Element_Text('observaciones');
        $observaciones->setAttribs(array('class' => 'input-xxllarge'));
        $submit = new Zend_Form_Element_Submit('Buscar');
        $submit->setAttrib('class', 'btn btn-primary');

        $this->setElements(array($linea, $trayecto, $desde, $submit));

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
