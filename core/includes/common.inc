<?php

/**
 * @file
 *
 * All sorts of common functions.
 */

/**
 * Sanitise strings.
 */
function sanitise($string) {
  // Remove any extra whitespace.
  $santised_string = trim($string);
  
  // Strip out all of the tags.
  $sanitised_string = strip_tags($santised_string);
  
  // Return a nice and sanitised string.
  return $sanitised_string;
}

/**
 * Handle strings.
 */
function t($string) {
  // Run the string through some santisation.
  $string = sanitise($string);

  // Allow other modules to plugin to alter this string.
  // Like a translation function
  // Or perhaps some extra sanitisation.
  $modules = get_active_modules();
  $altered = $string;
  foreach ($modules as $module_key => $module_value) {
    // Load the module.
    $module = new $module_key();
    
    // Look specifically for the alter_t method.
    if (method_exists($module, 'alter_t')) {
      // Then run all the functions that alter this string.
      $altered = $module->alter_t($altered);
    }
  }
  
  // Make sure the string really is altered.
  if (isset($altered)) {
    return $altered;
  }

  return $string;
}

/**
 * Invoke module hooks.
 */
function module_invoke_all($hook) {
  // Get any extra arguments.
  $args = func_get_args();

  // Remove $hook from the arguments.
  unset($args[0]);

  // Get a list of all the active modules.
  $modules = get_active_modules();

  $return = array();
  
  // Loop through all of the modules.
  foreach ($modules as $module_key => $module_value) {
    // Load each module.
    $module = new $module_key();
    
    // Check if the methos exists in the module.
    if (method_exists($module, $hook)) {
      // Then call it with any associated functions.
      $result = call_user_func_array(array($module, $hook), $args);

      if (isset($result) && is_array($result)) {
        $return = array_merge_recursive($return, $result);
      }
      elseif (isset($result)) {
        $return[] = $result;
      }
    }
  }

  return $return;
}

/**
 * Fetch the path to a module or theme.
 */
function serum_get_path($type, $name) {
  // The module paths.
  $core_module = SERUM_ROOT ."/core/modules/$name/$name.module";
  $custom_module = SERUM_ROOT ."/core/modules/$name/$name.module";
  
  // The theme paths.
  $core_theme = SERUM_ROOT ."/core/themes/$name/$name.theme";
  $custom_theme = SERUM_ROOT ."/core/themes/$name/$name.theme";
  
  // Check where the paths are.
  if ($type == 'module') {
    if (file_exists($core_module)) {
      $path = SERUM_ROOT ."/core/modules/$name";
    }
    elseif (file_exists($custom_module)) {
      $path = SERUM_ROOT ."/custom/modules/$name";
    }
  }
  elseif ($type == 'theme') {
    if (file_exists($core_theme)) {
      $path = SERUM_ROOT ."/core/themes/$name";
    }
    elseif (file_exists($custom_theme)) {
      $path = SERUM_ROOT ."/custom/themes/$name";
    }
  }
  else {
    // If the type is not a module or theme we return false.
    return false;
  }
  
  // Return the path.
  return $path;
}

/**
 * Get the active path.
 */
function get_current_path() {
  // Check for a path.
  if (isset($_GET['q'])) {
    $current_path = sanitise($_GET['q']);
  }
  else {
    // Otherwise we must be on the index page.
    $current_path = 'index';
  }
  
  // Remove the trailing slash.
  $current_path = rtrim($current_path, '/');
  
  // Return the current path string.
  return $current_path;
}

/**
 * Break the URL into an array to get specific parts.
 */
function arg($arg = 'all') {
  // Fetch the current path.
  $current_path = get_current_path();
  
  // Break up the path.
  $args_array = explode('/', $current_path);
  
  // Now we need to either return a part or all.
  if ($arg == 'all') {
    return $args_array;
  }
  elseif (is_numeric($arg)) {
    // Make sure that the arg is always numeric if it is not 'all'
    if (isset($args_array[$arg])) {
      return $args_array[$arg];
    }
  }
  else {
    // Otherwise we have no idea what they want.
    return false;
  }
}

// Create base URL
function base_path() {
  $is_https = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on';
  
  $http_protocol = $is_https ? 'https' : 'http';
  $base_root = $http_protocol . '://' . $_SERVER['HTTP_HOST'];
  
  $base_url = $base_root;
  
  // $_SERVER['SCRIPT_NAME'] can, in contrast to $_SERVER['PHP_SELF'], not
  // be modified by a visitor.
  if ($dir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/')) {
    $base_path = $dir;
    $base_url .= $base_path;
    $base_path .= '/';
  }
  else {
    $base_path = '/';
  }
  
  // Return the base path :).
  return $base_path;
}

