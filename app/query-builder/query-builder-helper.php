<?php

namespace YPS\WC_Conditional_Cart_Notices;

use YPS\WC_Conditional_Cart_Notices\Framework\Core\Helper;

class Query_Builder_Helper extends Helper {

    public function create_tmp_table_from_cart($notice_entity){

        $query_builder_model    = new Query_Builder_Model($this->context);
        $first_rows             = array();

        if(is_user_logged_in()){
            $user                   = wp_get_current_user();
            $roles                  = (array)$user->roles;
        }else{
            $roles                  = array('visitor');
        }
        
        $query_builder_model->create_table();

        /* Totals */

        $total_quantity                 = 0;
        $total_amount                   = 0;
        
        $total_taxes                    = 0;

        $total_coupon_discount_amount   = \WC()->cart->get_cart_discount_total();
        $total_coupon_tax_total         = \WC()->cart->get_cart_discount_tax_total();

        $shipping_total                 = \WC()->cart->get_shipping_total();

        foreach(\WC()->cart->get_tax_totals() as $tax){
            $total_taxes        += $tax->amount;
        }

        foreach(\WC()->cart->get_cart() as $cart_item){
            $total_quantity     += $cart_item['quantity'];
            $total_amount       += $cart_item['quantity']*\wc_get_price_including_tax($cart_item['data']);
        }

        if($notice_entity->get('include_coupons_in_total_amount') == true){
            $total_amount       += $total_coupon_discount_amount;
        }

        if($notice_entity->get('include_coupons_taxes_in_total_amount') == true){
            $total_amount       += $total_coupon_tax_total;
        }

        if($notice_entity->get('include_taxes_in_total_amount') == true){
            $total_amount       -= $total_taxes;
        }

        if($notice_entity->get('include_shipping_taxes_in_total_amount') == true){
            $total_amount       -= $shipping_total;
        }

        $before_loop_params = apply_filters('yps_wc_conditional_cart_notices/query_builder/before_loop', array(
            'total_taxes'                   => $total_taxes,
            'shipping_total'                => $shipping_total,
            'total_coupon_discount_amount'  => $total_coupon_discount_amount,
        ));

        foreach($roles as $role_key => $role){
            $first_rows[$role_key] = apply_filters('yps_wc_conditional_cart_notices/query_builder/first_rows', array(), $role, $before_loop_params);

            if(count($first_rows[$role_key]) != 0){
                $query_builder_model->insert_row($first_rows[$role_key]);
            }
        }

        /* Single */
        foreach(\WC()->cart->get_cart() as $cart_item){
            
            if(get_class($cart_item['data']) == 'WC_Product_Variation'){
                $product_id         = $cart_item['data']->get_parent_id();
            }else{
                $product_id         = $cart_item['data']->get_id();
            }

            $item_name      = $cart_item['data']->get_title();
            $quantity       = $cart_item['quantity'];
            $price          = $cart_item['data']->get_price();
            $categories     = \get_the_terms($product_id, 'product_cat');

            foreach($categories as $category){
                foreach($roles as $role_key => $role){

                    $cart_item_row    = apply_filters('yps_wc_conditional_cart_notices/query_builder/cart_item_row_loop', array(

                        'price'                         => $price,

                        'product_quantity'              => $quantity,

                        'total_quantity'                => $total_quantity,
                        'total_amount'                  => $total_amount,

                    ), $cart_item, $role, $category, $before_loop_params);

                    $query_builder_model->insert_row(array_merge($first_rows[$role_key], $cart_item_row));
                }
            }

        }

    }

    public function drop_tmp_table(){
        $query_builder_model    = new Query_Builder_Model($this->context);

        $query_builder_model->query("DROP TEMPORARY TABLE IF EXISTS {$query_builder_model->table}");
    }

        
}
