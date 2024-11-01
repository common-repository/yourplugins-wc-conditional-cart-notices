<input 
    name="<?php echo $this->view['field_name']; ?>" 
    type="text" 
    class="yps-color-picker form-control" 
    <?php echo $this->view['field']->get_field_attributes() ?> 
    value="<?php echo isset($this->view['entity'])?$this->view['entity']->get($this->view['field_name']):$this->view['field']->get_value(); ?>" 
/>