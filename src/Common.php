<?php

namespace ApplicationInsights\WordPress;

/**
 * Common code shared thru the application.
 */
class Common
{
    /**
     * Application Insights options for the current site or network.
     *
     * @return array<string, string>
     */
    public static function getPluginOptions(): array {
        if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }

        if ( is_multisite() && is_plugin_active_for_network( 'application-insights/ApplicationInsightsPlugin.php' ) ) {
            $options = get_site_option( 'applicationinsights_options' );
        } else {
            $options = get_option( 'applicationinsights_options' );
        }

        return is_array( $options ) ? $options : array();
    }

    /**
     * @return string
     */
    public static function getInstrumentationKey(): string {
        $options = self::getPluginOptions();

        return isset( $options['instrumentation_key'] ) ? (string) $options['instrumentation_key'] : '';
    }

    /**
     * Returns the current WordPress Page Title
     * @return string Page Title
     */
    public static function getPageTitle() {
        if (is_home()) {
            // Home Page does not have a name
            return 'Home';
        }
        elseif (is_404()) {
            // WordPress does not know the title for a 404 page
            return 'Page not found';
        }
        else {
            // WordPress Page Title
            return get_the_title();
        }
    }
}