<?php

namespace YPS\WC_Conditional_Cart_Notices;

use YPS\WC_Conditional_Cart_Notices\Framework\Record\Record_Config;
use YPS\WC_Conditional_Cart_Notices\Framework\Core\Helper;

class Notice_Config extends Record_Config{

    public function __construct($context, $params = array()) {

        $this->set_controller_name("notice");

        parent::__construct($context, $params);
    }

}