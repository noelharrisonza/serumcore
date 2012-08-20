<?php /* Smarty version 2.6.26, created on 2012-08-16 23:29:37
         compiled from /Users/Noel/Development/serum/core/themes/boot/templates/error.tpl */ ?>
<!DOCTYPE html>
<html>
	  <head>
	    <title>Error <?php echo $this->_tpl_vars['page_title']; ?>
 | <?php echo $this->_tpl_vars['page_description']; ?>
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
	  </head>
	  <body data-offset="50" data-target=".subnav" data-spy="scroll" data-twttr-rendered="true">
	  	<div class="container">
		  	<div class="row" style='margin-top: 120px;'>
		  		<div class="span12">
						<div class="page-header">
              <h1><?php echo $this->_tpl_vars['page_title']; ?>
 <small><?php echo $this->_tpl_vars['page_description']; ?>
!</small></h1> 
            </div>
            <?php echo $this->_tpl_vars['content']; ?>

            
            <br/><br/>
            <a href="javascript:history.go(-1)" class='btn btn-primary'>Go Back</a>
					</div>
				</div>
			</div>
		</body>
</html>