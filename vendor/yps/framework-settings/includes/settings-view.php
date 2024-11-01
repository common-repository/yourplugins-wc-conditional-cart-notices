<?php

namespace YPS\Framework\Settings\v020_769_691;

use YPS\Framework\Form\v020_769_691\Form_View;

class Settings_Form_View extends Form_View {

    public function __construct($context, $params = array()){        
        parent::__construct($context, $params);
    }
    
    public function get_messages(){

        if(empty($this->get_form_entity_name())){
            $this->set_form_entity_name("Settings");
        }

        return parent::get_messages();
    }

}