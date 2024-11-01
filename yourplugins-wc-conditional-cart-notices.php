<?php
/*
Plugin Name: YourPlugins Conditional Cart Notices for WooCommerce
Plugin URI:  https://yourplugins.com/documentation/your-woocommerce-conditional-cart-notices/getting-started
Plugin Code: yps-wc-conditional-cart-notices
Description: YourPlugins Conditional Cart Notices for WooCommerce
Version:     1.2.10
Author:      yourplugins.com
Author URI:  https://yourplugins.com
License:     GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Domain Path: /app/lang
Text Domain: yps-wc-conditional-cart-notices
*/

require_once 'vendor/autoload.php';
require_once 'autoload/aliases.php';

use \YPS\WC_Conditional_Cart_Notices\Framework\Core\Context;

$context            = new Context();

$context->set_plugin_name("YourPlugins Conditional Cart Notices");
$context->set_plugin_code("yourplugins-wc-conditional-cart-notices");
$context->set_plugin_file(__FILE__);
$context->set_plugin_namespace("\\YPS\\WC_Conditional_Cart_Notices");
$context->set_plugin_version("1.2.10");
$context->set_init_priority(1000);

$context->add_plugin_dependency(
    'woocommerce', 
    'WooCommerce', 
    '\YPS\WC_Conditional_Cart_Notices\Framework\Woocommerce\Woocommerce_Helper::is_woocommerce_activated'
);

$context->init_framework();

$GLOBALS['yps-wc-conditional-cart-notices-context']     = $context;
$GLOBALS['yps-wc-conditional-cart-notices']             = new \YPS\WC_Conditional_Cart_Notices\WC_Conditional_Cart_Notices_Application($context);
