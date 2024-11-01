<?php for($row = 0; $row <= $this->view['form']->get_rows_by_group($this->view['group_name']); $row++): ?>
    <div class="form-group row">
            <?php foreach($this->view['form']->get_fields_by_row($this->view['group_name'], $row) as $field_name => $field): ?>
                <?php if($field->get_disable_output() !== true): ?>

                    <div class="<?php echo $field->__get('wrapper_classes'); ?>" style="<?php echo ($field->get_hide() == true)?"display:none":""; ?>">

                        <?php if(!empty($field->get_text_before_field())): ?>
                            <small class='mb-3'><?php echo $field->get_text_before_field(); ?></small>
                        <?php endif; ?>

                        <?php echo $field->get_controller_view($this); ?>

                        <?php if(!empty($field->get_text_after_field())): ?>
                            <small><?php echo $field->get_text_after_field(); ?></small>
                        <?php endif; ?>

                    </div>

                <?php endif; ?>
            <?php endforeach; ?>
    </div>
<?php endfor; ?>