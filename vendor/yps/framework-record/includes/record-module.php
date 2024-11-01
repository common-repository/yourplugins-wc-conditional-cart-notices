<?php

namespace YPS\Framework\Record\v020_769_691;

class Record_Module extends \YPS\Framework\Core\v020_769_691\Module {
    
    public function get_menu_url(){
        return $this->config->get_list_url();
    }
    
}
