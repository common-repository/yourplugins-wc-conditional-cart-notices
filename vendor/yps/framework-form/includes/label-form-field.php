<?php

namespace YPS\Framework\Form\v020_769_691;

class Label_Form_Field extends Form_Field {

    public function __construct($context) {

        $this->set_type("label");

        parent::__construct($context);
    }
    
}