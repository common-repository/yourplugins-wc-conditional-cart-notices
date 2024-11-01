<?php

namespace YPS\Framework\Query_Builder\v020_769_691;

use YPS\Framework\Core\v020_769_691\Base;
use YPS\Framework\Core\v020_769_691\Helper;
use YPS\Framework\Core\v020_769_691\View_Helper;

class Query_Builder_Helper extends Base {

    public $helper;
    public $params;
    
    public function __construct($context, $params = array()) {
        $this->helper           = new Helper($context);
        $this->params           = $params;
    }

    public static function init_localize_script(){
        Helper::localize_script("yps-framework-query-builder-query-builder", "YPS_FRAMEWORK_QUERY_BUILDER", array(
            'wc_products_url'   => Helper::get_ajax_url("yps_query", array('query' => 'products'))
        ));
    }
    
}
