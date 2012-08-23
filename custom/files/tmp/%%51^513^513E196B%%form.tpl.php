<?php /* Smarty version 2.6.26, created on 2012-08-24 00:51:11
         compiled from form.tpl */ ?>
<form <?php echo $this->_tpl_vars['meta']; ?>
>
<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field_key'] => $this->_tpl_vars['field_val']):
?>
  <div class="control-group form-item form-item-type-<?php echo $this->_tpl_vars['field_val']['type']; ?>
" id="form-item-<?php echo $this->_tpl_vars['field_val']['name']; ?>
">
  <?php if (isset ( $this->_tpl_vars['field_val']['label'] )): ?>
    <label for="<?php echo $this->_tpl_vars['field_val']['name']; ?>
" class="control-label"><?php echo $this->_tpl_vars['field_val']['label']; ?>
</label>
  <?php endif; ?>
  
    <div class="controls">
    <?php if ($this->_tpl_vars['field_val']['type'] == 'text' || $this->_tpl_vars['field_val']['type'] == 'email' || $this->_tpl_vars['field_val']['type'] == 'tel' || $this->_tpl_vars['field_val']['type'] == 'number' || $this->_tpl_vars['field_val']['type'] == 'hidden'): ?>
      <input type="<?php echo $this->_tpl_vars['field_val']['type']; ?>
" name="<?php echo $this->_tpl_vars['field_val']['name']; ?>
" id="<?php echo $this->_tpl_vars['field_val']['name']; ?>
" class="<?php echo $this->_tpl_vars['field_val']['class']; ?>
" placeholder="<?php echo $this->_tpl_vars['field_val']['placeholder']; ?>
" value="<?php echo $this->_tpl_vars['field_val']['value']; ?>
" <?php if ($this->_tpl_vars['field_val']['required']): ?>required="required"<?php endif; ?> />
    <?php endif; ?>

    <?php if ($this->_tpl_vars['field_val']['type'] == 'password'): ?>
      <input type="<?php echo $this->_tpl_vars['field_val']['type']; ?>
" name="<?php echo $this->_tpl_vars['field_val']['name']; ?>
" id="<?php echo $this->_tpl_vars['field_val']['name']; ?>
" class="<?php echo $this->_tpl_vars['field_val']['class']; ?>
" placeholder="<?php echo $this->_tpl_vars['field_val']['placeholder']; ?>
" <?php if ($this->_tpl_vars['field_val']['required']): ?>required="required"<?php endif; ?> />
    <?php endif; ?>

    <?php if ($this->_tpl_vars['field_val']['type'] == 'textarea'): ?>
      <textarea name="<?php echo $this->_tpl_vars['field_val']['name']; ?>
" id="<?php echo $this->_tpl_vars['field_val']['name']; ?>
" class="<?php echo $this->_tpl_vars['field_val']['class']; ?>
" placeholder="<?php echo $this->_tpl_vars['field_val']['placeholder']; ?>
"></textarea>
    <?php endif; ?>
    
    <?php if ($this->_tpl_vars['field_val']['type'] == 'select'): ?>
      <select name="" class="" id="">
        <?php $_from = $this->_tpl_vars['field_val']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['opt_k'] => $this->_tpl_vars['opt_val']):
?>
          <option value="<?php echo $this->_tpl_vars['opt_key']; ?>
"><?php echo $this->_tpl_vars['opt_val']; ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
      </select>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['field_val']['type'] == 'radios'): ?>
      <?php $_from = $this->_tpl_vars['field_val']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rad_key'] => $this->_tpl_vars['rad_val']):
?>
        <div class="radio">
          <input type="radio" name="<?php echo $this->_tpl_vars['field_val']['name']; ?>
" value="<?php echo $this->_tpl_vars['rad_val']; ?>
" /> <?php echo $this->_tpl_vars['rad_val']; ?>

        </div>
      <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['field_val']['type'] == 'checkboxes'): ?>
      <?php $_from = $this->_tpl_vars['field_val']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['chk_key'] => $this->_tpl_vars['chk_val']):
?>
        <div class="checkbox">
          <input type="checkbox" name="<?php echo $this->_tpl_vars['field_val']['name']; ?>
[]" value="<?php echo $this->_tpl_vars['chk_val']; ?>
" /> <?php echo $this->_tpl_vars['chk_val']; ?>

        </div>
      <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>

    <?php if (isset ( $this->_tpl_vars['field_val']['description'] )): ?>
      <div class="help-block"><?php echo $this->_tpl_vars['field_val']['description']; ?>
</div>
    <?php endif; ?>
    </div>
  </div>
<?php endforeach; endif; unset($_from); ?>

<?php if (isset ( $this->_tpl_vars['buttons'] )): ?>
  <div class="form-actions">
  <?php $_from = $this->_tpl_vars['buttons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['but_key'] => $this->_tpl_vars['but_val']):
?>
    <input type="<?php echo $this->_tpl_vars['but_val']['type']; ?>
" value="<?php echo $this->_tpl_vars['but_val']['value']; ?>
" name="<?php echo $this->_tpl_vars['but_val']['name']; ?>
" id="<?php echo $this->_tpl_vars['but_val']['name']; ?>
" class="<?php echo $this->_tpl_vars['but_val']['class']; ?>
" />
  <?php endforeach; endif; unset($_from); ?>
  </div>
<?php endif; ?>
</form>