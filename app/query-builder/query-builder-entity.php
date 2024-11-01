<?php

namespace YPS\WC_Conditional_Cart_Notices;

use YPS\WC_Conditional_Cart_Notices\Framework\Database\Entity;

class Query_Builder_Entity extends Entity {
    
    public function get($field_name){
        return parent::get_raw($field_name);
    }
    
    

}