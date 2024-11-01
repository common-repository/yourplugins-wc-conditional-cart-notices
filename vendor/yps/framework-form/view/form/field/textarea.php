<textarea 
    name="<?php echo $this->view['field_name']; ?>" 
    <?php echo $this->view['field']->get_field_attributes() ?> 
><?php echo isset($this->view['entity'])?$this->view['entity']->get($this->view['field_name']):$this->view['field']->get_value(); ?></textarea>
