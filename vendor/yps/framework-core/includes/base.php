<?php

namespace YPS\Framework\Core\v020_769_691;

class Base {

    protected $context;
    protected $params       = array();

    public function __construct($context, $params = array()) {
        $this->context      = $context;
        $this->params       = $params;
    }

}
