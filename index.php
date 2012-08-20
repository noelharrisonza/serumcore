<?php

/**
 * @file
 * The PHP page that serves all page requests on a Serum installation.
 *
 * The routines here dispatch control to the appropriate handler, which then
 * prints the appropriate page.
 */

error_reporting(E_ALL &~ E_NOTICE &~ E_WARNING);
ini_set('display_errors', true);

// Start sessions.
session_start();

// Clear the buffer.
ob_start();

//Root directory of Drupal installation.
define('SERUM_ROOT', getcwd());

// Include the common files.
require_once SERUM_ROOT .'/core/includes/common.inc';

// Fetch some settings.
global $settings;
$settings = parse_ini_file(SERUM_ROOT .'/custom/settings.ini', true);

// Setup a few more constants.
define('SERUM_THEME_ENGINE', $settings['general']['theme_engine']);
define('SERUM_THEME', $settings['general']['theme']);

// Include the bootstrap file.
require_once SERUM_ROOT .'/core/includes/bootstrap.inc';