<?php /* Smarty version 2.6.26, created on 2012-08-20 17:35:10
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'ucwords', 'header.tpl', 30, false),array('modifier', 'count', 'header.tpl', 36, false),)), $this); ?>
<!DOCTYPE html>
<html>
    <head>
      <title><?php echo $this->_tpl_vars['app_name']; ?>
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
      <div class="navbar navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </a>
                <a class="brand" href="<?php echo $this->_tpl_vars['base_path']; ?>
" style=''><?php echo $this->_tpl_vars['app_name']; ?>
</a>
                <div class="nav-collapse">
                <ul class="nav">
                    <li class="divider-vertical"></li>
                    <?php $_from = $this->_tpl_vars['active_modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['module']):
?>
                      <li><a href="<?php echo $this->_tpl_vars['base_path']; ?>
<?php echo $this->_tpl_vars['name']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['module']['name'])) ? $this->_run_mod_handler('ucwords', true, $_tmp) : ucwords($_tmp)); ?>
</a></li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
                <ul class="nav pull-right">
                  <li><a href="<?php echo $this->_tpl_vars['base_path']; ?>
contacts/logout">Logout</a></li>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->_tpl_vars['user']['title']; ?>
 <span class="badge badge-info"><?php echo count($this->_tpl_vars['notifications']); ?>
</span><b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          <?php if (count($this->_tpl_vars['notifications']) == 0): ?>
                            <li><a href='#'>Woot! You have no notifications!</a></li>
                          <?php else: ?>
                            <li><a href=''><?php echo $this->_tpl_vars['content']; ?>
</a></li>
                          <?php endif; ?>
                      </ul>
                  </li>
                </ul>
              </div><!--/.nav-collapse -->
            </div>
        </div>
      </div>
      <div class='container' style='margin-top: 50px;'>
        <header class="jumbotron subhead" id="overview">
            <div class="subnav">
                <ul class="nav nav-pills"><li class='active'><a href="<?php echo $this->_tpl_vars['base_path']; ?>
<?php echo $this->_tpl_vars['arg']['0']; ?>
">Home</a></li>
                  <?php $_from = $this->_tpl_vars['sub_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sub_key'] => $this->_tpl_vars['sub_item']):
?>
                    <li><a href="<?php echo $this->_tpl_vars['base_path']; ?>
<?php echo $this->_tpl_vars['sub_key']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['sub_item']['title'])) ? $this->_run_mod_handler('ucwords', true, $_tmp) : ucwords($_tmp)); ?>
</a></li>
                  <?php endforeach; endif; unset($_from); ?>
                </ul>
            </div>
        </header>
        <div class="row">
          <div class="span12">
            <div class="page-header">
                            <h1><?php echo $this->_tpl_vars['page_title']; ?>
 <small><?php echo $this->_tpl_vars['page_description']; ?>
</small></h1> 
              <div class="messages">
                <?php echo $this->_tpl_vars['messages']; ?>

              </div>
            </div>
          </div>
        </div>