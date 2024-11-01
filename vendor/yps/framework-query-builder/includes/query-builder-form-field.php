<?php

namespace YPS\Framework\Query_Builder\v020_769_691;

use YPS\Framework\Core\v020_769_691\Helper;
use YPS\Framework\Encode\v020_769_691\Encode_Helper;

use YPS\Framework\Form\v020_769_691\Form_Field;

class Query_Builder_Form_Field extends Form_Field {

    protected $filters;
    
    public function __construct($context, $params = array()) {

        $this->set_type("query-builder");

        parent::__construct($context, $params);
    }

    public function get_controller_view($controller, $optional_params = array()){

        
		$rules		= $controller->view['entity']->get($this->get_name());
        $params		= $this->get_default_controller_view_params($optional_params);
        
        if(empty($rules['json'])){
            $rules['json']  = array();
        }

		$view		= $controller->get_framework_view('Query_Builder', "form/field/{$this->get_type()}.php", $this->get_custom_field_view_params(array(
            'field_name'        => $this->get_name(),
            'field'             => $this,
			'filters'           => Encode_Helper::array_to_html_attribute($this->get_filters()),
			'rules'				=> Encode_Helper::array_to_html_attribute($rules['json'])
        )));

		$html		= $this->get_field_label_html();
		$html		.= $this->get_custom_view($view);

        return $html;

    }

    public function create_column(){
        $this->set_sql_column("MEDIUMTEXT DEFAULT NULL");

        return $this;
    }

	/**
	 * Get the value of filters
	 *
	 * @return mixed
	 */
	public function get_filters(){
		return $this->filters;
	}

	/**
	 * Set the value of filters
	 *
	 * @param   mixed  $filters  
	 *
	 * @return  self
	 */
	public function set_filters($filters){
		$this->filters = $filters;

		return $this;
    }

    public static function get_multi_select_filters(){
        return array(
            'in',
            'not_in',
            'is_empty',
            'is_not_empty',
        );
    }

}
