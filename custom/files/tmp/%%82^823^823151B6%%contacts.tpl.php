<?php /* Smarty version 2.6.26, created on 2012-08-20 17:56:38
         compiled from /Users/Noel/Development/serumcore/core/modules/contacts/templates/contacts.tpl */ ?>
<div class="row">
	<div class="span3">
		<div class="well" style="padding: 8px 0;">
		  <ul class="nav nav-list">
		    <?php $_from = $this->_tpl_vars['contacts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['contact']):
?>
					<li><a href="<?php echo $this->_tpl_vars['base_path']; ?>
contacts/view/<?php echo $this->_tpl_vars['contact']['id']; ?>
"><i class="icon-user"></i> <?php echo $this->_tpl_vars['contact']['title']; ?>
</a></li>
				<?php endforeach; endif; unset($_from); ?>
		  </ul>
		</div> 
	</div>
</div>