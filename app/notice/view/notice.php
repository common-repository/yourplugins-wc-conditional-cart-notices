<div 
    class="yps-wc-dynamic-notices-alert" 
    style="<?php echo $this->view['template_entity']->get_notice_style(); ?>"
    <?php echo implode(" ", apply_filters('yps_wc_conditional_cart_notices/notice/view/notice::html_wrapper_attributes', array(), $this->view)); ?>
    >

    <div class="yps-wc-dynamic-notices-alert-image-wrapper" style="<?php echo $this->view['template_entity']->get_icon_style(); ?>" >
        <?php if(!empty($this->view['template_entity']->get('icon_image'))): ?>
            <img 
                src="<?php echo $this->view['template_entity']->get('icon_image'); ?>" 
            />
        <?php endif; ?>
    </div>

    <div class="yps-wc-dynamic-notices-alert-message-wrapper">
        <?php echo apply_filters('yps_wc_conditional_cart_notices/notice/view/notice::notice_message', $this->view['notice_entity']->get('notice_message'), $this->view); ?>
    </div>

    <div class="yps-wc-dynamic-notices-alert-button-wrapper">
        <?php if(!empty($this->view['notice_entity']->get('button_text'))): ?>
            <a 
                data-background-color="<?php echo $this->view['template_entity']->get('button_background_color'); ?>"
                data-background-color-hover="<?php echo $this->view['template_entity']->get('button_background_color_hover'); ?>" 
                data-border-color="<?php echo $this->view['template_entity']->get('button_border_color'); ?>"
                data-border-color-hover="<?php echo $this->view['template_entity']->get('button_border_color_hover'); ?>"
                class="btn button yps-wc-dynamic-notices-alert-button" 
                href="<?php echo $this->view['notice_entity']->get('button_url'); ?>"
                target="<?php echo ($this->view['notice_entity']->get('open_new_window') == true)?"_blank":"_self"; ?>"
                style="<?php echo $this->view['template_entity']->get_button_style(); ?>"
                >
                <?php echo apply_filters('yps_wc_conditional_cart_notices/notice/view/notice::button_text', $this->view['notice_entity']->get('button_text'), $this->view); ?>
            </a>
        <?php endif; ?>
    </div>


</div>