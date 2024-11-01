<?php

namespace YPS\Framework\Form\v020_769_691;

class Numeric_Form_Field extends Form_Field {

    public function __construct($context, $params = array()) {

        $this->set_type("numeric");

        parent::__construct($context, $params);
    }
    
}
