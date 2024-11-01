<div 
    class="yps-query-builder" 
    data-filters="<?php echo $this->view['filters']; ?>"
    data-rules="<?php echo $this->view['rules']; ?>"
    data-target="input[name='<?php echo $this->view['field_name']; ?>']"
    ></div>

<input type="hidden" name="<?php echo $this->view['field_name']; ?>" value="" />