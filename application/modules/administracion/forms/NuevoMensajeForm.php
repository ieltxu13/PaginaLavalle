<?php

class Administracion_Form_NuevoMensajeForm extends Zend_Form {

    public function init() {
        $this->addPrefixPath('My_Form_Decorator', 'My/Form/Decorator/', 'decorator');
        $this->setName('Mensaje');
        $mailValidator = new Zend_Validate_EmailAddress();

        $de = new Zend_Form_Element_Text('de');
        $de->setAttribs(array('class' => 'input-xxlarge'))
                ->setRequired()->addFilters(array('StripTags', 'StringTrim'))
                ->setAttribs(array('placeholder' => 'Nombre Y Apellido'));

        $asunto = new Zend_Form_Element_Text('asunto');
        $asunto->setAttribs(array('class' => 'input-xxlarge', 'placeholder' => 'Asunto'))
                ->setRequired()->addFilters(array('StripTags', 'StringTrim'));

        $email = new Zend_Form_Element_Text('email');
        $email->setRequired()->addValidator($mailValidator)
                ->addValidator('NotEmpty')->setAttribs(array('class' => 'input-xxlarge', 'placeholder' => 'Dirección de Email'));
        $email->getValidator('EmailAddress')->setMessage('*Direccion de email inválida ', Zend_Validate_EmailAddress::INVALID_FORMAT);
        $email->getValidator('NotEmpty')->setMessage('*El campo email no puede estar vacio! ', Zend_Validate_NotEmpty::IS_EMPTY);

        $contenido = new Zend_Form_Element_Textarea('contenido');
        $contenido->setAttribs(array('class' => 'input-xxlarge',
                    'rows' => 10, 'placeholder' => 'Tu Mensaje'))
                ->addFilters(array('StripTags', 'StringTrim'));

        $recaptcha = new Zend_Service_ReCaptcha("6LcL5OsSAAAAABefqW-E-yJjnPg3zl-OUZvtOhrm", "6LcL5OsSAAAAAPxxQnf9pyH2n5VbEvu7YXOsZS_n");

        $captcha = $this->createElement('Captcha', 'ReCaptcha',
                array('captcha'=>array('captcha'=>'ReCaptcha',
                                        'service'=>$recaptcha)));

        $submit = new Zend_Form_Element_Submit('Guardar');

        $this->addElements(array($de, $asunto, $email, $contenido, $captcha, $submit));

        $this->setElementDecorators(array(
            'ViewHelper',
            //'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array('ErrorsHtmlTag', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        $captcha->setDecorators(array());
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
