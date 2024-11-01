<?php

namespace YPS\WC_Conditional_Cart_Notices;

use YPS\WC_Conditional_Cart_Notices\Framework\Settings\Settings_Model as Framework_Settings_Model;

class Settings_Model extends Framework_Settings_Model {
    
    public function __construct($context, $params = array()) {
        
        $this->set_entity_class("\\YPS\\WC_Conditional_Cart_Notices\\Settings_Entity");
        $this->set_table_name("yps_wc_conditional_cart_notices_settings");
        
        parent::__construct($context, $params);
    }
    

}