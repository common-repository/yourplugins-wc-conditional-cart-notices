<?php

namespace YPS\WC_Conditional_Cart_Notices;

use YPS\WC_Conditional_Cart_Notices\Framework\Database\Model;

class Query_Builder_Model extends Model {
   

    public function __construct($context, $params = array()) {
        
        $this->set_entity_class("\\YPS\\WC_Conditional_Cart_Notices\\Query_Builder_Entity");
        $this->set_table_name("yps_wc_conditional_cart_notices_query_builder_tmp");
        $this->set_id_column("id");
        
        parent::__construct($context, $params);
    }

    public function create_table(){

        $columns    = apply_filters('yps_wc_conditional_cart_notices_query_builder_table_columns', array(
            "`id` int(11) NOT NULL AUTO_INCREMENT",

            "`price` decimal(6,2) DEFAULT NULL",
            "`product_quantity` int(11) DEFAULT NULL",

            "`total_quantity` decimal(6,2) DEFAULT NULL",
            "`total_amount` decimal(6,2) DEFAULT NULL"

        ));

        $sql = "CREATE TEMPORARY TABLE {$this->table} (" . implode(",", $columns) . ", PRIMARY KEY (`id`) ) {$this->get_charset_collate()};";

        $this->query($sql);

    }

    
}
