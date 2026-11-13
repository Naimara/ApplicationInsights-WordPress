=== Application Insights ===

Contributors: ApplicationInsights
Tags: Application Insights, monitoring, tracing, telemetry 
Stable Tag: 2.4
Requires at least: 5.9
Requires PHP: 8.3
Tested up to: 6.8
License: MIT
License URI: http://opensource.org/licenses/MIT

Integrates a WordPress site with Microsoft Application Insights.

== Description ==

Integrates a WordPress site with Microsoft Application Insights. More information about Application Insights can be found [here](http://azure.microsoft.com/en-us/documentation/articles/app-insights-get-started/). 

Active development is done on [GitHub](https://github.com/Microsoft/AppInsights-WordPress). 

Other SDKs and documentation can be found [here](https://github.com/Microsoft/AppInsights-Home).

This release requires PHP 8.3. Deploy the `vendor/` directory with the plugin, or run `composer install --no-security-blocking` in the plugin folder after upload.

== Installation ==

1. Upload all files (including `vendor/`) to the `/wp-content/plugins/application-insights/` directory, or upload from git and run `composer install --no-security-blocking` on the server.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to Settings -> Application Insights and enter the Instrumentation Key you received from http://portal.azure.com. Use direct link https://ms.portal.azure.com/#create/Microsoft.AppInsights to create a new Application Insights resource.

== Changelog ==

= 2.4 =
* Requires PHP 8.3; PHP 7.x is no longer supported.
* Removed PHP 8.2+ deprecation warnings when sending server-side telemetry (Composer patch for deprecated `utf8_encode` in the Application Insights PHP SDK).
* Updated admin and network settings for current WordPress APIs (`$new_allowed_options`, option sanitization, safer redirects and output escaping).
* Fixed multisite network option save sanitization (`sanitize_option_{$option}`).
* Skip client and server instrumentation when no instrumentation key is configured.
* Hardened request telemetry against missing `$_SERVER` values and undefined options.

= 2.3 =
* Added support for Wordpress Multisite Network.
* Support for `404` pages to be represented as failed requests in portal.

= 2.2 =
* Updated to the latest version of the Application Insights PHP SDK.

= 2.1 =
* Removed unnecessary custom event from being logged. 

= 2.0.2 =
* Fixed Client IP Issue by updating to 0.2.4 of the PHP SDK for Application Insights.

= 2.0.1 =
* Bug fixes.

= 2.0 =
* Expanded to integrate the full Application Insights PHP SDK.

= 1.1 =
* Updated to support latest release of Application Insights which supports automatic error logging.

= 1.0 =
* Initial version.
