<?php

namespace YPS\WC_Conditional_Cart_Notices;

use YPS\WC_Conditional_Cart_Notices\Framework\Core\Controller;

class Application_Controller extends Controller {

    public $notice_config;
    public $settings_config;

    public function __construct($context, $params = array()) {

        $this->always_execute_index_action  = true;
        $this->is_default_controller        = true;
        
        $this->notice_config                = new Notice_Config($context, $params);
        $this->settings_config              = new Settings_Config($context, $params);
        
        parent::__construct($context, $params);
    }

    public function index_action()
    {
        echo $this->get_view("application", "application-tabs.php");
    }

}



