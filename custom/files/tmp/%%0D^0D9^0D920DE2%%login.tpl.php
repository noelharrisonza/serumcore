<?php /* Smarty version 2.6.26, created on 2012-08-20 13:54:28
         compiled from /Users/Noel/Development/serum/core/themes/boot/templates/login.tpl */ ?>
<!DOCTYPE html>
<html>
	  <head>
	    <title><?php echo $this->_tpl_vars['page_description']; ?>
</title>
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
	    <link rel="apple-touch-startup-image" media="(min-device-width: 768px) and (orientation: portrait)" href="/img/splash-portrait.png" />
	    <link rel="apple-touch-startup-image" media="(min-device-width: 768px) and (orientation: landscape)" href="/img/splash-landscape.png" />
	    <link href='<?php echo $this->_tpl_vars['base_path']; ?>
core/themes/boot/css/bootstrap.css' rel="stylesheet"/>
	    <link href='<?php echo $this->_tpl_vars['base_path']; ?>
core/themes/boot/css/bootstrap-responsive.css' rel="stylesheet"/>
	    <script src="<?php echo $this->_tpl_vars['base_path']; ?>
core/themes/boot/js/jquery-1.7.1.min.js"></script>
	    <script src="<?php echo $this->_tpl_vars['base_path']; ?>
core/themes/boot/js/bootstrap.js"></script>
		<script src="<?php echo $this->_tpl_vars['base_path']; ?>
