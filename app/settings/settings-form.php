<?php

namespace YPS\WC_Conditional_Cart_Notices;

use YPS\WC_Conditional_Cart_Notices\Framework\Form\Form;
use YPS\WC_Conditional_Cart_Notices\Framework\Form\Form_Group;
use YPS\WC_Conditional_Cart_Notices\Framework\Form\Select_Form_Field;

class Settings_Form extends Form {
    
    public function __construct($context, $params = array()) {
        parent::__construct($context, $params);
        
        $basic_group    = new Form_Group($this->context);

        $basic_group
            ->set_name('basic')
            ->set_label(__('Settings', 'yps-wc-conditional-cart-notices'))
            ->set_wrapper_classes('mb-5');

        $this->add_group($basic_group);

        $show_in_cart               = new Select_Form_Field($context, $params);

        $show_in_cart
            ->set_name("show_in_cart")
            ->set_label(__('Show in Cart', 'yps-wc-conditional-cart-notices'))
            ->set_allow_empty(true)
            ->set_group_name('basic')
            ->set_group_row_number(0)
            ->set_wrapper_classes('col-sm-12 pt-3')
            ->set_attributes(array('class' => array('form-control')))
            ->set_options(array(0 => 'No', 1 => 'Yes'));



        $this->add_field($show_in_cart);

        apply_filters('yps_wc_conditional_cart_notices_settings_form', $this);
    }
    

}
