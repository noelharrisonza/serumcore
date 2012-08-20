<?php

/**
 * @file
 *
 * Manage all of the menu routing.
 */

class menu {
  /**
   * Route all of the menus.
   */
  function route() {
    global $theme;

    // Get the current active path.
    $current_path = get_current_path();

    $permissions = new permissions();
    $check_permissions = $permissions->check_perms();

    // Setup some theme arguments.
    $error = false;
    $theme_args = array();

    if ($check_permissions) {
      // Now use it to route visitors :).
      if (isset($current_path) && $current_path != 'index') {
        // We need to parse all of the url files.
        $urls = $this->parse_urls();

        // Deal with wild cards in the URLs and return the active URL.
        $active_url = build_urls($urls);
        $current_path = $active_url['system'];
        
        // Now we parse the correct URL.
        // TODO: add some permission checks at some point.
        if (isset($urls[$current_path])) {
          // Now we need to get the callback.
          $callback = $urls[$current_path]['callback'];
          $callback_array = explode('.', $callback);
          
          // Check to see if we are calling a custom file.
          if (isset($urls[$current_path]['file'])) {
            include_once serum_get_path('module', $urls[$current_path]['module']) .'/'. $urls[$current_path]['file'];
          }
          
          // Now we call the module class and invoke the menu item.
          ${$callback_array[0]} = new $callback_array[0]();

          // Set the initial page title and description.
          tpl_set('page_title', $urls[$current_path]['title']);
          tpl_set('page_description', $urls[$current_path]['description']);
          
          // Make sure that method does exist.
          if (method_exists(${$callback_array[0]}, $callback_array[1])) {
            ${$callback_array[0]}->{$callback_array[1]}();
          }
          else {
            // Otherwise just return a 404.
            four_oh_four();
            $error = true;
            $tpl = 'erorr.tpl';
          }
        }
        else {
          // Return a 404 error.
          $user->login();

          $error = true;
          $tpl = 'error.tpl';
        }
      }
      else {
        // If there is nothing in the menu we need to render the index page.
        $this->index();
      }
    }
    else {
      // Return the login form. Silly me.
      $permissions->login_form();

      $error = true;
      $tpl = 'login.tpl';
    }
    
    if (!$error) {
      $theme_args = array(
        'header' => true,
        'footer' => true,
      );
    }
    else {
      $theme_args = array(
        'template' => $tpl,
      );
    }
    
    // Render the theme.
    $theme->engine->render($theme_args);
  }
  
  /**
   * Render the index page.
   */
  function index() {
    // At some point we will need to write some code here.
    tpl_set('page_title', 'Home');
    tpl_set('page_description', 'This is the front page and it currently has bugger all on it :P');
  }
  
  /**
   * Break up the path into an array so that we can route it.
   */
  function parse_urls() {
    return get_all_urls();
  }
}
