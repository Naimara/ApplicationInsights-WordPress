<?php
/*
Plugin Name: Application Insights
Plugin URI: https://github.com/Naimara/ApplicationInsights-WordPress
Description: Unofficial Application Insights integration for WordPress. Maintainer: Naimara. Developer: Maximiliano Sorribas. Not affiliated with Microsoft.
Version: 2.4
Author: Naimara
Author URI: https://github.com/Naimara
License: MIT
License URI: https://opensource.org/licenses/MIT
 */

//require_once 'vendor/autoload.php';
require_once __DIR__ . '/vendor/autoload.php';

// Enables Admin configuration experience
$mySettingsPage = new ApplicationInsights\WordPress\Settings();

// Enables client-side instrumentation
$clientInstrumentation = new ApplicationInsights\WordPress\Client_Instrumentation();
add_action('wp_head', array($clientInstrumentation, 'addPrefix'));

// Enables server-side instrumentation
$serverInstrumentation = new ApplicationInsights\WordPress\Server_Instrumentation();
add_action('shutdown', array($serverInstrumentation, 'endRequest'));
