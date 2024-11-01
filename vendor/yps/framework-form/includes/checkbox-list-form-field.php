<?php

namespace YPS\Framework\Form\v020_769_691;

class Checkbox_List_Form_Field extends Form_Field {


    public function __construct($context) {

        $this->set_type("checkbox-list");

        parent::__construct($context);
    }
    
}
