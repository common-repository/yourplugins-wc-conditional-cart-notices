<?php

namespace YPS\Framework\Record\v020_769_691;

use YPS\Framework\Core\v020_769_691\Base;
use YPS\Framework\Core\v020_769_691\Helper;

class Record extends Base {

    public $helper;

    public function __construct($context, $params = array()) {
        $this->helper           = new Helper($context, $params);

        parent::__construct($context, $params);
    }

}
