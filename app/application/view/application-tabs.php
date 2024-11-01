<div class="yps-bootstrap yps-plugin">

    <?php do_shortcode('[yps-plugin-header]'); ?>

    <div class="container-fluid">
        <ul class="nav nav-tabs mt-5">
            <li class="nav-item">
                <a 
                    class="nav-link <?php $this->html_requested_controller_name(array("Notice_Controller", "Application_Controller"), "active"); ?> " 
                    href="<?php echo $this->notice_config->get_list_url(); ?>">
                        <?php _e('Notices', 'yps-wc-conditional-cart-notices'); ?>
                </a>
            </li>

            <?php foreach(apply_filters('yps_wc_conditional_cart_notices_tabs', array()) as $tab): ?>
                <li class="nav-item">
                    <a 
                        class="nav-link <?php echo $tab['is_active']; ?> " 
                        href="<?php echo $tab['url']; ?>">
                            <?php echo $tab['label']; ?>
                    </a>
                </li>
            <?php endforeach; ?>

            


            
            <li class="nav-item">
                <a 
                    class="nav-link <?php $this->html_requested_controller_name("Settings_Controller", "active"); ?> " 
                    href="<?php echo $this->settings_config->get_settings_url(); ?>">
                    <?php _e('General Settings', 'yps-wc-conditional-cart-notices'); ?>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel">
                <?php (new \YPS\WC_Conditional_Cart_Notices\Notice_Controller($this->context, $this->params))->request_display(); ?>
                <?php (new \YPS\WC_Conditional_Cart_Notices\Settings_Controller($this->context, $this->params))->request_display(); ?>

                <?php do_action('yps_wc_conditional_cart_notices_tab_display'); ?>
            </div>
        </div>
    </div>

    <?php do_shortcode('[yps-plugin-footer]'); ?>
</div>

