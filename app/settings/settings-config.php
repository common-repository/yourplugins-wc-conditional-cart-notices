<?php

namespace YPS\WC_Conditional_Cart_Notices;

use YPS\WC_Conditional_Cart_Notices\Framework\Settings\Settings_Config as Framework_Settings_Config;

class Settings_Config extends Framework_Settings_Config {

    public function __construct($context, $params = array()) {

        $this->set_controller_name("settings");

        parent::__construct($context, $params);
    }
}