// Assign theme variables.
function tpl_set($key, $val) {
  global $theme;
  $theme->engine->assign($key, $val);
}

// Get all active modules.
function get_active_modules() {
  global $settings;
  global $db;
  $rs = $db->get_results("SELECT * FROM modules");
  foreach ($rs as $module) {
    $module_info = get_module_info($module->system_name);
    $active_modules[$module->system_name] = $module_info;
  }
  return $active_modules;
}

// Get module info.
function get_module_info($module) {
  $module_info = parse_ini_file(serum_get_path('module', $module) ."/$module.info");
  
  return $module_info;
}

// Get all the URLs associated with a module.
function get_module_urls($module) {
  $module = new $module();
  
  // Check if the module has a urls function.
  if (method_exists($module, 'urls')) {
    $urls = $module->urls();
    return $urls;
  }
}

// Get all of the URLs for all the active menus.
function get_all_urls() {
  $modules = get_active_modules();
  
  foreach ($modules as $mod_key => $mod_val) {
    $urls = get_module_urls($mod_key);
    
    if (!empty($urls)) {
      foreach ($urls as $url_key => $url_val) {
        $url_val['module'] = $mod_key;
        $url_val['path'] = explode('/', $url_key);
        $module_urls[$url_key] = $url_val;
      }
    }
  }
  return $module_urls;
}

// Get the menu tree of all the active modules.
function get_menu_tree() {
  // Get the module's URLs.
  $all_urls = get_all_urls();
  
  // Now collect the URLs for the module.
  foreach ($all_urls as $url_key => $url_val) {
    // Make sure that each URL has a type.
    if (!$url_val['type']) {
      // If there is no type set the it to normal.
      $url_val['type'] = 'normal';
    }
    
    if ($url_key == $url_val['module'] && $url_val['type'] != 'callback') {
      $urls[$url_val['module']][$url_val['module']] = $url_val;
    }
    else {
      if ($url_val['type'] != 'callback') {
        $urls[$url_val['module']][$url_val['module']]['children'][$url_key] = $url_val;
      }
    }
  }
  
  return $urls;
}

// Fetch the menu tree for a single module.
function get_module_menu_tree($module) {
  $tree = get_menu_tree();
  return $tree[$module];
}

// Print debug data.
function debug($data) {
  tpl_set('messages', '<pre>'. print_r($data, true) .'</pre>');
}

// Build the current URL and make sure to map all of the arguments.
function build_urls($urls) {
  foreach ($urls as $path => $item) {
    $parts = explode('/', $path);
    $number_parts = count($parts);
    $slashes = $number_parts - 1;

    $fixed_parts = array();

    $j = 0;
    for ($i = 0; $i <= $number_parts; $i++) {
      $part = $parts[$i];

      if (isset($part)) {
        if ($part == '%') {
          $part = arg($i);
        }

        $fixed_parts[$i] = $part;
      }

      $j++;
    }
    
    // Return the compiled URLs as well as their system equivalents.
    $the_urls[] = array(
      'active' => implode('/', $fixed_parts),
      'system' => implode('/', $parts),
    );
  }
  
  // Find the active URL and return it.
  foreach ($the_urls as $the_url) {
    if ($the_url['active'] == get_current_path()) {
      return $the_url;
    }
  }
  
  // Otherwise we don't know what they want...
  return false;
}

/**
 * Return a 404 error.
 */
function four_oh_four() {
  global $theme;

  tpl_set('error_type', '404');
  tpl_set('page_title', '404');
  tpl_set('page_description', 'Page not found');
  tpl_set('content','The page you were looking for could not be found. Please ensure you have typed in the address correctly. If this error persists, please contact the system developers and we will ensure that the issue is resolved.');
}

/**
 * Return a 403 error.
 */
function four_oh_three() {
  global $theme;
  
  tpl_set('error_type', '403');
  tpl_set('page_title', '403');
  tpl_set('page_description', 'Access denied');
  tpl_set('content','You do not have the adequate permissions to view this page. If you think this is an error, please feel free to contact the development team.');
}

function obj2arr($object,&$restructarray) {
 if (is_object($object)) {
  foreach($object as $key=>$value){
    obj2arr($value,$restructarray[$key]);
   }
  }
  else if(is_array($object)) {
    foreach($object as $key=>$value) {
      obj2arr($value,$restructarray[$key]);
    }
  }
  else {  
    $restructarray = $object;
  } 
}

function objectArray($object) {
  $array_out = array();
  obj2arr($object, $array_out);
  return $array_out;
}

/**
 * Set a pretty message.
 */
function serum_set_message($message, $type = 'status') {
  $_SESSION['serum_messages'] = $message;
}

// Tell the form api that this form has an error and cannot be processed.
function form_set_error($form, $form_errors = array()) {
  serum_set_message($form_errors, true);
}