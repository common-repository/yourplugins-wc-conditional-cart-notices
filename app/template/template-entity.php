<?php

namespace YPS\WC_Conditional_Cart_Notices;

use YPS\WC_Conditional_Cart_Notices\Framework\Record\Record_Entity;

class Template_Entity extends Record_Entity {

    public function get($field_name){
        return parent::get_raw($field_name);
    }
    
    public function get_notice_style(){

        $css    = array();
        $ret    = array();

        $css['background-color']  = $this->get("box_background_color");

        $css['border-width']      = "1px";
        $css['border-style']      = "solid";
        $css['border-color']      = $this->get("box_border_color");
        $css['color']             = $this->get("box_text_color");

        if(empty($css['border-color'])){
            unset($css['border-style']);
            unset($css['border-width']);
        }

        foreach($css as $key => $value){
            if(!empty($value)){
                $ret[]      = "{$key}: {$value}";
            }
        }

        return implode("; ", $ret);
    }

    public function get_button_style(){
        $css    = array();
        $ret    = array();

        $css['background-color']  = $this->get("button_background_color");

        $css['border-width']      = "1px";
        $css['border-style']      = "solid";
        $css['border-color']      = $this->get("button_border_color");
        $css['color']             = $this->get("button_text_color");

        if(empty($css['border-color'])){
            unset($css['border-style']);
            unset($css['border-width']);
        }

        foreach($css as $key => $value){
            if(!empty($value)){
                $ret[]      = "{$key}: {$value}";
            }
        }

        return implode("; ", $ret);
    }

    public function get_icon_style(){
        $css    = array();
        $ret    = array();

        $css['background-color']  = $this->get("icon_background_color");

        foreach($css as $key => $value){
            if(!empty($value)){
                $ret[]      = "{$key}: {$value}";
            }
        }

        return implode("; ", $ret);
    }

}