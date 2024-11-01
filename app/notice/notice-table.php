<?php

namespace YPS\WC_Conditional_Cart_Notices;

use YPS\WC_Conditional_Cart_Notices\Framework\Record\Record_Table;

class Notice_Table extends Record_Table{

    var $notice_config;
    
    public function __construct($context, $params = array()) {
    
        $this->notice_config      = new Notice_Config($context, $params);
        
        $this->set_record_form(new Notice_Form($context, $params));
        $this->set_record_config($this->notice_config);
        
        
        $this->set_id_column("id");
        
        $this->show_actions_column          = true;
        $this->show_actions_delete_button   = true;
        $this->show_actions_edit_button     = true;
        
        parent::__construct($context, $params);
    }
    
    public function get_row_data($row, $key){
        return parent::get_row_data($row, $key);
    }
    
    public function get_actions($actions, $row, $header_key){
        return parent::get_actions($actions, $row, $header_key);
    }
    
}
