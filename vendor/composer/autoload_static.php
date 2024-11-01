<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitYPS_WC_Conditional_Cart_Notices_Autoloader
{
    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'YPS\\WC_Conditional_Cart_Notices\\' => 32,
            'YPS\\Framework\\Wordpress\\' => 24,
            'YPS\\Framework\\Woocommerce\\' => 26,
            'YPS\\Framework\\String\\' => 21,
            'YPS\\Framework\\Settings\\' => 23,
            'YPS\\Framework\\Record\\' => 21,
            'YPS\\Framework\\Query_Builder\\' => 28,
            'YPS\\Framework\\Plugin\\' => 21,
            'YPS\\Framework\\Form\\' => 19,
            'YPS\\Framework\\Encode\\' => 21,
            'YPS\\Framework\\Database\\' => 23,
            'YPS\\Framework\\Core\\' => 19,
        ),
        'M' => 
        array (
            'MatthiasMullie\\PathConverter\\' => 29,
            'MatthiasMullie\\Minify\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'YPS\\WC_Conditional_Cart_Notices\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'YPS\\Framework\\Wordpress\\' => 
        array (
            0 => __DIR__ . '/..' . '/yps/framework-wordpress/includes',
        ),
        'YPS\\Framework\\Woocommerce\\' => 
        array (
            0 => __DIR__ . '/..' . '/yps/framework-woocommerce/includes',
        ),
        'YPS\\Framework\\String\\' => 
        array (
            0 => __DIR__ . '/..' . '/yps/framework-string/includes',
        ),
        'YPS\\Framework\\Settings\\' => 
        array (
            0 => __DIR__ . '/..' . '/yps/framework-settings/includes',
        ),
        'YPS\\Framework\\Record\\' => 
        array (
            0 => __DIR__ . '/..' . '/yps/framework-record/includes',
        ),
        'YPS\\Framework\\Query_Builder\\' => 
        array (
            0 => __DIR__ . '/..' . '/yps/framework-query-builder/includes',
        ),
        'YPS\\Framework\\Plugin\\' => 
        array (
            0 => __DIR__ . '/..' . '/yps/framework-plugin/includes',
        ),
        'YPS\\Framework\\Form\\' => 
        array (
            0 => __DIR__ . '/..' . '/yps/framework-form/includes',
        ),
        'YPS\\Framework\\Encode\\' => 
        array (
            0 => __DIR__ . '/..' . '/yps/framework-encode/includes',
        ),
        'YPS\\Framework\\Database\\' => 
        array (
            0 => __DIR__ . '/..' . '/yps/framework-database/includes',
        ),
        'YPS\\Framework\\Core\\' => 
        array (
            0 => __DIR__ . '/..' . '/yps/framework-core/includes',
        ),
        'MatthiasMullie\\PathConverter\\' => 
        array (
            0 => __DIR__ . '/..' . '/externals/path-converter/src',
        ),
        'MatthiasMullie\\Minify\\' => 
        array (
            0 => __DIR__ . '/..' . '/externals/minify/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'YPS\\Framework\\Core\\v020_769_691\\Application' => __DIR__ . '/..' . '/yps/framework-core/includes/application.php',
        'YPS\\Framework\\Core\\v020_769_691\\Base' => __DIR__ . '/..' . '/yps/framework-core/includes/base.php',
        'YPS\\Framework\\Core\\v020_769_691\\Config' => __DIR__ . '/..' . '/yps/framework-core/includes/config.php',
        'YPS\\Framework\\Core\\v020_769_691\\Context' => __DIR__ . '/..' . '/yps/framework-core/includes/context.php',
        'YPS\\Framework\\Core\\v020_769_691\\Controller' => __DIR__ . '/..' . '/yps/framework-core/includes/controller.php',
        'YPS\\Framework\\Core\\v020_769_691\\Helper' => __DIR__ . '/..' . '/yps/framework-core/includes/helper.php',
        'YPS\\Framework\\Core\\v020_769_691\\Module' => __DIR__ . '/..' . '/yps/framework-core/includes/module.php',
        'YPS\\Framework\\Core\\v020_769_691\\Plugin_Helper' => __DIR__ . '/..' . '/yps/framework-plugin/includes/plugin-helper.php',
        'YPS\\Framework\\Core\\v020_769_691\\View' => __DIR__ . '/..' . '/yps/framework-core/includes/view.php',
        'YPS\\Framework\\Core\\v020_769_691\\View_Helper' => __DIR__ . '/..' . '/yps/framework-core/includes/view-helper.php',
        'YPS\\Framework\\Database\\v020_769_691\\Database_Helper' => __DIR__ . '/..' . '/yps/framework-database/includes/database-helper.php',
        'YPS\\Framework\\Database\\v020_769_691\\Entity' => __DIR__ . '/..' . '/yps/framework-database/includes/entity.php',
        'YPS\\Framework\\Database\\v020_769_691\\Model' => __DIR__ . '/..' . '/yps/framework-database/includes/model.php',
        'YPS\\Framework\\Database\\v020_769_691\\Search_Query' => __DIR__ . '/..' . '/yps/framework-database/includes/search-query.php',
        'YPS\\Framework\\Database\\v020_769_691\\Session_Model' => __DIR__ . '/..' . '/yps/framework-database/includes/session-model.php',
        'YPS\\Framework\\Encode\\v020_769_691\\Encode_Helper' => __DIR__ . '/..' . '/yps/framework-encode/includes/encode-helper.php',
        'YPS\\Framework\\Form\\v020_769_691\\Button_Form_Field' => __DIR__ . '/..' . '/yps/framework-form/includes/button-form-field.php',
        'YPS\\Framework\\Form\\v020_769_691\\Button_Group_Form_Field' => __DIR__ . '/..' . '/yps/framework-form/includes/button-group-form-field.php',
        'YPS\\Framework\\Form\\v020_769_691\\Checkbox_List_Form_Field' => __DIR__ . '/..' . '/yps/framework-form/includes/checkbox-list-form-field.php',
        'YPS\\Framework\\Form\\v020_769_691\\Color_Form_Field' => __DIR__ . '/..' . '/yps/framework-form/includes/color-form-field.php',
        'YPS\\Framework\\Form\\v020_769_691\\Form' => __DIR__ . '/..' . '/yps/framework-form/includes/form.php',
        'YPS\\Framework\\Form\\v020_769_691\\Form_Controller' => __DIR__ . '/..' . '/yps/framework-form/includes/form-controller.php',
        'YPS\\Framework\\Form\\v020_769_691\\Form_Field' => __DIR__ . '/..' . '/yps/framework-form/includes/form-field.php',
        'YPS\\Framework\\Form\\v020_769_691\\Form_Group' => __DIR__ . '/..' . '/yps/framework-form/includes/form-group.php',
        'YPS\\Framework\\Form\\v020_769_691\\Form_View' => __DIR__ . '/..' . '/yps/framework-form/includes/form-view.php',
        'YPS\\Framework\\Form\\v020_769_691\\Label_Form_Field' => __DIR__ . '/..' . '/yps/framework-form/includes/label-form-field.php',
        'YPS\\Framework\\Form\\v020_769_691\\Modal_Form_Field' => __DIR__ . '/..' . '/yps/framework-form/includes/modal-form-field.php',
        'YPS\\Framework\\Form\\v020_769_691\\Numeric_Form_Field' => __DIR__ . '/..' . '/yps/framework-form/includes/numeric-form-field.php',
        'YPS\\Framework\\Form\\v020_769_691\\Select_Form_Field' => __DIR__ . '/..' . '/yps/framework-form/includes/select-form-field.php',
        'YPS\\Framework\\Form\\v020_769_691\\Spinner_Form_Field' => __DIR__ . '/..' . '/yps/framework-form/includes/spinner-form-field.php',
        'YPS\\Framework\\Form\\v020_769_691\\Text_Form_Field' => __DIR__ . '/..' . '/yps/framework-form/includes/text-form-field.php',
        'YPS\\Framework\\Form\\v020_769_691\\Tree_Select_Form_Field' => __DIR__ . '/..' . '/yps/framework-form/includes/tree-select-form-field.php',
        'YPS\\Framework\\Form\\v020_769_691\\WP_Editor_Form_Field' => __DIR__ . '/..' . '/yps/framework-form/includes/wp-editor-form-field.php',
        'YPS\\Framework\\Form\\v020_769_691\\WP_Media_Form_Field' => __DIR__ . '/..' . '/yps/framework-form/includes/wp-media-form-field.php',
        'YPS\\Framework\\Plugin\\v020_769_691\\Plugin' => __DIR__ . '/..' . '/yps/framework-plugin/includes/plugin-file.php',
        'YPS\\Framework\\Plugin\\v020_769_691\\Plugin_Controller' => __DIR__ . '/..' . '/yps/framework-plugin/includes/plugin-controller.php',
        'YPS\\Framework\\Query_Builder\\v020_769_691\\Query_Builder_Form_Field' => __DIR__ . '/..' . '/yps/framework-query-builder/includes/query-builder-form-field.php',
        'YPS\\Framework\\Query_Builder\\v020_769_691\\Query_Builder_Helper' => __DIR__ . '/..' . '/yps/framework-query-builder/includes/query-builder-helper.php',
        'YPS\\Framework\\Record\\v020_769_691\\Record' => __DIR__ . '/..' . '/yps/framework-record/includes/record.php',
        'YPS\\Framework\\Record\\v020_769_691\\Record_Config' => __DIR__ . '/..' . '/yps/framework-record/includes/record-config.php',
        'YPS\\Framework\\Record\\v020_769_691\\Record_Controller' => __DIR__ . '/..' . '/yps/framework-record/includes/record-controller.php',
        'YPS\\Framework\\Record\\v020_769_691\\Record_Entity' => __DIR__ . '/..' . '/yps/framework-record/includes/record-entity.php',
        'YPS\\Framework\\Record\\v020_769_691\\Record_Form' => __DIR__ . '/..' . '/yps/framework-record/includes/record-form.php',
        'YPS\\Framework\\Record\\v020_769_691\\Record_Model' => __DIR__ . '/..' . '/yps/framework-record/includes/record-model.php',
        'YPS\\Framework\\Record\\v020_769_691\\Record_Module' => __DIR__ . '/..' . '/yps/framework-record/includes/record-module.php',
        'YPS\\Framework\\Record\\v020_769_691\\Record_Session_Model' => __DIR__ . '/..' . '/yps/framework-record/includes/record-session-model.php',
        'YPS\\Framework\\Record\\v020_769_691\\Record_Table' => __DIR__ . '/..' . '/yps/framework-record/includes/record-table.php',
        'YPS\\Framework\\Record\\v020_769_691\\Record_View' => __DIR__ . '/..' . '/yps/framework-record/includes/record-view.php',
        'YPS\\Framework\\Settings\\v020_769_691\\Settings_Config' => __DIR__ . '/..' . '/yps/framework-settings/includes/settings-config.php',
        'YPS\\Framework\\Settings\\v020_769_691\\Settings_Controller' => __DIR__ . '/..' . '/yps/framework-settings/includes/settings-controller.php',
        'YPS\\Framework\\Settings\\v020_769_691\\Settings_Entity' => __DIR__ . '/..' . '/yps/framework-settings/includes/settings-entity.php',
        'YPS\\Framework\\Settings\\v020_769_691\\Settings_Form_View' => __DIR__ . '/..' . '/yps/framework-settings/includes/settings-view.php',
        'YPS\\Framework\\Settings\\v020_769_691\\Settings_Helper' => __DIR__ . '/..' . '/yps/framework-settings/includes/settings-helper.php',
        'YPS\\Framework\\Settings\\v020_769_691\\Settings_Model' => __DIR__ . '/..' . '/yps/framework-settings/includes/settings-model.php',
        'YPS\\Framework\\String\\v020_769_691\\Naming_Helper' => __DIR__ . '/..' . '/yps/framework-string/includes/naming-helper.php',
        'YPS\\Framework\\String\\v020_769_691\\String_Helper' => __DIR__ . '/..' . '/yps/framework-string/includes/string-helper.php',
        'YPS\\Framework\\Woocommerce\\v020_769_691\\Woocommerce_Ajax_Query_Helper' => __DIR__ . '/..' . '/yps/framework-woocommerce/includes/woocommerce-ajax-query-helper.php',
        'YPS\\Framework\\Woocommerce\\v020_769_691\\Woocommerce_Category_Helper' => __DIR__ . '/..' . '/yps/framework-woocommerce/includes/woocommerce-category-helper.php',
        'YPS\\Framework\\Woocommerce\\v020_769_691\\Woocommerce_Helper' => __DIR__ . '/..' . '/yps/framework-woocommerce/includes/woocommerce-helper.php',
        'YPS\\Framework\\Woocommerce\\v020_769_691\\Woocommerce_Product_Helper' => __DIR__ . '/..' . '/yps/framework-woocommerce/includes/woocommerce-product-helper.php',
        'YPS\\Framework\\Woocommerce\\v020_769_691\\Woocommerce_Shipping_Method_Helper' => __DIR__ . '/..' . '/yps/framework-woocommerce/includes/woocommerce-shipping-method-helper.php',
        'YPS\\Framework\\Woocommerce\\v020_769_691\\Woocommerce_Variable_Product_Helper' => __DIR__ . '/..' . '/yps/framework-woocommerce/includes/woocommerce-variable-product-helper.php',
        'YPS\\Framework\\Wordpress\\v020_769_691\\Wordpress_Helper' => __DIR__ . '/..' . '/yps/framework-wordpress/includes/wordpress-helper.php',
        'YPS\\Framework\\Wordpress\\v020_769_691\\Wordpress_Multisite_Helper' => __DIR__ . '/..' . '/yps/framework-wordpress/includes/wordpress-multisite-helper.php',
        'YPS\\WC_Conditional_Cart_Notices\\Application_Controller' => __DIR__ . '/../..' . '/app/application/application-controller.php',
        'YPS\\WC_Conditional_Cart_Notices\\Notice_Config' => __DIR__ . '/../..' . '/app/notice/notice-config.php',
        'YPS\\WC_Conditional_Cart_Notices\\Notice_Controller' => __DIR__ . '/../..' . '/app/notice/notice-controller.php',
        'YPS\\WC_Conditional_Cart_Notices\\Notice_Entity' => __DIR__ . '/../..' . '/app/notice/notice-entity.php',
        'YPS\\WC_Conditional_Cart_Notices\\Notice_Form' => __DIR__ . '/../..' . '/app/notice/notice-form.php',
        'YPS\\WC_Conditional_Cart_Notices\\Notice_Helper' => __DIR__ . '/../..' . '/app/notice/notice-helper.php',
        'YPS\\WC_Conditional_Cart_Notices\\Notice_Model' => __DIR__ . '/../..' . '/app/notice/notice-model.php',
        'YPS\\WC_Conditional_Cart_Notices\\Notice_Table' => __DIR__ . '/../..' . '/app/notice/notice-table.php',
        'YPS\\WC_Conditional_Cart_Notices\\Query_Builder_Entity' => __DIR__ . '/../..' . '/app/query-builder/query-builder-entity.php',
        'YPS\\WC_Conditional_Cart_Notices\\Query_Builder_Helper' => __DIR__ . '/../..' . '/app/query-builder/query-builder-helper.php',
        'YPS\\WC_Conditional_Cart_Notices\\Query_Builder_Model' => __DIR__ . '/../..' . '/app/query-builder/query-builder-model.php',
        'YPS\\WC_Conditional_Cart_Notices\\Settings_Config' => __DIR__ . '/../..' . '/app/settings/settings-config.php',
        'YPS\\WC_Conditional_Cart_Notices\\Settings_Controller' => __DIR__ . '/../..' . '/app/settings/settings-controller.php',
        'YPS\\WC_Conditional_Cart_Notices\\Settings_Entity' => __DIR__ . '/../..' . '/app/settings/settings-entity.php',
        'YPS\\WC_Conditional_Cart_Notices\\Settings_Form' => __DIR__ . '/../..' . '/app/settings/settings-form.php',
        'YPS\\WC_Conditional_Cart_Notices\\Settings_Helper' => __DIR__ . '/../..' . '/app/settings/settings-helper.php',
        'YPS\\WC_Conditional_Cart_Notices\\Settings_Model' => __DIR__ . '/../..' . '/app/settings/settings-model.php',
        'YPS\\WC_Conditional_Cart_Notices\\Template_Entity' => __DIR__ . '/../..' . '/app/template/template-entity.php',
        'YPS\\WC_Conditional_Cart_Notices\\WC_Conditional_Cart_Notices_Application' => __DIR__ . '/../..' . '/app/application/wc-conditional-cart-notices-application.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitYPS_WC_Conditional_Cart_Notices_Autoloader::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitYPS_WC_Conditional_Cart_Notices_Autoloader::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitYPS_WC_Conditional_Cart_Notices_Autoloader::$classMap;

        }, null, ClassLoader::class);
    }
}