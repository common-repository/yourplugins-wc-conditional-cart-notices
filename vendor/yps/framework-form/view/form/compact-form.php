<div class="yps-bootstrap yps-plugin">
    <div class="container-fluid">

            <form 
                id="<?php echo $this->view['form']->get_id(); ?>"
                method="POST" 
                action="" 
                class="yps-form yps-compact-form <?php echo ($this->view['form']->get_is_ajax_form() == true)?'yps-ajax-form':''; ?>"
                data-ajax-url="<?php echo $this->view['ajax_url']; ?>"
                >

                <?php echo $this->get_framework_view("Form", "form/partial/form-header.php"); ?>
                
                <!-- Draw fields -->
                <?php foreach($this->view['form']->get_fields() as $field): ?>
                    <div class="form-group" style="<?php echo ($field->get_hide() == true)?"display:none":""; ?>">
                        <?php if($field->get_disable_output() !== true): ?>

                            <?php if(!empty($field->get_text_before_field())): ?>
                                <small class='mb-3'><?php echo $field->get_text_before_field(); ?></small>
                            <?php endif; ?>

                            <?php echo $field->get_controller_view($this); ?>

                            <?php if(!empty($field->get_text_after_field())): ?>
                                <small><?php echo $field->get_text_after_field(); ?></small>
                            <?php endif; ?>

                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>

                <input type="hidden" name="form_task" value="save" />

            </form>
    </div>
    
    
</div>

