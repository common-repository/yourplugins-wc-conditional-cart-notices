<?php

namespace YPS\WC_Conditional_Cart_Notices;

use YPS\WC_Conditional_Cart_Notices\Framework\Database\Entity;
use YPS\WC_Conditional_Cart_Notices\Framework\Record\Record_Entity;

class Notice_Entity extends Record_Entity {
    
    public function get($field_name){

        if($field_name == 'rule' || $field_name == 'show_notice_in'){
            
            if(parent::get_raw($field_name) == null){
                return [];
            }

            return json_decode(parent::get_raw($field_name), true);
        }

        return parent::get_raw($field_name);
    }

    public function set($field_name, $value)
    {
        if($field_name == 'show_notice_in'){
            $this->set_raw($field_name, json_encode(empty($value)?array():$value));
        }else{
            $this->set_raw($field_name, $value);
        }
    }

    public function is_rule_matched(){
        $query_builder_helper       = new Query_Builder_Helper($this->context);
        $query_builder_model        = new Query_Builder_Model($this->context);

        $query_builder_helper->create_tmp_table_from_cart($this);

        $notice_rule                = $this->get('rule');
        $notice_rule_sql            = $notice_rule['sql'];

        /* Query Builder is empty, means always */
        if(empty($notice_rule_sql)){
            return true;
        }

        $notice_rule_sql    = apply_filters('yps_wc_conditional_cart_notices_sql_rule', $notice_rule_sql);
        $rows               = $query_builder_model->get_query_rows("SELECT * FROM {$query_builder_model->table} WHERE {$notice_rule_sql}");

        $query_builder_helper->drop_tmp_table();

        if(count($rows) > 0){
            return true;
        }

        return false;
    }

    public function get_template(){

        $template_entity        = new Template_Entity($this->context);

        $template_entity->set('name', 'Default Template');
        $template_entity->set('box_background_color', '#f6b26b');

        return apply_filters('yps_wc_conditional_cart_notices_notice_template', $template_entity, $this);
    }
    
    

}