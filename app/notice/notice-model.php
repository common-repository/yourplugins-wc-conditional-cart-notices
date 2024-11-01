<?php

namespace YPS\WC_Conditional_Cart_Notices;

use YPS\WC_Conditional_Cart_Notices\Framework\Record\Record_Model;

class Notice_Model extends Record_Model {
   

    public function __construct($context, $params = array()) {
        
        $this->set_record_form(new Notice_Form($context, $params));
        
        $this->set_entity_class("\\YPS\\WC_Conditional_Cart_Notices\\Notice_Entity");
        $this->set_table_name("yps_wc_conditional_cart_notices");
        $this->set_id_column("id");
        
        parent::__construct($context, $params);
    }

    
}
