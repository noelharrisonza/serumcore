<?php

/**
 * @file
 * Functions that need to be loaded on every Crmzen request.
 */

// Current version.
define('VERSION', '1.0');

// Core compatibility.
define('SERUM_CORE_COMPATIBILITY', '1.x');

// Minimum supported version of PHP.
define('SERUM_MINIMUM_PHP', '5.3');

//Minimum recommended value of PHP memory_limit.
define('SERUM_MINIMUM_PHP_MEMORY_LIMIT', '32M');

// Regular expression to match PHP function names.
define('SERUM_PHP_FUNCTION_PATTERN', '[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*');

/**
 * Autoload classes.
 */
function __autoload($classname) {
  // Check if the user wants to load a module.
  $custom_modules = SERUM_ROOT ."/custom/modules/$classname/$classname.module";
  $core_modules = SERUM_ROOT ."/core/modules/$classname/$classname.module";

  // Or a theme.
  $custom_themes = SERUM_ROOT ."/custom/themes/$classname/$classname.theme";
  $core_themes = SERUM_ROOT ."/core/themes/$classname/$classname.theme";

  // Or what about a standard class?
  $classes = SERUM_ROOT ."/core/classes/$classname/$classname.class.php";
  
  // Now we need to check which of those paths is correct.
  if (file_exists($custom_modules)) {
    include_once $custom_modules;
  }
  elseif (file_exists($core_modules)) {
    include_once $core_modules;
  }
  elseif (file_exists($custom_themes)) {
    include_once $custom_themes;
  }
  elseif (file_exists($core_themes)) {
    include_once $core_themes;
  }
  elseif (file_exists($classes)) {
    include_once $classes;
  }
}

// SERUM SQL
require_once(SERUM_ROOT . '/library/serumsql/shared/ez_sql_core.php');
require_once(SERUM_ROOT . '/library/serumsql/mysql/ez_sql_mysql.php');

// Create the Database object for localised data :)
if ( ! isset($db) ) {
  $db = new ezSQL_mysql($settings['database']['user'], $settings['database']['password'], $settings['database']['database'], $settings['database']['host']);
  $db->query("SET NAMES utf8");
}

/**
 * Call the classes.
 */

// Call up the theme.
$theme = new theme();

// Notifications.
$notifications = new notifications();

// Call up the menu router.
$menu = new menu();
$menu->route();