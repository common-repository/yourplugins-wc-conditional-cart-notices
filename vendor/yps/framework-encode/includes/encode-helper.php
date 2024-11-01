<?php

namespace YPS\Framework\Encode\v020_769_691;

class Encode_Helper {

    public function __construct($params = array()) {

    }

    /**
     * Encode an array to a HTML attribute. The array is converted to json
     * *
     * @param array $array
     * @return string
     */
    public static function array_to_html_attribute($array){
        return htmlspecialchars(json_encode($array), ENT_QUOTES, 'UTF-8');
    }

}



