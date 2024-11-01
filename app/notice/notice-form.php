<?php

namespace YPS\WC_Conditional_Cart_Notices;

use YPS\WC_Conditional_Cart_Notices\Framework\Form\Form;
use YPS\WC_Conditional_Cart_Notices\Framework\Form\Form_Field;
use YPS\WC_Conditional_Cart_Notices\Framework\Form\Form_Group;
use YPS\WC_Conditional_Cart_Notices\Framework\Form\Select_Form_Field;

use YPS\WC_Conditional_Cart_Notices\Framework\Query_Builder\Query_Builder_Form_Field;

use YPS\WC_Conditional_Cart_Notices\Framework\Database\Database_Helper;

class Notice_Form extends Form {
    
    const SHOW_NOTICE_IN_CART                           = "cart";

    const CART_POSITION_BEFORE_CART                     = "before_cart";
    const CART_POSITION_AFTER_CART                      = "after_cart";
    const CART_POSITION_BEFORE_CART_TABLE               = "before_cart_table";
    const CART_POSITION_AFTER_CART_TABLE                = "after_cart_table";
    const CART_POSITION_BEFORE_CART_CONTENTS            = "before_cart_contents";
    const CART_POSITION_AFTER_CART_CONTENTS             = "after_cart_contents";

    public function __construct($context, $params = array()) {
        parent::__construct($context, $params);

        $basic_group            = new Form_Group($this->context);
        $notice_rule_group      = new Form_Group($this->context);
        $appearance_group       = new Form_Group($this->context);

        $basic_group
            ->set_name('basic')
            ->set_label(__('Notice Basic Settings', 'yps-wc-conditional-cart-notices'))
            ->set_wrapper_classes('mb-5');

        $notice_rule_group
            ->set_name('notice_rule')
            ->set_label(__('Notice Rule', 'yps-wc-conditional-cart-notices'))
            ->set_wrapper_classes('mb-5');

        $appearance_group
            ->set_name('appearance_group')
            ->set_label(__('Appearance Settings', 'yps-wc-conditional-cart-notices'))
            ->set_wrapper_classes('mb-5');

        $this->add_group($basic_group);
        $this->add_group($notice_rule_group);

        $this->add_group($appearance_group);

        $id                             = new Form_Field($context, $params);
        $name                           = new Form_Field($context, $params);
        $enabled                        = new Select_Form_Field($context, $params);

        $rule                           = new Query_Builder_Form_Field($context, $params);

        $button_text                    = new Form_Field($context, $params);
        $button_url                     = new Form_Field($context, $params);
        $notice_message                 = new Form_Field($context, $params);
        $show_notice_in                 = new Select_Form_Field($context, $params);

        $cart_position                  = new Select_Form_Field($context, $params);

        $show_notices_in                = apply_filters('yps_wc_conditional_cart_notices_show_notice_in', array(
            self::SHOW_NOTICE_IN_CART               => 'Cart',
        ));

        $id
            ->set_name('id')
            ->set_label(__('ID', 'yps-wc-conditional-cart-notices'))
            ->set_type(Form_Field::TYPE_TEXT)
            ->set_allow_empty(true)
            ->set_group_name('basic')
            ->set_group_row_number(0)
            ->set_is_primary_key(true)
            ->set_sql_column(Database_Helper::PRIMARY_KEY_UINT)
            ->set_wrapper_classes('col-lg-3 col-sm-6')
            ->set_is_table_header(true)
            ->set_is_table_edit_url(true)
            ->set_attributes(array('class' => array('form-control'), 'readonly' => array('readonly')));

        $name
            ->set_name('name')
            ->set_label(__('Name', 'yps-wc-conditional-cart-notices'))
            ->set_type(Form_Field::TYPE_TEXT)
            ->set_allow_empty(false)
            ->set_group_name('basic')
            ->set_group_row_number(0)
            ->set_sql_column('MEDIUMTEXT DEFAULT NULL')
            ->set_wrapper_classes('col-lg-3 col-sm-6')
            ->set_is_table_header(true)
            ->set_is_table_edit_url(true)
            ->set_attributes(array('class' => array('form-control')));

        $enabled
            ->set_name('enabled')
            ->set_label(__('Enabled', 'yps-wc-conditional-cart-notices'))
            ->set_allow_empty(true)
            ->set_group_name('basic')
            ->set_group_row_number(0)
            ->set_sql_column('TINYINT(1) DEFAULT 0')
            ->set_wrapper_classes('col-lg-4 col-sm-12')
            ->set_attributes(array('class' => array('form-control')))
            ->set_options(array(0 => 'No', 1 => 'Yes'))
            ;

        $rule
            ->set_name('rule')
            ->set_label(__('Rule', 'yps-wc-conditional-cart-notices'))
            ->set_allow_empty(true)
            ->set_group_name('notice_rule')
            ->set_group_row_number(0)
            ->set_wrapper_classes('col-sm-12')
            ->set_attributes(array('class' => array('form-control')))
            ->create_column()
            ->set_filters(apply_filters('yps_wc_conditional_cart_notices_rule_filters', array(
                array(
                    'id'    => 'price',
                    'type'  => 'double',
                    'label' => __('Product Price', "yps-wc-conditional-cart-notices"),
                ),

                array(
                    'id'     => 'product_quantity',
                    'type'   => 'integer',
                    'label'  => __('Product Quantity', "yps-wc-conditional-cart-notices")
                ),

                array(
                    'id'     => 'total_quantity',
                    'type'   => 'integer',
                    'label'  => __('Total Quantity', "yps-wc-conditional-cart-notices")
                ),

                array(
                    'id'     => 'total_amount',
                    'type'   => 'double',
                    'label'  => __('Total Amount', "yps-wc-conditional-cart-notices")
                ),


        )));

        $button_text
            ->set_name('button_text')
            ->set_label(__('Button Text', 'yps-wc-conditional-cart-notices'))
            ->set_type(Form_Field::TYPE_TEXT)
            ->set_allow_empty(true)
            ->set_group_name('appearance_group')
            ->set_group_row_number(1)
            ->set_sql_column('MEDIUMTEXT DEFAULT NULL')
            ->set_wrapper_classes('col-lg-4 col-sm-12')
            ->set_attributes(array('class' => array('form-control')))
            ;

        $button_url
            ->set_name('button_url')
            ->set_label(__('Button URL', 'yps-wc-conditional-cart-notices'))
            ->set_type(Form_Field::TYPE_TEXT)
            ->set_allow_empty(true)
            ->set_group_name('appearance_group')
            ->set_group_row_number(1)
            ->set_sql_column('MEDIUMTEXT DEFAULT NULL')
            ->set_wrapper_classes('col-lg-4 col-sm-12')
            ->set_attributes(array('class' => array('form-control')))
            ;



        $show_notice_in
            ->set_name('show_notice_in')
            ->set_label(__('Show Notice In', 'yps-wc-conditional-cart-notices'))
            ->set_type(Form_Field::TYPE_SELECT)
            ->set_allow_empty(true)
            ->set_group_name('appearance_group')
            ->set_group_row_number(2)
            ->set_sql_column('MEDIUMTEXT DEFAULT NULL')
            ->set_wrapper_classes('col-lg-4 col-sm-12')
            ->set_is_multiple(true)
            ->set_attributes(array(
                'class'     => array('form-control yps-chosen'),
            ))
            ->set_options($show_notices_in);

        /**
         * Some positions are commented out: These are positions that are not updated when the user clicks on "Update cart"
         */
        $cart_position
            ->set_name('cart_position')
            ->set_label(__('Cart Position', 'yps-wc-conditional-cart-notices'))
            ->set_type(Form_Field::TYPE_SELECT)
            ->set_allow_empty(true)
            ->set_group_name('appearance_group')
            ->set_group_row_number(2)
            ->set_sql_column('VARCHAR(50) DEFAULT NULL')
            ->set_wrapper_classes('col-lg-4 col-sm-12')
            ->set_attributes(array('class' => array('form-control')))
            ->set_options(array(
                //self::CART_POSITION_BEFORE_CART             => __('Before Cart', "yps-wc-conditional-cart-notices"),
                self::CART_POSITION_AFTER_CART              => __('After Cart', "yps-wc-conditional-cart-notices"),
                //self::CART_POSITION_BEFORE_CART_TABLE       => __('Before Cart Table', "yps-wc-conditional-cart-notices"),
                self::CART_POSITION_AFTER_CART_TABLE        => __('After Cart Table', "yps-wc-conditional-cart-notices"),
                self::CART_POSITION_BEFORE_CART_CONTENTS    => __('Before Cart Contents', "yps-wc-conditional-cart-notices"),
                self::CART_POSITION_AFTER_CART_CONTENTS     => __('After Cart Contents', "yps-wc-conditional-cart-notices"),
            ))
            ;

        $notice_message
            ->set_name('notice_message')
            ->set_label(__('Notice Message', 'yps-wc-conditional-cart-notices'))
            ->set_type(Form_Field::TYPE_TEXTAREA)
            ->set_allow_empty(true)
            ->set_group_name('appearance_group')
            ->set_group_row_number(5)
            ->set_sql_column('MEDIUMTEXT DEFAULT NULL')
            ->set_wrapper_classes('col-sm-12')
            ->set_attributes(array('class' => array('form-control')))
            ;


        $this->add_field($id);
        $this->add_field($name);
        $this->add_field($enabled);

        $this->add_field($rule);

        $this->add_field($button_text);
        $this->add_field($button_url);
        
        $this->add_field($notice_message);
        $this->add_field($show_notice_in);
        
        $this->add_field($cart_position);

        apply_filters('yps_wc_conditional_cart_notices_notice_form', $this);
    }
    
    public function validate($data, $params = array()){
        
        $validate               = parent::validate($data, $params);
        
        return $validate;
    }
}

