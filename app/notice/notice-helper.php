<?php

namespace YPS\WC_Conditional_Cart_Notices;

use YPS\WC_Conditional_Cart_Notices\Framework\Core\Controller;
use YPS\WC_Conditional_Cart_Notices\Framework\Core\Helper;

class Notice_Helper extends Helper {

    public function __construct($context, $params = array()) {
        parent::__construct($context, $params);
    }

    public function init_hooks(){
        /* CART */
        add_action('woocommerce_before_cart', array($this, 'woocommerce_before_cart'), 10);
        add_action('woocommerce_before_cart_table', array($this, 'woocommerce_before_cart_table'), 10);
        add_action('woocommerce_before_cart_contents', array($this, 'woocommerce_before_cart_contents'), 10);
        
        add_action('woocommerce_cart_contents', array($this, 'woocommerce_cart_contents'), 10);
        add_action('woocommerce_after_cart_contents', array($this, 'woocommerce_after_cart_contents'), 10);
        add_action('woocommerce_after_cart_table', array($this, 'woocommerce_after_cart_table'), 10);

    }

    public function woocommerce_before_cart(){
        $this->process_notices('cart_position', Notice_Form::CART_POSITION_BEFORE_CART);
    }

    public function woocommerce_before_cart_table(){
        $this->process_notices('cart_position', Notice_Form::CART_POSITION_AFTER_CART_TABLE);
    }

    public function woocommerce_before_cart_contents(){
        $this->process_notices('cart_position', Notice_Form::CART_POSITION_BEFORE_CART_CONTENTS);
    }

    public function woocommerce_cart_contents(){
        $this->process_notices('cart_position', Notice_Form::CART_POSITION_AFTER_CART);
    }

    public function woocommerce_after_cart_contents(){
        $this->process_notices('cart_position', Notice_Form::CART_POSITION_AFTER_CART_CONTENTS);
    }

    public function woocommerce_after_cart_table(){
        $this->process_notices('cart_position', Notice_Form::CART_POSITION_AFTER_CART_TABLE);
    }

    public static function is_notice_visible($notice_entity, $position_field = null, $position_value = null){

        $visible        = null;

        if(
            is_cart() == true && in_array(Notice_Form::SHOW_NOTICE_IN_CART, $notice_entity->get('show_notice_in')) == true ||
            apply_filters('yps_wc_conditional_cart_notices_show_notice', false, $notice_entity, $position_field, $position_value) == true ||
            empty($position_field) && empty($position_value)
        ){
            $visible    = true;
        }else{
            $visible    = false;
        }

        return apply_filters('yps_wc_conditional_cart_notices_is_notice_visible', $visible, $notice_entity, $position_field, $position_value);
    }

    public function process_notices($position_field = null, $position_value = null){

        $notice_model               = new Notice_Model($this->context);
        $settings_model             = new Settings_Model($this->context);
        $controller                 = new Controller($this->context, $this->params);

        if(is_cart() == true && $settings_model->get_value("show_in_cart") == false){
            return;
        }

        if(is_checkout() == true && $settings_model->get_value("show_in_checkout") == false){
            return;
        }

        if(is_product() == true && $settings_model->get_value("show_in_product") == false){
            return;
        }

        if(is_shop() == true && $settings_model->get_value("show_in_shop") == false){
            return;
        }

        
        $where                      = array(
            'enabled'       => true
        );

        if(!empty($position_field) && !empty($position_value)){
            $where[$position_field]     = $position_value;
        }

        $notices                = $notice_model->get_entities_by_columns($where);

        echo $controller->get_view("notice", "notices.php", array(
            'controller'        => $controller,
            'notices'           => $notices,
            'position_field'    => $position_field,
            'position_value'    => $position_value
        ));

    }
        
}
