<?php if(count($this->view['notices']) != 0): ?>
    <div class="yps-wc-conditional-cart-notices-wrapper" data-position="<?php echo $this->view['position_field']; ?>" data-position-value="<?php echo $this->view['position_value']; ?>">
        <?php foreach($this->view['notices'] as $notice_entity): ?>
            <?php if(\YPS\WC_Conditional_Cart_Notices\Notice_Helper::is_notice_visible($notice_entity, $this->view['position_field'], $this->view['position_value'])): ?>
                <?php if($notice_entity->is_rule_matched()): ?>

                    <?php

                        do_action('yps_wc_conditional_cart_notices_showing_notice', $notice_entity, $this->view['position_field'], $this->view['position_value']);

                        echo $this->view['controller']->get_view("notice", "notice.php", array(
                                'notice_entity'     => $notice_entity,
                                'template_entity'   => $notice_entity->get_template(),
                                'position_field'    => $this->view['position_field'],
                                'position_value'    => $this->view['position_value']
                        ));
                    ?>

                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>