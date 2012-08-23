<!DOCTYPE html>
<html>
    <head>
      <title>{$app_name}</title>
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
    </head>
    <body data-offset="50" data-target=".subnav" data-spy="scroll" data-twttr-rendered="true">
      <div class="navbar navbar-inverse navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </a>
                <a class="brand" href="{$base_path}" style=''>{$app_name}</a>
                <div class="nav-collapse">
                <ul class="nav">
                    <li class="divider-vertical"></li>
                    {foreach from=$active_modules key=name item=module}
                      <li><a href="{$base_path}{$name}">{$module.name|ucwords}</a></li>
                    {/foreach}
                </ul>
                <ul class="nav pull-right">
                  <li><a href="{$base_path}contacts/logout">Logout</a></li>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">{$user.title} <span class="badge badge-info">{$notifications|@count}</span><b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          {if $notifications|@count == 0}
                            <li><a href='#'>Woot! You have no notifications!</a></li>
                          {else}
                            <li><a href=''>{$content}</a></li>
                          {/if}
                      </ul>
                  </li>
                </ul>
              </div><!--/.nav-collapse -->
            </div>
        </div>
      </div>
      <div class='container-fluid' style='margin-top: 50px;'>
        <header class="jumbotron subhead" id="overview">
            <div class="subnav">
                <ul class="nav nav-pills"><li class='active'><a href="{$base_path}{$arg.0}">Home</a></li>
                  {foreach from=$sub_menu key=sub_key item=sub_item}
                    <li><a href="{$base_path}{$sub_key}">{$sub_item.title|ucwords}</a></li>
                  {/foreach}
                </ul>
            </div>
        </header>
        <div class="row-fluid">
          <div class="span2">

          </div>
          <div class='span10'>
            <div class="page-header">
              {*<ul class="nav nav-pills" style="float:right">
                {foreach from=$sub_menu key=sub_key item=sub_item}
                  <li><a href="{$base_path}{$sub_key}">{$sub_item.name|ucwords}</a></li>
                {/foreach}
              </ul>*}
              <h1>{$page_title} <small>{$page_description}</small></h1> 
            </div>
              <div class="messages">
                {$messages}
              </div>