core/themes/boot/js/jquery.backstretch.min.js"></script>
		<script>
		    $.backstretch("<?php echo $this->_tpl_vars['base_path']; ?>
core/themes/boot/img/oceanwave.jpg");
		</script>
	  </head>
	  <body data-offset="50" data-target=".subnav" data-spy="scroll" data-twttr-rendered="true">
	  <?php if ($this->_tpl_vars['arg']['0'] != 'lostpassword'): ?>
		  <div class='login-header'>
				<p class='pull-right'><i class='icon icon-white icon-lock'></i> <a href='<?php echo $this->_tpl_vars['base_path']; ?>
lostpassword/'>Forgot Your Password?</a></p>
			</div>
		<?php endif; ?>
	  	<div class="container">
		  	<div class="row" style='margin-top: 120px;'>
		  		<div class="span12">
		  			<div class='login' id='login_form' style='display:none;'>
		  			<?php if ($this->_tpl_vars['arg']['0'] == 'register'): ?>
	  					<ul class="breadcrumb">
							  <li>
							    Register <span class="divider">/</span>
							  </li>
							  <li class="active">Step 1</li>
							</ul>
		  				<div class="progress progress-striped active">
							  <div class="bar" style="width: 20%;"></div>
							</div>
			        <form name='<?php echo $this->_tpl_vars['form_raw']['meta']['name']; ?>
' method='<?php echo $this->_tpl_vars['form_raw']['meta']['method']; ?>
' class='<?php echo $this->_tpl_vars['form_raw']['meta']['class']; ?>
' action='<?php echo $this->_tpl_vars['form_raw']['meta']['action']; ?>
' id='<?php echo $this->_tpl_vars['form_raw']['meta']['id']; ?>
' style='margin-bottom: 10px;'>
	  						<input type='hidden' name='submitted_form' value='<?php echo $this->_tpl_vars['form_raw']['fields']['submitted_form']['value']; ?>
' placeholder='<?php echo $this->_tpl_vars['form_raw']['fields']['submitted_form']['label']; ?>
'/>
			          <input type='<?php echo $this->_tpl_vars['form_raw']['fields']['email']['type']; ?>
' name='<?php echo $this->_tpl_vars['form_raw']['fields']['email']['name']; ?>
' placeholder='<?php echo $this->_tpl_vars['form_raw']['fields']['email']['label']; ?>
' style='margin-bottom: 10px; width:280px;'/>
			          <input type='<?php echo $this->_tpl_vars['form_raw']['fields']['password']['type']; ?>
' name='<?php echo $this->_tpl_vars['form_raw']['fields']['password']['name']; ?>
' placeholder='<?php echo $this->_tpl_vars['form_raw']['fields']['password']['label']; ?>
' style='margin-bottom: 15px; width:280px;'/>
	  						<input type='<?php echo $this->_tpl_vars['form_raw']['buttons']['register_button']['type']; ?>
' value='<?php echo $this->_tpl_vars['form_raw']['buttons']['register_button']['value']; ?>
' class='btn btn-primary btn-large' style='width: 63%;'/>
	  						<a href='<?php echo $this->_tpl_vars['base_path']; ?>
' class='btn btn-large' style='font-family: Arial; margin-left: 11px;'><i class='icon-remove'></i> Cancel</a>
	  					</form>
		  			<?php elseif ($this->_tpl_vars['arg']['0'] == 'lostpassword'): ?>
		  				<ul class="breadcrumb">
							  <li><i class='icon-lock'></i> Password Assistant</li>
							</ul>
							<form name='<?php echo $this->_tpl_vars['form_raw']['meta']['name']; ?>
' method='<?php echo $this->_tpl_vars['form_raw']['meta']['method']; ?>
' class='<?php echo $this->_tpl_vars['form_raw']['meta']['class']; ?>
' action='<?php echo $this->_tpl_vars['form_raw']['meta']['action']; ?>
' id='<?php echo $this->_tpl_vars['form_raw']['meta']['id']; ?>
' style='margin-bottom: 10px;'>
	  						<input type='hidden' name='submitted_form' value='<?php echo $this->_tpl_vars['form_raw']['fields']['submitted_form']['value']; ?>
' placeholder='<?php echo $this->_tpl_vars['form_raw']['fields']['submitted_form']['label']; ?>
'/>
			          <input type='<?php echo $this->_tpl_vars['form_raw']['fields']['email']['type']; ?>
' name='<?php echo $this->_tpl_vars['form_raw']['fields']['email']['name']; ?>
' placeholder='<?php echo $this->_tpl_vars['form_raw']['fields']['email']['label']; ?>
' style='margin-bottom: 10px; width:280px;'/>
			          <input type='<?php echo $this->_tpl_vars['form_raw']['buttons']['register_button']['type']; ?>
' value='<?php echo $this->_tpl_vars['form_raw']['buttons']['register_button']['value']; ?>
' class='btn btn-primary btn-large' style='width: 63%;'/>
	  						<a href='<?php echo $this->_tpl_vars['base_path']; ?>
' class='btn btn-large' style='font-family: Arial; margin-left: 11px;'><i class='icon-remove'></i> Cancel</a>
		  				</form>
		  			<?php else: ?>	
		  				<?php if ($this->_tpl_vars['messages']): ?>
		  					<div class='alert alert-danger'>
		  						<a class="close" data-dismiss="alert" href="#">&times;</a>
			  					<?php $_from = $this->_tpl_vars['messages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
			  						<?php echo $this->_tpl_vars['message']; ?>
<br/>
			  					<?php endforeach; endif; unset($_from); ?>
		  					</div>
		  				<?php endif; ?>
		  					<ul class="breadcrumb">
								  <li><i class='icon-user'></i> Authentication Required</li>
								</ul>
				        <form name='<?php echo $this->_tpl_vars['form_raw']['meta']['name']; ?>
' method='<?php echo $this->_tpl_vars['form_raw']['meta']['method']; ?>
' class='<?php echo $this->_tpl_vars['form_raw']['meta']['class']; ?>
' action='<?php echo $this->_tpl_vars['form_raw']['meta']['action']; ?>
' id='<?php echo $this->_tpl_vars['form_raw']['meta']['id']; ?>
' style='margin-bottom: 10px;'>
				        	<input type='hidden' name='submitted_form' value='<?php echo $this->_tpl_vars['form_raw']['fields']['submitted_form']['value']; ?>
' placeholder='<?php echo $this->_tpl_vars['form_raw']['fields']['submitted_form']['label']; ?>
'/>
				          <input type='<?php echo $this->_tpl_vars['form_raw']['fields']['username']['type']; ?>
' name='<?php echo $this->_tpl_vars['form_raw']['fields']['username']['name']; ?>
' placeholder='<?php echo $this->_tpl_vars['form_raw']['fields']['username']['label']; ?>
' style='margin-bottom: 10px; width:280px;'/>
				          <input type='<?php echo $this->_tpl_vars['form_raw']['fields']['password']['type']; ?>
' name='<?php echo $this->_tpl_vars['form_raw']['fields']['password']['name']; ?>
' placeholder='<?php echo $this->_tpl_vars['form_raw']['fields']['password']['label']; ?>
' style='margin-bottom: 15px; width:280px;'/>
				          <input type='<?php echo $this->_tpl_vars['form_raw']['buttons']['login_button']['type']; ?>
' value='<?php echo $this->_tpl_vars['form_raw']['buttons']['login_button']['value']; ?>
' class='btn btn-primary btn-large' style='width: 60%;'/><a href='<?php echo $this->_tpl_vars['base_path']; ?>
register/' class='btn btn-large' style='font-family: Arial; margin-left: 11px;'><i class='icon-pencil'></i> Register</a>
				        </form>
				    <?php endif; ?>
				    </div>
          </div>
			</div>
		</div>
		<div class='login-footer'>
			<p class='pull-left'>&copy; Serum Core (Pty) Ltd.</p>
			<p class='pull-right'>Serum is designed in Cape Town, South Africa.</p>
		</div>
		</body>
		<script type="text/javascript">
			jQuery('#login_form').fadeIn('slow');
		</script>
</html>