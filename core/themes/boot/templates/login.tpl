<!DOCTYPE html>
<html>
	  <head>
	    <title>{$page_description}</title>
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
	    <link rel="apple-touch-startup-image" media="(min-device-width: 768px) and (orientation: portrait)" href="/img/splash-portrait.png" />
	    <link rel="apple-touch-startup-image" media="(min-device-width: 768px) and (orientation: landscape)" href="/img/splash-landscape.png" />
	    <link href='{$base_path}core/themes/boot/css/bootstrap.css' rel="stylesheet"/>
	    <link href='{$base_path}core/themes/boot/css/bootstrap-responsive.css' rel="stylesheet"/>
	    <script src="{$base_path}core/themes/boot/js/jquery-1.7.1.min.js"></script>
	    <script src="{$base_path}core/themes/boot/js/bootstrap.js"></script>
		<script src="{$base_path}core/themes/boot/js/jquery.backstretch.min.js"></script>
		<script>
		    $.backstretch("{$base_path}core/themes/boot/img/oceanwave.jpg");
		</script>
	  </head>
	  <body data-offset="50" data-target=".subnav" data-spy="scroll" data-twttr-rendered="true">
	  {if $arg.0 != 'lostpassword'}
		  <div class='login-header'>
				<p class='pull-right'><i class='icon icon-white icon-lock'></i> <a href='{$base_path}lostpassword/'>Forgot Your Password?</a></p>
			</div>
		{/if}
	  	<div class="container">
		  	<div class="row" style='margin-top: 120px;'>
		  		<div class="span12">
		  			<div class='login' id='login_form' style='display:none;'>
		  			{if $arg.0 == 'register'}
	  					<ul class="breadcrumb">
							  <li>
							    Register <span class="divider">/</span>
							  </li>
							  <li class="active">Step 1</li>
							</ul>
		  				<div class="progress progress-striped active">
							  <div class="bar" style="width: 20%;"></div>
							</div>
			        <form name='{$form_raw.meta.name}' method='{$form_raw.meta.method}' class='{$form_raw.meta.class}' action='{$form_raw.meta.action}' id='{$form_raw.meta.id}' style='margin-bottom: 10px;'>
	  						<input type='hidden' name='submitted_form' value='{$form_raw.fields.submitted_form.value}' placeholder='{$form_raw.fields.submitted_form.label}'/>
			          <input type='{$form_raw.fields.email.type}' name='{$form_raw.fields.email.name}' placeholder='{$form_raw.fields.email.label}' style='margin-bottom: 10px; width:274px;'/>
			          <input type='{$form_raw.fields.password.type}' name='{$form_raw.fields.password.name}' placeholder='{$form_raw.fields.password.label}' style='margin-bottom: 15px; width:274px;'/>
	  						<input type='{$form_raw.buttons.register_button.type}' value='{$form_raw.buttons.register_button.value}' class='btn btn-primary btn-large' style='width: 63%;'/>
	  						<a href='{$base_path}' class='btn btn-large pull-right' style='font-family: Arial;'><i class='icon-remove'></i> Cancel</a>
	  					</form>
		  			{elseif $arg.0 == 'lostpassword'}
		  				<ul class="breadcrumb">
							  <li><i class='icon-lock'></i> Password Assistant</li>
							</ul>
							<form name='{$form_raw.meta.name}' method='{$form_raw.meta.method}' class='{$form_raw.meta.class}' action='{$form_raw.meta.action}' id='{$form_raw.meta.id}' style='margin-bottom: 10px;'>
	  						<input type='hidden' name='submitted_form' value='{$form_raw.fields.submitted_form.value}' placeholder='{$form_raw.fields.submitted_form.label}'/>
			          <input type='{$form_raw.fields.email.type}' name='{$form_raw.fields.email.name}' placeholder='{$form_raw.fields.email.label}' style='margin-bottom: 10px; width:274px;'/>
			          <input type='{$form_raw.buttons.register_button.type}' value='{$form_raw.buttons.register_button.value}' class='btn btn-primary btn-large' style='width: 63%;'/>
	  						<a href='{$base_path}' class='btn btn-large pull-right' style='font-family: Arial;'><i class='icon-remove'></i> Cancel</a>
		  				</form>
		  			{else}	
		  				{if $messages}
		  					<div class='alert alert-danger'>
		  						<a class="close" data-dismiss="alert" href="#">&times;</a>
			  					{foreach from=$messages item=message}
			  						{$message}<br/>
			  					{/foreach}
		  					</div>
		  				{/if}
		  					<ul class="breadcrumb">
								  <li><i class='icon-user'></i> Authentication Required</li>
								</ul>
				        <form name='{$form_raw.meta.name}' method='{$form_raw.meta.method}' class='{$form_raw.meta.class}' action='{$form_raw.meta.action}' id='{$form_raw.meta.id}' style='margin-bottom: 10px;'>
				        	<input type='hidden' name='submitted_form' value='{$form_raw.fields.submitted_form.value}' placeholder='{$form_raw.fields.submitted_form.label}'/>
				          <input type='{$form_raw.fields.username.type}' name='{$form_raw.fields.username.name}' placeholder='{$form_raw.fields.username.label}' style='margin-bottom: 10px; width:274px;'/>
				          <input type='{$form_raw.fields.password.type}' name='{$form_raw.fields.password.name}' placeholder='{$form_raw.fields.password.label}' style='margin-bottom: 15px; width:274px;'/>
				          <input type='{$form_raw.buttons.login_button.type}' value='{$form_raw.buttons.login_button.value}' class='btn btn-primary btn-large' style='width: 60%;'/>
				          <a href='{$base_path}register/' class='btn btn-large pull-right' style='font-family: Arial;'><i class='icon-pencil'></i> Register</a>
				        </form>
				    {/if}
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