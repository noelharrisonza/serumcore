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
      <div class="navbar navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </a>
                <a class="brand" href="#" style=''>cerum</a>
                <div class="nav-collapse">
                <ul class="nav">
                    <li class="divider-vertical"></li>
                    {foreach from=$active_modules item=module}
                      <li><a href="/{$module}">{$module|ucwords}</a></li>
                    {/foreach}
                </ul>
                <ul class="nav pull-right">
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Notifications <span class="badge badge-info">{$notifications|@count}</span><b class="caret"></b></a>
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

      <div class='container' style='margin-top: 50px;'>
        <div class="row">
          <div class="span12">
            <div class="page-header">
              <ul class="nav nav-pills" style="float:right">
                <li><a href="/uniti/personadmin/create">Add Person</a></li> 
                <li><a href="/uniti/place/new">Add Place</a></li>
                <li><a href="/uniti/group/new">Add Group</a></li> 
              </ul>
              <h1>{$page_title} <small>{$page_description}</small></h1>
              
              <div class="messages">
                {$messages}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class='footer'>
        <div class='container'>
          <div class='row'>
            <div class='span12' style='text-align:right;'>
              Designed by <a href=''>Serum</a> in Cape Town, South Africa.
            </div>
          </div>
        </div>
      </div>
    </body>
    <script src="$base_path}core/themes/umoya/js/application.js"></script>
</html>


