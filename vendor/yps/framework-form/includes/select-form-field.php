<?php

namespace YPS\Framework\Form\v020_769_691;

class Select_Form_Field extends Form_Field {

    protected $is_multiple;
    protected $is_lou_multi_select;
    
    public function __construct($context) {

        $this->set_type("select");

        $this->is_multiple      = false;

        parent::__construct($context);
    }


	/**
	 * Get the value of is_multiple
	 *
	 * @return mixed
	 */
	public function get_is_multiple(){
		return $this->is_multiple;
	}

	/**
	 * Set the value of is_multiple
	 *
	 * @param   mixed  $is_multiple  
	 *
	 * @return  self
	 */
	public function set_is_multiple($is_multiple){
		$this->is_multiple = $is_multiple;

		return $this;
    }
    
    public function get_custom_field_view_params($view_params)
    {
        if($this->is_multiple == true){
            $select_field_name      = "{$view_params['field_name']}[]";
        }else{
            $select_field_name      = $view_params['field_name'];
        }

        $view_params['select_field_name']       = $select_field_name;

        return $view_params;
    }

    	/**
	 * Get the value of is_lou_multi_select
	 *
	 * @return mixed
	 */
	public function get_is_lou_multi_select(){
		return $this->is_lou_multi_select;
	}

	/**
	 * Set the value of is_lou_multi_select
	 *
	 * @param   mixed  $is_lou_multi_select  
	 *
	 * @return  self
	 */
	public function set_is_lou_multi_select($is_lou_multi_select){
		$this->is_lou_multi_select = $is_lou_multi_select;

		return $this;
    }
    
}
