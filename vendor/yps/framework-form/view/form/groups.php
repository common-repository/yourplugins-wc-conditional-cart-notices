<?php foreach($this->view['form']->get_groups() as $group_name => $group): ?>
    <div 
        class="card <?php echo $this->view['form']->get_group_property($group_name, 'wrapper_classes'); ?>" 
        data-display-if-field-name="<?php echo $group->get_display_if_field_name(); ?>" 
        data-display-if-field-values="<?php echo $this->get_view_helper()->html_json_encode($group->get_display_if_field_values()); ?>" 
        <?php echo (is_array($group->get_display_if_field_values()))?"style='display:none'":""; ?>>

        <div class="card-header">
            <?php echo $group->get_label(); ?>
        </div>

        <div class="card-body">
            <?php $group_type = (empty($group->get_type()))?\YPS\Framework\Form\v020_769_691\Form_Group::TYPE_FIELD:$group->get_type(); ?>
            <?php echo $this->get_framework_view('Form', "form/group/{$group_type}.php", array(
                'group_name'        => $group_name,
                'group'             => $group,
            )); ?>
        </div>
    </div>
<?php endforeach; ?>