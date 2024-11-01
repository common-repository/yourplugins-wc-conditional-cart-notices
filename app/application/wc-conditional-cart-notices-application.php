<?php

namespace YPS\WC_Conditional_Cart_Notices;

use YPS\WC_Conditional_Cart_Notices\Framework\Core\Helper;
use YPS\WC_Conditional_Cart_Notices\Framework\Core\Enqueue_Helper;

use YPS\WC_Conditional_Cart_Notices\Framework\Plugin\Plugin;
use YPS\WC_Conditional_Cart_Notices\Framework\Woocommerce\Woocommerce_Ajax_Query_Helper;

use YPS\WC_Conditional_Cart_Notices\Framework\Record\Record;

class WC_Conditional_Cart_Notices_Application extends Plugin {

    protected $notice_helper;

    public function __construct($context) {
        parent::__construct($context);

        $this->notice_helper    = new Notice_Helper($this->context, $this->params);
    }
    
    public function init(){    

        parent::init();
        
        add_action('admin_menu', array( $this, 'admin_menu'), 10);

        load_plugin_textdomain('yps-wc-conditional-cart-notices', FALSE, "{$this->context->get_plugin_code()}/app/lang/");

        new Woocommerce_Ajax_Query_Helper($this->context, $this->params);

        $this->notice_helper->init_hooks();
    }

    public function admin_menu(){

        if(current_user_can('administrator')){
            add_submenu_page(
                "yourplugins",
                "Conditional Cart Notices",
                "Conditional Cart Notices",
                'read',
                $this->context->get_plugin_code(),
                array($this, 'submenu_callback')
            );   
        }

    }
    
    public function submenu_callback() {
        (new Application_Controller($this->context, $this->params))->request_display();
    }
    
    /**
     * Loading styles and scripts only on wp-admin pages.
     *
     * @param string $hook_suffix
     * @return void
     */
    function admin_enqueue_scripts($hook_suffix){
        parent::admin_enqueue_scripts($hook_suffix);

        \YPS\WC_Conditional_Cart_Notices\Framework\Query_Builder\Query_Builder_Helper::init_localize_script();
    }
    
    /**
     * Loading styles and scripts only on wp front-end.
     *
     * @param string $hook_suffix
     * @return void
     */
    function front_enqueue_scripts($hook_suffix){
        parent::front_enqueue_scripts($hook_suffix);

        Helper::localize_script("yourplugins-wc-conditional-cart-notices-notice-front", 'YPS_WC_CCN', array(
            'ajax_url'                          => admin_url('admin-ajax.php'),
        ));
    }
    
    public function custom_upgrade(){
        $settings_model     = new Settings_Model($this->context);

        if($settings_model->is_value("show_in_cart") == false){
            $settings_model->set_value("show_in_cart", true);
        }

    }

    public function get_custom_upgrade_models(){
        return array(
            'YPS\WC_Conditional_Cart_Notices\Notice_Model',
            'YPS\WC_Conditional_Cart_Notices\Settings_Model'
        );
    }

    
}
