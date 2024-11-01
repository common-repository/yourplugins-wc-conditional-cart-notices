<?php

namespace YPS\WC_Conditional_Cart_Notices;

use YPS\WC_Conditional_Cart_Notices\Framework\Record\Record_Controller;

class Notice_Controller extends Record_Controller {

    public $notice_model;
    public $notice_config;
    
    public function __construct($context, $params = array()) {

        $this->is_default_controller    = true;
        
        $this->notice_model               = new Notice_Model($context);
        $this->notice_config              = new Notice_Config($context);
        
        $this->set_record_entity(new Notice_Entity($context, $params));
        $this->set_record_config(new Notice_Config($context, $params));
        $this->set_record_table(new Notice_Table($context, $params));
        $this->set_record_model($this->notice_model);
        $this->set_record_form(new Notice_Form($context, $params));
        
        $this->set_record_singular_name(__("Notice", "yps-wc-conditional-cart-notices"));
        $this->set_record_plural_name(__("Notices", "yps-wc-conditional-cart-notices"));

        $this->set_list_title(__("Notice List", "yps-wc-conditional-cart-notices"));
        
        $this->list_show_card           = false;
        $this->show_actions_new_button  = true;
        
        parent::__construct($context, $params);
    }

    public function index_action()
    {
        parent::index_action();
    }

}



