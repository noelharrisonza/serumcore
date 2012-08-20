<?php /* Smarty version 2.6.26, created on 2012-08-16 23:22:43
         compiled from /Users/Noel/Development/serum/core/modules/contacts/templates/contacts-view.tpl */ ?>
<?php $_from = $this->_tpl_vars['keys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
	<?php echo $this->_tpl_vars['node'][$this->_tpl_vars['i']]; ?>

<?php endforeach; endif; unset($_from); ?>