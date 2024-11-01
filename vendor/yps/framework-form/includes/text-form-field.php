<?php

namespace YPS\Framework\Form\v020_769_691;

class Text_Form_Field extends Form_Field {

    public function __construct($context, $params = array()) {

        $this->set_type("text");
        $this->set_attributes(array('class' => array('form-control')));
        
        parent::__construct($context, $params);
    }

}
