<?php

namespace YPS\Framework\Woocommerce\v020_769_691;

use YPS\Framework\Core\v020_769_691\Base;

class Woocommerce_Helper extends Base {

    public static function is_woocommerce_activated(){
        if(!function_exists('WC')){
            return false;
        }

        return true;
    }

}
