<?php

namespace YPS\Framework\Form\v020_769_691;

class Tree_Select_Form_Field extends Form_Field {

    public function __construct($context) {

        $this->set_type("tree-select");

        parent::__construct($context);
    }

}